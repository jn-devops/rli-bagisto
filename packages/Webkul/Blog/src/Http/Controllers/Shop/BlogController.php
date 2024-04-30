<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Blog\Http\Resources\BlogResource;
use Illuminate\Http\Resources\Json\JsonResource;

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
        $paginate = $this->getConfigByKey('blog_post_per_page');

        $paginate = $paginate ?? 9;

        $blogs = $this->blogRepository
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->paginate($paginate);

        $categories = $this->blogCategoryRepository
                            ->where('status', 1)
                            ->get();

        $tags = $this->getTagsWithCount();

        $customizations = $this->themeCustomizationRepository
                                ->orderBy('sort_order')
                                ->findWhere([
                                    'status'     => self::STATUS,
                                    'channel_id' => core()->getCurrentChannel()->id,
                                ]);

        $showCategoriesCount = $this->getConfigByKey('blog_post_show_categories_with_count');

        $showTagsCount = $this->getConfigByKey('blog_post_show_tags_with_count');

        $showAuthorPage = $this->getConfigByKey('blog_post_show_author_page');

        $enableBlogSeoMetaTitle = $this->getConfigByKey('blog_seo_meta_title');

        $enableBlogSeoMetaKeywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $enableBlogSeoMetaDescription = $this->getConfigByKey('blog_seo_meta_description');

        return view('blog::shop.blog.post.index', compact(
            'blogs',
            'categories',
            'customizations',
            'tags',
            'showCategoriesCount',
            'showTagsCount',
            'showAuthorPage',
            'enableBlogSeoMetaTitle',
            'enableBlogSeoMetaKeywords',
            'enableBlogSeoMetaDescription',
        ));
    }

    /**
     * Ger Author Page.
     *
     * @return \Illuminate\View\View
     */
    public function authorPage($author_id)
    {
        $showAuthorPage = $this->getConfigByKey('blog_post_show_author_page');

        if (! $showAuthorPage) {
            abort(404);
        }

        $author = $this->blogRepository
                        ->where('author_id', $author_id)
                        ->firstOrFail();

        $paginate = $this->getConfigByKey('blog_post_per_page');

        $paginate = $paginate ?? 9;

        $blogs = $this->blogRepository
            ->where('author_id', $author_id)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate($paginate);

        $categories = $this->blogCategoryRepository
                            ->where('status', 1)
                            ->get();

        $tags = $this->getTagsWithCount();

        $customizations = $this->themeCustomizationRepository
                                ->orderBy('sort_order')
                                ->findWhere([
                                    'status'     => self::STATUS,
                                    'channel_id' => core()->getCurrentChannel()->id,
                                ]);

        $showCategoriesCount = $this->getConfigByKey('blog_post_show_categories_with_count');

        $showTagsCount = $this->getConfigByKey('blog_post_show_tags_with_count');

        $showAuthorPage = $this->getConfigByKey('blog_post_show_author_page');

        $enableBlogSeoMetaTitle = $this->getConfigByKey('blog_seo_meta_title');

        $enableBlogSeoMetaKeywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $enableBlogSeoMetaDescription = $this->getConfigByKey('blog_seo_meta_description');

        return view('blog::shop.blog.author.index', compact(
            'blogs',
            'categories',
            'customizations',
            'tags',
            'author',
            'showCategoriesCount',
            'showTagsCount',
            'showAuthorPage',
            'enableBlogSeoMetaTitle',
            'enableBlogSeoMetaKeywords',
            'enableBlogSeoMetaDescription',
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function view($blog_slug, $slug)
    {
        $blog = $this->blogRepository
                        ->where('slug', $slug)
                        ->firstOrFail();

        $blogId = $blog->id ?? 0;

        $blogTags = $this->blogTagRepository
                        ->whereIn('id', explode(',', $blog->tags))
                        ->get();

        $paginate = $this->getConfigByKey('blog_post_maximum_related');

        $paginate = (! empty($paginate)) ? (int) $paginate : 4;

        $blogCategoryIds = array_merge(explode(',', $blog->default_category), explode(',', $blog->categorys));

        $relatedBlogs = $this->blogRepository
                                ->orderBy('id', 'desc')
                                ->where('status', 1)
                                ->whereNotIn('id', [$blogId]);

        if (! empty($blogCategoryIds)) {

            $relatedBlogs = $relatedBlogs->whereIn('default_category', $blogCategoryIds)->where(

                function ($query) use ($blogCategoryIds) {

                    foreach ($blogCategoryIds as $key => $blogCategoryId) {
                        if ($key == 0) {
                            $query->whereRaw('FIND_IN_SET(?, categorys)', [$blogCategoryId]);
                        } else {
                            $query->orWhereRaw('FIND_IN_SET(?, categorys)', [$blogCategoryId]);
                        }
                    }
                });
        }

        $relatedBlogs = $relatedBlogs->paginate($paginate);

        $categories = $this->blogCategoryRepository
                                ->where('status', 1)
                                ->get();

        $tags = $this->getTagsWithCount();

        $comments = $this->getCommentsRecursive($blogId);

        $totalComments = $this->blogCommentRepository
                                ->where('post', $blogId)
                                ->where('status', 2)
                                ->get();

        $totalCommentsCnt = ! empty($totalComments) ? $totalComments->count() : 0;

        $loggedInUserName = $loggedInUserEmail = null;

        $loggedInUser = auth()->guard('customer')->user();

        if (! empty($loggedInUser)) {
            $loggedInUserEmail = (! empty($loggedInUser->email)) ? $loggedInUser->email : null;

            $loggedInUserFirstName = (! empty($loggedInUser->first_name)) ? $loggedInUser->first_name : null;

            $loggedInUserLastName = (! empty($loggedInUser->last_name)) ? $loggedInUser->last_name : null;

            $loggedInUserName = $loggedInUserFirstName;

            $loggedInUserName = (! empty($loggedInUserName)) ? ($loggedInUserName . ' ' . $loggedInUserLastName) : $loggedInUserLastName;
        }

        $showCategoriesCount = $this->getConfigByKey('blog_post_show_categories_with_count');

        $showTagsCount = $this->getConfigByKey('blog_post_show_tags_with_count');

        $showAuthorPage = $this->getConfigByKey('blog_post_show_author_page');

        $enableComment = $this->getConfigByKey('blog_post_enable_comment');

        $allowQuestComment = $this->getConfigByKey('blog_post_allow_guest_comment');

        $maximumNestedComment = $this->getConfigByKey('blog_post_maximum_nested_comment');

        $blogSeoMetaTitle = $this->getConfigByKey('blog_seo_meta_title');

        $blogSeoMetaKeywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $blogSeoMetaDescription = $this->getConfigByKey('blog_seo_meta_description');

        return view('blog::shop.blog.post.view', compact(
            'blog',
            'categories',
            'tags',
            'comments',
            'totalComments',
            'totalCommentsCnt',
            'relatedBlogs',
            'blogTags',
            'showCategoriesCount',
            'showTagsCount',
            'showAuthorPage',
            'enableComment',
            'allowQuestComment',
            'maximumNestedComment',
            'loggedInUser',
            'loggedInUserName',
            'loggedInUserEmail',
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
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->skip(0);

        $limit = 10;

        if(! empty(request('limit'))) {
            $limit = (int)request('limit');
        }

        $blogs->take($limit);

        if(! empty(request('id'))) {
            $blogs = $blogs->whereNotIn('id', [(int)request('id')]);
        }

        return BlogResource::collection($blogs->get());
    }
}