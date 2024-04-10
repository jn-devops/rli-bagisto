<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Webkul\Blog\Http\Controllers\Controller;

class TagController extends Controller
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
    public function index($tag_slug)
    {
        $tag = $this->blogTagRepository->where('slug', $tag_slug)->firstOrFail();

        $tag_id = isset($tag) ? $tag->id : 0;

        $paginate = $this->getConfigByKey('blog_post_per_page');

        $paginate = ! empty($paginate) ? (int) $paginate : 9;

        $blogs = $this->blogRepository
                ->orderBy('id', 'desc')
                ->where('status', 1)
                ->whereRaw('FIND_IN_SET(?, tags)', [$tag_id])
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

        return view('blog::shop.tag.index', compact('blogs', 'categories', 'customizations', 'tag', 'tags', 'show_categories_count', 'show_tags_count', 'show_author_page', 'blog_seo_meta_title', 'blog_seo_meta_keywords', 'blog_seo_meta_description'));
    }
}