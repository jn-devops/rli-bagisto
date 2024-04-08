<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\User\Repositories\AdminRepository;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Blog\Datagrids\BlogCommentDataGrid;
use Webkul\Blog\Repositories\BlogCommentRepository;

class BlogCommentController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected BlogCommentRepository $blogCommentRepository,
        protected BlogRepository $blogRepository,
        protected AdminRepository $adminRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(BlogCommentDataGrid::class)->toJson();
        }

        return view('blog::admin.comments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('blog::admin.comments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $comment = $this->blogCommentRepository->findOrFail($id);

        $loggedIn_user = auth()->guard('admin')->user()->toarray();
        
        $user_id = (array_key_exists('id', $loggedIn_user)) ? $loggedIn_user['id'] : 0;
        
        $role = (array_key_exists('role', $loggedIn_user)) ? (array_key_exists('name', $loggedIn_user['role']) ? $loggedIn_user['role']['name'] : 'Administrator' ) : 'Administrator';
        
        if ( $role != 'Administrator' ) {
            $blogs = $this->blogRepository->findByField('author_id', $user_id);

            $postIds = ! empty($blogs) ? $blogs->pluck('id')->toarray() : [];

            $checkComment = $this->blogCommentRepository
                                ->where('id', $id)
                                ->whereIn('post', $postIds)
                                ->first();

            if (! $checkComment) {
                return redirect()->route('admin.blog.comment.index');
            }
        }

        $author_name = '';

        $author_id = $comment && isset($comment->author) ? $comment->author : 0;

        if ( (int)$author_id > 0 ) {
            $author_data = $this->adminRepository->findOrFail($author_id);

            $author_name = $author_data && isset($author_data->name) ? $author_data->name : '';
        }

        $status_details = [
            [
                'id'   => 1, 
                'name' => 'blog::app.comment.status-pending',
            ], [
                'id'   => 2,
                'name' => 'blog::app.comment.status-approved',
            ], [
                'id'   => 0,
                'name' => 'blog::app.comment.status-rejected',
            ],
        ];

        return view('blog::admin.comments.edit', compact('comment', 'author_name', 'status_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->all();

        $result = $this->blogCommentRepository->updateItem($data, $id);

        if ($result) {
            session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Comment']));
        } else {
            session()->flash('error', trans('blog::app.comment.updated-fault'));
        }

        return redirect()->route('admin.blog.comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogCommentRepository->findOrFail($id);

        try {
            $this->blogCommentRepository->delete($id);

            return response()->json(['message' => trans('admin::app.response.delete-success', ['name' => 'Comment'])]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('admin::app.response.delete-failed', ['name' => 'Comment'])], 500);
    }

    /**
     * Remove the specified resources from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy()
    {
        $suppressFlash = false;

        if (request()->isMethod('post')) {
            $indexes = (array)request()->input('indices');

            foreach ($indexes as $value) {
                try {
                    $this->blogCommentRepository->delete($value);
                } catch (\Exception $e) {
                    $suppressFlash = true;

                    continue;
                }
            }

            if (! $suppressFlash) {
                session()->flash('success', trans('admin::app.datagrid.mass-ops.delete-success', ['resource' => 'Comment']));
            } else {
                session()->flash('info', trans('admin::app.datagrid.mass-ops.partial-action', ['resource' => 'Comment']));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('admin::app.datagrid.mass-ops.method-error'));

            return redirect()->back();
        }
    }
}