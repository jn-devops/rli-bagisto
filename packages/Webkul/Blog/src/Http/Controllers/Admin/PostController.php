<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Webkul\Blog\Datagrids\BlogDataGrid;
use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Blog\Http\Requests\BlogRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(BlogDataGrid::class)->toJson();
        }

        return view('blog::admin.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $locale = core()->getRequestedLocaleCode();

        $users = $this->adminRepository->all();

        return view('blog::admin.blogs.create', compact('users'))->with('locale', $locale);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $blogRequest)
    {
        $data = request()->all();

        if (array_key_exists('locale', $data)
                && is_array($data['locale'])) {
            $data['locale'] = implode(',', $data['locale']);
        }

        $data['author'] = '';

        if (is_array($data)
                && array_key_exists('author_id', $data)
                && isset($data['author_id'])
                && (int) $data['author_id'] > 0) {
            $author = $this->adminRepository->where('id', $data['author_id'])->first();

            $data['author_id'] = $author->id;
            $data['author'] = ($author && ! empty($author)) ? $author->name : '';
        }
        
        $result = $this->blogRepository->save($data);

        if ($result) {
            session()->flash('success', trans('blog::app.blog.create.success.message'));
        } else {
            session()->flash('success', trans('blog::app.blog.create.failure.message'));
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $loggedInUser = auth()->guard('admin')->user();

        $userId = $loggedInUser->id ?? 0;

        $role = $loggedInUser?->role?->name ?? 'Administrator';

        $blog = $this->blogRepository->findOrFail($id);

        if ($blog
                && $userId != $blog->author_id
                && $role != 'Administrator'
        ) {
            return redirect()->route('admin.blog.index');
        }

        $users = $this->adminRepository->all();

        return view('blog::admin.blogs.edit', compact('blog', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $blogRequest, $id)
    {
        $data = request()->all();

        if (array_key_exists('locale', $data)
                && is_array($data['locale'])) {
            $data['locale'] = implode(',', $data['locale']);
        }

        $data['author'] = '';

        if (is_array($data)
                && array_key_exists('author_id', $data)
                && isset($data['author_id'])
                && (int) $data['author_id'] > 0) {
            $author = $this->adminRepository->where('id', $data['author_id'])->first();
            
            $data['author_id'] = $author->id;
            $data['author'] = ! empty($author) ? $author->name : '';
        }

        $result = $this->blogRepository->update($data, $id);

        if ($result) {
            session()->flash('success', trans('blog::app.blog.edit.success.message'));
        } else {
            session()->flash('error', trans('blog::app.blog.edit.failure.message'));
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogRepository->findOrFail($id);

        try {
            $this->blogRepository->delete($id);

            return response()->json(['message' => trans('blog::app.blog.index.success.message')]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('blog::app.blog.index.error.message')], 500);
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

            foreach ($indexes as $value) {
                try {
                    $this->blogRepository->delete($value);
                } catch (\Exception $e) {
                    $suppressFlash = true;

                    continue;
                }
            }

            if (! $suppressFlash) {
                session()->flash('success', trans('blog::app.blog.index.mass-ops.success'));
            } else {
                session()->flash('info', trans('blog::app.blog.index.mass-ops.error'));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('blog::app.blog.index.mass-ops.error'));

            return redirect()->back();
        }
    }
}
