<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Blog\Datagrids\CommentDataGrid;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(CommentDataGrid::class)->toJson();
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
        return view('blog::admin.blogs.create');
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
        
        $role = (array_key_exists('role', $loggedIn_user)) ? (array_key_exists('name', $loggedIn_user['role']) ? $loggedIn_user['role']['name'] : 'Administrator') : 'Administrator';
        
        if ($role != 'Administrator') {
            $blogs = $this->blogRepository->where('author_id', $user_id)->get();
           
            $post_ids = (! empty($blogs) && count($blogs) > 0) ? $blogs->pluck('id')->toarray() : [];
            
            $check_comment = $this->blogCommentRepository->where('id', $id)->whereIn('post', $post_ids)->first();
            
            if (! $check_comment) {
                return redirect()->route('admin.blog.comment.index');
            }
        }

        $author_name = '';

        $author_id = $comment && isset($comment->author) ? $comment->author : 0;

        if ((int) $author_id > 0) {
            $author_data = $this->adminRepository->find($author_id);

            $author_name = $author_data && isset($author_data->name) ? $author_data->name : '';
        }

        $status_details = [
            [
                'id'   => 1,
                'name' => 'blog::app.comment.edit.status-pending',
            ], [
                'id'   => 2, 
                'name' => 'blog::app.comment.edit.status-approved',
            ], [
                'id'   => 0,
                'name' => 'blog::app.comment.edit.status-rejected',
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
            session()->flash('success', trans('blog::app.comment.edit.update-success'));
        } else {
            session()->flash('error', trans('blog::app.comment.edit.updated-failure'));
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

            return response()->json(['message' => trans('blog::app.comment.edit.delete-success')]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('blog::app.comment.edit.delete-failure')], 500);
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
            $indexes = (array) request()->input('indices');

            foreach ($indexes as $key => $value) {
                try {
                    $this->blogCommentRepository->delete($value);
                } catch (\Exception $e) {
                    $suppressFlash = true;

                    continue;
                }
            }

            if (! $suppressFlash) {
                session()->flash('success', trans('blog::app.comment.edit.delete-success'));
            } else {
                session()->flash('info', trans('blog::app.comment.edit.partial-action', ['resource' => 'Comment']));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('blog::app.comment.edit.method-error'));

            return redirect()->back();
        }
    }
}