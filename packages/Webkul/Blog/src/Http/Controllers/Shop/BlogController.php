<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;
use Webkul\Blog\Http\Controllers\Shop\Controller;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Blog\Repositories\BlogTagRepository;
use Webkul\Blog\Repositories\BlogCommentRepository;
use Webkul\Blog\Repositories\BlogCategoryRepository;

class BlogController extends Controller
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
        protected BlogRepository $blogRepository,
        protected BlogCommentRepository $blogCommentRepository,
        protected BlogCategoryRepository $blogCategoryRepository,
        protected BlogTagRepository $blogTagRepository,
        protected CoreConfigRepository $coreConfigRepository,
    ) {

        dd($this->blogRepository);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $paginate = $this->getConfigByKey('blog_post_per_page');

        $paginate = (! empty($paginate)) ? (int)$paginate : 9;

        $blogs = $this->blogRepository->where('status', 1)->orderBy('id', 'desc')->paginate($paginate);

        $categories = $this->blogCategoryRepository->where('status', 1)->get();

        $tags = $this->getTagsWithCount();

        $customizations = $this->themeCustomizationRepository->orderBy('sort_order')->findWhere([
            'status'     => self::STATUS,
            'channel_id' => core()->getCurrentChannel()->id
        ]);

        $show_categories_count = $this->getConfigByKey('blog_post_show_categories_with_count');

        $show_tags_count = $this->getConfigByKey('blog_post_show_tags_with_count');

        $show_author_page = $this->getConfigByKey('blog_post_show_author_page');

        $blog_seo_meta_title = $this->getConfigByKey('blog_seo_meta_title');

        $blog_seo_meta_keywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $blog_seo_meta_description = $this->getConfigByKey('blog_seo_meta_description');

        return view('shop.article.index', compact('blogs', 'categories', 'customizations', 'tags', 'show_categories_count', 'show_tags_count', 'show_author_page', 'blog_seo_meta_title', 'blog_seo_meta_keywords', 'blog_seo_meta_description'));
    }

    public function authorPage($author_id)
    {
        $show_author_page = $this->getConfigByKey('blog_post_show_author_page');

        if ((int)$show_author_page != 1) {
            abort(404);
        }

        $author_data = $this->blogRepository->findOneByField('author_id', $author_id);

        $paginate = $this->getConfigByKey('blog_post_per_page');

        $paginate = (! empty($paginate)) ? (int)$paginate : 9;

        $blogs = $this->blogRepository->where('author_id', $author_id)->where('status', 1)->orderBy('id', 'desc')->paginate($paginate);

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

        return view('blog::shop.author.index', compact(
                'blogs',
                'categories',
                'customizations',
                'tags',
                'author_data',
                'show_categories_count',
                'show_tags_count',
                'show_author_page',
                'blog_seo_meta_title',
                'blog_seo_meta_keywords',
                'blog_seo_meta_description'
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
        $blog = $this->blogCategoryRepository->findOneByField('slug', $slug);

        $blog_id = (! empty($blog)) ? (int)$blog->id : 0;

        $blog_tags = $this->blogTagRepository->whereIn('id', explode(',',$blog->tags))->get();

        $paginate = $this->getConfigByKey('blog_post_maximum_related');

        $paginate = (! empty($paginate)) ? (int)$paginate : 4;

        $blog_category_ids = array_merge(explode(',', $blog->default_category), explode(',', $blog->categorys) );

        $related_blogs = $this->blogTagRepository->orderBy('id', 'desc')->where('status', 1)->whereNotIn('id', [$blog_id]);

        if (is_array($blog_category_ids) 
                && ! empty($blog_category_ids)) {

            $related_blogs = $related_blogs->whereIn('default_category', $blog_category_ids)->where(
                function ($query) use ($blog_category_ids) {
                    foreach ($blog_category_ids as $key => $blog_category_id) {
                        if ($key == 0) {
                            $query->whereRaw('FIND_IN_SET(?, categorys)', [$blog_category_id]);
                        } else {
                            $query->orWhereRaw('FIND_IN_SET(?, categorys)', [$blog_category_id]);
                        }
                    }
                }
            );
        }

        $related_blogs = $related_blogs->paginate($paginate);

        $categories = $this->blogCategoryRepository->where('status', 1)->get();

        $tags = $this->getTagsWithCount();
        
        $comments = $this->getCommentsRecursive($blog_id);

        $total_comments = $this->blogCommentRepository->where('post', $blog_id)->where('status', 2)->get();

        $total_comments_cnt = ( !empty( $total_comments ) && count( $total_comments ) > 0 ) ? $total_comments->count() : 0;

        $loggedIn_user_name = $loggedIn_user_email = null;

        $loggedIn_user = auth()->guard('customer')->user();

        if (! empty($loggedIn_user)) {
            $loggedIn_user_email = (isset($loggedIn_user->email) && !empty($loggedIn_user->email) && !is_null($loggedIn_user->email) ) ? $loggedIn_user->email : null;
            
            $loggedIn_user_first_name = (isset($loggedIn_user->first_name) && !empty($loggedIn_user->first_name) && !is_null($loggedIn_user->first_name) ) ? $loggedIn_user->first_name : null;
            
            $loggedIn_user_last_name = (isset($loggedIn_user->last_name) && !empty($loggedIn_user->last_name) && !is_null($loggedIn_user->last_name) ) ? $loggedIn_user->last_name : null;
           
            $loggedIn_user_name = $loggedIn_user_first_name;
           
            $loggedIn_user_name = (isset($loggedIn_user_name) && !empty($loggedIn_user_name) && !is_null($loggedIn_user_name) ) ? ( $loggedIn_user_name . ' ' . $loggedIn_user_last_name ) : $loggedIn_user_last_name;
        }

        $show_categories_count = $this->getConfigByKey('blog_post_show_categories_with_count');

        $show_tags_count = $this->getConfigByKey('blog_post_show_tags_with_count');

        $show_author_page = $this->getConfigByKey('blog_post_show_author_page');

        $enable_comment = $this->getConfigByKey('blog_post_enable_comment');

        $allow_guest_comment = $this->getConfigByKey('blog_post_allow_guest_comment');

        $maximum_nested_comment = $this->getConfigByKey('blog_post_maximum_nested_comment');

        $blog_seo_meta_title = $this->getConfigByKey('blog_seo_meta_title');

        $blog_seo_meta_keywords = $this->getConfigByKey('blog_seo_meta_keywords');

        $blog_seo_meta_description = $this->getConfigByKey('blog_seo_meta_description');

        return view('blog::shop.velocity.view', compact('blog', 'categories', 'tags', 'comments', 'total_comments', 'total_comments_cnt', 'related_blogs', 'blog_tags', 'show_categories_count', 'show_tags_count', 'show_author_page', 'enable_comment', 'allow_guest_comment', 'maximum_nested_comment', 'loggedIn_user', 'loggedIn_user_name', 'loggedIn_user_email', 'blog_seo_meta_title', 'blog_seo_meta_keywords', 'blog_seo_meta_description'));
    }

    public function getCommentsRecursive($blog_id = 0, $parent_id = 0)
    {
        $comments_datas = [];

        $comments_details = $this->blogCommentRepository
                                ->where('post', $blog_id)
                                ->where('parent_id', $parent_id)
                                ->where('status', 2)
                                ->get();

        if (! empty($comments_details)) {
            $comments_datas = $comments_details->toarray();

            if (! empty($comments_datas)) {
                foreach ($comments_datas as $key => $comments_data) {
                    $comments_datas[$key]['replay'] = $this->getCommentsRecursive($blog_id, $comments_data['id']);
                }
            }
        }

        return $comments_datas;
    }
}