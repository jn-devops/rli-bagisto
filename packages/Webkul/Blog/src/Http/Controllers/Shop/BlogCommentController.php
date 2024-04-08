<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Webkul\Blog\Repositories\BlogCommentRepository;
use Webkul\Enclaves\Repositories\ThemeCustomizationRepository;
use Webkul\Blog\Http\Controllers\Shop\Controller;

class BlogCommentController extends Controller
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Using const variable for status
     */
    const STATUS = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct
    (
    	protected ThemeCustomizationRepository $themeCustomizationRepository,
    	protected BlogCommentRepository $blogCommentRepository,
    )
    {
        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function store()
    {
        $data = request()->all();

        $data['status'] = 1;

        $result = $this->blogCommentRepository->save($data);

        return redirect()->back()->with('success', 'Your comment has been created successfully.');
    }

}
