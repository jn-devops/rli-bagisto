<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Webkul\Blog\Datagrids\CategoryDataGrid;
use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Blog\Http\Requests\BlogCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(CategoryDataGrid::class)->toJson();
        }

        return view('blog::admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $locale = core()->getRequestedLocaleCode();

        $categories = $this->blogCategoryRepository->where(['status' => 1, 'parent_id' => 0])->get();

        return view('blog::admin.categories.create', compact('categories'))->with('locale', $locale);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryRequest $blogCategoryRequest)
    {
        $data = request()->all();

        if (is_array($data['locale'])) {
            $data['locale'] = implode(',', $data['locale']);
        }

        $result = $this->blogCategoryRepository->save($data);

        if ($result) {
            session()->flash('success', trans('blog::app.category.create.created.success'));
        } else {
            session()->flash('success', trans('blog::app.category.create.created.failure'));
        }

        return redirect()->route('admin.blog.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = $this->blogCategoryRepository->findOrFail($id);

        Session::put('bCatEditId', $id);

        $categoriesParent = $this->blogCategoryRepository
            ->where(['status' => 1, 'parent_id' => 0])
            ->whereNot('id', $id)
            ->get();

        Session::remove('bCatEditId');

        return view('blog::admin.categories.edit', compact('categories', 'categoriesParent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryRequest $blogCategoryRequest, $id)
    {
        $data = request()->all();

        if (is_array($data['locale'])) {
            $data['locale'] = implode(',', $data['locale']);
        }

        if (is_array($data) && array_key_exists('image', $data) && is_null(request()->image)) {
            session()->flash('error', trans('blog::app.category.edit.updated.failure'));

            return redirect()->back();
        }

        $result = $this->blogCategoryRepository->updateItem($data, $id);

        if ($result) {
            session()->flash('success', trans('blog::app.category.edit.updated.success'));
        } else {
            session()->flash('error', trans('blog::app.category.edit.updated.failure'));
        }

        return redirect()->route('admin.blog.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogCategoryRepository->findOrFail($id);

        try {
            $this->blogCategoryRepository->delete($id);

            return response()->json(['message' => trans('blog::app.category.index.delete.success')]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('blog::app.category.index.delete.failure')], 500);
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
                    $this->blogCategoryRepository->delete($value);
                } catch (\Exception $e) {
                    $suppressFlash = true;

                    continue;
                }
            }

            if (! $suppressFlash) {
                session()->flash('success', trans('blog::app.category.index.deleted.success'));
            } else {
                session()->flash('info', trans('blog::app.category.index.deleted.failure'));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('blog::app.category.index.deleted.failure'));

            return redirect()->back();
        }
    }
}
