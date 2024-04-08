<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Blog\Datagrids\BlogTagDataGrid;
use Webkul\Blog\Http\Requests\BlogTagRequest;
use Webkul\Blog\Repositories\BlogTagRepository;

class BlogTagController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected BlogTagRepository $blogTagRepository
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
            return app(BlogTagDataGrid::class)->toJson();
        }

        return view('blog::admin.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $locale = core()->getRequestedLocaleCode();

        return view('blog::admin.tags.create')->with('locale', $locale);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BlogTagRequest $blogTagRequest)
    {
        $data = request()->all();

        if (is_array($data['locale'])) {
            $data['locale'] = implode(',', $data['locale']);
        }

        $result = $this->blogTagRepository->save($data);

        if ($result) {
            session()->flash('success', trans('admin::app.response.create-success', ['name' => 'Tag']));
        } else {
            session()->flash('success', trans('blog::app.tag.created-fault'));
        }

        return redirect()->route('admin.blog.tag.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tag = $this->blogTagRepository->findOrFail($id);

        return view('admin.blog.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogTagRequest $blogTagRequest, $id)
    {
        $data = request()->all();

        if (is_array($data['locale'])) {
            $data['locale'] = implode(',', $data['locale']);
        }

        $result = $this->blogTagRepository->updateItem($data, $id);

        if ($result) {
            session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Tag']));
        } else {
            session()->flash('error', trans('blog::app.tag.updated-fault'));
        }

        return redirect()->route('admin.blog.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogTagRepository->findOrFail($id);

        try {
            $this->blogTagRepository->delete($id);

            return response()->json(['message' => trans('admin::app.response.delete-success', ['name' => 'Tag'])]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('admin::app.response.delete-failed', ['name' => 'Tag'])], 500);
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
            // $indexes = explode(',', request()->input('indexes'));
            $indexes = (array)request()->input('indices');

            foreach ($indexes as $key => $value) {
                try {
                    $this->blogTagRepository->delete($value);
                } catch (\Exception $e) {
                    $suppressFlash = true;

                    continue;
                }
            }

            if (! $suppressFlash) {
                session()->flash('success', trans('admin::app.datagrid.mass-ops.delete-success', ['resource' => 'Tag']));
            } else {
                session()->flash('info', trans('admin::app.datagrid.mass-ops.partial-action', ['resource' => 'Tag']));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('admin::app.datagrid.mass-ops.method-error'));

            return redirect()->back();
        }
    }
}
