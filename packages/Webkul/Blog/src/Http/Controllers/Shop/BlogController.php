<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Blog\Http\Resources\BlogResource;

class BlogController extends Controller
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
    public function index()
    {
        abort_if(! core()->getConfigData('blog.settings.general.status'), 404);

        $limit = (int)$this->getConfigByKey('blog_post_per_page');
        
        $blogs = $this->blogRepository
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->take($limit)
                    ->get();

        $enableBlogSeoMetaTitle = $this->getConfigByKey('blog_seo_meta_title');

        $enableBlogSeoMetaKeywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $enableBlogSeoMetaDescription = $this->getConfigByKey('blog_seo_meta_description');

        return view('blog::shop.blog.post.index', compact(
            'blogs',
            'limit',
            'enableBlogSeoMetaTitle',
            'enableBlogSeoMetaKeywords',
            'enableBlogSeoMetaDescription',
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View | JsonResponse
     */
    public function view($slug)
    {
        abort_if(! core()->getConfigData('blog.settings.general.status'), 404);

        $blog = $this->blogRepository
                        ->where('slug', $slug)
                        ->firstOrFail();

        $blogSeoMetaTitle = $this->getConfigByKey('blog_seo_meta_title');

        $blogSeoMetaKeywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $blogSeoMetaDescription = $this->getConfigByKey('blog_seo_meta_description');

        if(request()->ajax()) {
            return new JsonResponse(['blog' => $blog]);
        }

        $limit = $this->getConfigByKey('blog_post_per_page');

        return view('blog::shop.blog.post.view', compact(
            'blog',
            'limit',
            'blogSeoMetaTitle',
            'blogSeoMetaKeywords',
            'blogSeoMetaDescription'
        ));
    }

    /**
     * Product listings.
     */
    public function blogFrontEnd(): JsonResource
    {
        $blogs = $this->blogRepository
                    ->where('status', 1);

        if(! empty(request('limit'))) {
            $limit = (int)request('limit');

            $blogs->skip(0)->take($limit);
        }

        if(! empty(request('id'))) {
            $blogs = $blogs->whereNotIn('id', [(int)request('id')]);
        }

        return BlogResource::collection($blogs->get());
    }
}