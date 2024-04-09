<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;

class ArticleController extends Controller
{
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
    public function __construct(
        protected ThemeCustomizationRepository $themeCustomizationRepository,
        protected BlogRepository $blogRepository,
    ) {
        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blogs = $this->blogRepository->where('status', 1)->paginate(9);

        $categories = $this->blogRepository->groupBy('default_category')->selectRaw('default_category')->selectRaw('count(*) as count')->get();

        $customizations = $this->themeCustomizationRepository->orderBy('sort_order')->findWhere([
            'status'     => self::STATUS,
            'channel_id' => core()->getCurrentChannel()->id,
        ]);

        return view($this->_config['view'], compact('blogs', 'categories', 'customizations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function view($blog_slug, $slug)
    {
        $blog = $this->blogRepository->where('slug', $slug)->firstOrFail();

        $categories = $this->blogRepository->groupBy('default_category')->selectRaw('default_category')->selectRaw('count(*) as count')->get();

        return view($this->_config['view'], compact('blog', 'categories'));
    }
}