<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Blog\Repositories\BlogCategoryRepository;
use Webkul\Blog\Http\Controllers\Shop\Controller;
use Webkul\Enclaves\Repositories\ThemeCustomizationRepository;

class BlogCategoryController extends Controller
{
    use DispatchesJobs, ValidatesRequests;

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
        protected BlogCategoryRepository $blogCategoryRepository,
        protected BlogRepository $blogRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function categories($category_slug)
    {
        $category = $this->blogCategoryRepository->findOneByField('slug', $category_slug);

        $category_id = ($category && isset($category->id) ) ? $category->id : 0;

        $paginate = $this->getConfigByKey('blog_post_per_page');
        
        $paginate = (! empty($paginate)) ? (int)$paginate : 9;

        $blogs = $this->blogRepository->orderBy('id', 'desc')->where('status', 1)
            ->where(
                function ($query) use ($category_id) {
                        $query->where('default_category', $category_id)
                            ->orWhereRaw('FIND_IN_SET(?, categorys)', [$category_id]);
                })
        ->paginate($paginate);

        $categories = $this->blogCategoryRepository->where('status', 1)->get();

        $tags = $this->getTagsWithCount();

        $customizations = $this->themeCustomizationRepository->orderBy('sort_order')->findWhere([
            'status'     => self::STATUS,
            'channel_id' => core()->getCurrentChannel()->id,
        ]);

        $show_categories_count = $this->getConfigByKey('blog_post_show_categories_with_count');
        
        $show_tags_count = $this->getConfigByKey('blog_post_show_tags_with_count');

        $show_author_page = $this->getConfigByKey('blog_post_show_author_page');

        $blog_seo_meta_title = $this->getConfigByKey('blog_seo_meta_title');

        $blog_seo_meta_keywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $blog_seo_meta_description = $this->getConfigByKey('blog_seo_meta_description');

        return view('blog::shop.category.index', compact('blogs', 'categories', 'customizations', 'category', 'tags', 'show_categories_count', 'show_tags_count', 'show_author_page', 'blog_seo_meta_title', 'blog_seo_meta_keywords', 'blog_seo_meta_description'));
    }
}