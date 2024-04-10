<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Webkul\Blog\Datagrids\TagDataGrid;
use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Blog\Http\Requests\BlogTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(TagDataGrid::class)->toJson();
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
            session()->flash('success', trans('blog::app.tag.create.created.success'));
        } else {
            session()->flash('success', trans('blog::app.tag.create.created.failure'));
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

        return view('blog::admin.tags.edit', compact('tag'));
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
            session()->flash('success', trans('blog::app.tag.edit.updated.success'));
        } else {
            session()->flash('error', trans('blog::app.tag.edit.updated.failure'));
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

            return response()->json(['message' => trans('blog::app.tag.index.deleted.success')]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('blog::app.tag.index.deleted.failed')], 500);
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
                    $this->blogTagRepository->delete($value);
                } catch (\Exception $e) {
                    $suppressFlash = true;

                    continue;
                }
            }

            if (! $suppressFlash) {
                session()->flash('success', trans('blog::app.tag.index.deleted.success'));
            } else {
                session()->flash('info', trans('blog::app.tag.index.partial-action'));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('blog::app.tag.index.method-error'));

            return redirect()->back();
        }
    }
}
