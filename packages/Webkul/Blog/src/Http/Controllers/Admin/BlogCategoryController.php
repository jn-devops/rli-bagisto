<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Blog\Datagrids\BlogCategoryDataGrid;
use Webkul\Blog\Http\Requests\BlogCategoryRequest;
use Webkul\Blog\Repositories\BlogCategoryRepository;

class BlogCategoryController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected BlogCategoryRepository $blogCategoryRepository
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
            return app(BlogCategoryDataGrid::class)->toJson();
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

        $categories = $this->blogCategoryRepository
                            ->whereNull('parent_id')
                            ->where('status', 1)
                            ->get();

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
            session()->flash('success', trans('admin::app.catalog.categories.create-success', ['name' => 'Category']));
        } else {
            session()->flash('success', trans('blog::app.category.created-fault'));
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

        $categories_data = $this->blogCategoryRepository
                                ->whereNull('parent_id')
                                ->where('status', 1)
                                ->where('id', '!=', $id)
                                ->get();
        
        Session::remove('bCatEditId');

        return view('blog::admin.categories.edit', compact('categories', 'categories_data'));
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

        if (is_array($data) 
                && array_key_exists('image', $data)
                && is_null(request()->image)) {
            session()->flash('error', trans('blog::app.category.updated-fault'));

            return redirect()->back();
        }

        $result = $this->blogCategoryRepository->updateItem($data, $id);

        if ($result) {
            session()->flash('success', trans('admin::app.catalog.categories.update-success', ['name' => 'Category']));
        } else {
            session()->flash('error', trans('blog::app.category.updated-fault'));
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

            return response()->json(['message' => trans('admin::app.catalog.categories.delete-success', ['name' => 'Category'])]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('admin::app.catalog.categories.delete-failed', ['name' => 'Category'])], 500);
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
                    $this->blogCategoryRepository->delete($value);
                } catch (\Exception $e) {
                    $suppressFlash = true;

                    continue;
                }
            }

            if (! $suppressFlash) {
                session()->flash('success', trans('admin::app.catalog.categories.delete-success', ['resource' => 'Category']));
            } else {
                session()->flash('info', trans('admin::app.catalog.categories.delete-failed', ['resource' => 'Category']));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('admin::app.catalog.categories.delete-failed'));

            return redirect()->back();
        }
    }
}