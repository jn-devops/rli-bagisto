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

        $loggedInUser = auth()->guard('admin')->user()->toarray();
        
        $userId = (array_key_exists('id', $loggedInUser)) ? $loggedInUser['id'] : 0;
        
        $role = (array_key_exists('role', $loggedInUser)) ? (array_key_exists('name', $loggedInUser['role']) ? $loggedInUser['role']['name'] : 'Administrator') : 'Administrator';
        
        if ($role != 'Administrator') {
            $blogs = $this->blogRepository->where('author_id', $userId)->get();
           
            $postIds = ! empty($blogs) ? $blogs->pluck('id')->toarray() : [];
            
            $checkComment = $this->blogCommentRepository->where('id', $id)->whereIn('post', $postIds)->first();
            
            if (! $checkComment) {
                return redirect()->route('admin.blog.comment.index');
            }
        }

        $authorName = '';

        $author_id = $comment && isset($comment->author) ? $comment->author : 0;

        if ((int) $author_id > 0) {
            $author = $this->adminRepository->find($author_id);

            $authorName = $author && isset($author->name) ? $author->name : '';
        }

        $statusDetails = [
            [
                'id'   => 1,
                'name' => 'blog::app.comments.edit.status.pending',
            ], [
                'id'   => 2, 
                'name' => 'blog::app.comments.edit.status.approved',
            ], [
                'id'   => 0,
                'name' => 'blog::app.comments.edit.status.rejected',
            ],
        ];

        return view('blog::admin.comments.edit', compact('comment', 'authorName', 'statusDetails'));
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
            session()->flash('success', trans('blog::app.comments.edit.updated.success'));
        } else {
            session()->flash('error', trans('blog::app.comments.edit.updated.failure'));
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

            return response()->json(['message' => trans('blog::app.comments.index.deleted.success')]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('blog::app.comments.index.deleted.failure')], 500);
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
                session()->flash('success', trans('blog::app.comments.index.deleted.success'));
            } else {
                session()->flash('info', trans('blog::app.comments.index.partial-action', ['resource' => 'Comment']));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('blog::app.comments.index.method-error'));

            return redirect()->back();
        }
    }
}