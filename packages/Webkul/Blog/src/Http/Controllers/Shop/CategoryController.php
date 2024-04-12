<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Webkul\Blog\Http\Controllers\Controller;

class CategoryController extends Controller
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
    public function index($category_slug)
    {
        $category = $this->blogCategoryRepository->where('slug', $category_slug)->firstOrFail();

        $categoryId = isset($category) ? $category->id : 0;

        $paginate = $this->getConfigByKey('blog_post_per_page');

        $paginate = $paginate ?? 9;

        $blogs = $this->blogRepository->orderBy('id', 'desc')->where('status', 1)
            ->where(
                function ($query) use ($categoryId) {
                    $query->where('default_category', $categoryId)
                        ->orWhereRaw('FIND_IN_SET(?, categorys)', [$categoryId]);
                })
            ->paginate($paginate);

        $categories = $this->blogCategoryRepository->where('status', 1)->get();

        $tags = $this->getTagsWithCount();

        $customizations = $this->themeCustomizationRepository->orderBy('sort_order')->findWhere([
            'status'     => self::STATUS,
            'channel_id' => core()->getCurrentChannel()->id,
        ]);

        $showCategoriesCount = $this->getConfigByKey('blog_post_show_categories_with_count');

        $showTagsCount = $this->getConfigByKey('blog_post_show_tags_with_count');

        $showAuthorPage = $this->getConfigByKey('blog_post_show_author_page');

        $blogSeoMetaTitle = $this->getConfigByKey('blog_seo_meta_title');

        $blogSeoMetaKeywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $blogSeoMetaDescription = $this->getConfigByKey('blog_seo_meta_description');

        return view('blog::shop.blog.category.index', compact(
            'blogs',
            'categories',
            'customizations',
            'category',
            'tags',
            'showCategoriesCount',
            'showTagsCount',
            'showAuthorPage',
            'blogSeoMetaTitle',
            'blogSeoMetaKeywords',
            'blogSeoMetaDescription'
        ));
    }
}
