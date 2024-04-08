<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Webkul\Blog\Datagrids\BlogDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Blog\Http\Requests\BlogRequest;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Blog\Repositories\BlogTagRepository;
use Webkul\Blog\Repositories\BlogCategoryRepository;
use Webkul\User\Repositories\AdminRepository;

class BlogController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected BlogRepository $blogRepository,
        protected BlogCategoryRepository $blogCategoryRepository,
        protected BlogTagRepository $blogTagRepository,
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
            return app(BlogDataGrid::class)->toJson();
        }

        return view('blog::admin.blogs.index');
    }

    public function gteBlogs()
    {
        return 'This is blog API';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $locale = core()->getRequestedLocaleCode();

        $categories = $this->blogCategoryRepository->all();

        $additional_categories = $this->blogCategoryRepository
                                        ->whereNull('parent_id')
                                        ->where('status', 1)
                                        ->get();

        $tags = $this->blogTagRepository->all();

        $users = $this->adminRepository->all();

        return view('blog::admin.blogs.create', compact('categories', 'tags', 'users', 'additional_categories'))->with('locale', $locale);
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

        if (array_key_exists('tags', $data) 
                &&  is_array($data['tags'])) {
            $data['tags'] = implode(',', $data['tags']);
        }

        if (array_key_exists('categorys', $data) 
                && is_array($data['categorys'])) {
            $data['categorys'] = implode(',', $data['categorys']);
        }

        $data['author'] = '';
        
        if (is_array($data) 
                && array_key_exists('author_id', $data) 
                && isset($data['author_id']) 
                && (int)$data['author_id'] > 0) {
            $author = $this->adminRepository->findOrFail($data['author_id']);

            $data['author'] = (! empty($author) ) ? $author->name : '';
        }

        $result = $this->blogRepository->save($data);

        if ($result) {
            session()->flash('success', trans('admin::app.response.create-success', ['name' => 'Blog']));
        } else {
            session()->flash('success', trans('blog::app.blog.created-fault'));
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
        $loggedIn_user = auth()->guard('admin')->user()->toarray();

        $user_id = (array_key_exists('id', $loggedIn_user) ) ? $loggedIn_user['id'] : 0;

        $role = (array_key_exists('role', $loggedIn_user) ) ? ( array_key_exists('name', $loggedIn_user['role']) ? $loggedIn_user['role']['name'] : 'Administrator' ) : 'Administrator';

        $blog = $this->blogRepository->findOrFail($id);

        if ($blog 
            && $user_id != $blog->author_id 
            && $role != 'Administrator'
        ) {
            return redirect()->route('admin.blog.index');
        }

        $categories = $this->blogCategoryRepository->all();

        $additional_categories = $this->blogCategoryRepository->whereNull('parent_id')->where('status', 1)->get();

        $tags = $this->blogTagRepository->all();

        $users = $this->adminRepository->all();

        return view('blog::admin.blogs.edit', compact('blog', 'categories', 'tags', 'users', 'additional_categories'));
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
        
        if (array_key_exists('tags', $data) 
                && is_array($data['tags'])) {
            $data['tags'] = implode(',', $data['tags']);
        }
        
        if (array_key_exists('categorys', $data) 
                && is_array($data['categorys'])) {
            $data['categorys'] = implode(',', $data['categorys']);
        }

        $data['author'] = '';

        if (is_array($data) 
                && array_key_exists('author_id', $data) 
                && isset($data['author_id']) 
                && (int)$data['author_id'] > 0) {
            $author_data = $this->adminRepository->where('id', $data['author_id'])->first();

            $data['author'] = (! empty($author_data) ) ? $author_data->name : '';
        }

        $result = $this->blogRepository->updateItem($data, $id);

        if ($result) {
            session()->flash('success', trans('admin::app.response.update-success', ['name' => 'Blog']));
        } else {
            session()->flash('error', trans('blog::app.blog.updated-fault'));
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

            return response()->json(['message' => trans('admin::app.response.delete-success', ['name' => 'Blog'])]);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['message' => trans('admin::app.response.delete-failed', ['name' => 'Blog'])], 500);
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
                    $this->blogRepository->delete($value);
                } catch (\Exception $e) {
                    $suppressFlash = true;

                    continue;
                }
            }

            if (! $suppressFlash) {
                session()->flash('success', trans('admin::app.datagrid.mass-ops.delete-success', ['resource' => 'Blog']));
            } else {
                session()->flash('info', trans('admin::app.datagrid.mass-ops.partial-action', ['resource' => 'Blog']));
            }

            return redirect()->back();
        } else {
            session()->flash('error', trans('admin::app.datagrid.mass-ops.method-error'));

            return redirect()->back();
        }
    }
}