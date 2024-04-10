<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Webkul\Blog\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Using const variable for status
     */
    const STATUS = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function store()
    {
        $data = request()->all();

        $data['status'] = 1;

        $this->blogCommentRepository->save($data);

        return redirect()->back()->with('success', 'Your comment has been created successfully.');
    }
}
