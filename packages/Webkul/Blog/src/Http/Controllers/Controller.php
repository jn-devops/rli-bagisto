<?php

namespace Webkul\Blog\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Webkul\Blog\Repositories\BlogCategoryRepository;
use Webkul\Blog\Repositories\BlogCommentRepository;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Blog\Repositories\BlogTagRepository;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;
use Webkul\User\Repositories\AdminRepository;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected BlogRepository $blogRepository,
        protected AdminRepository $adminRepository,
        protected BlogCategoryRepository $blogCategoryRepository,
        protected CoreConfigRepository $coreConfigRepository,
        protected BlogTagRepository $blogTagRepository,
        protected BlogCommentRepository $blogCommentRepository,
        protected ThemeCustomizationRepository $themeCustomizationRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToLogin()
    {
        return redirect()->route('admin.session.create');
    }

    /**
     * Get the value of a configuration setting by its code.
     *
     * This function retrieves the value of a configuration setting from the
     * database using its unique code. If the configuration setting is not found,
     * the function returns null.
     *
     * @param string
     * @return mixed
     */
    public function getConfigByKey($code = '')
    {
        $config_val = null;
        if (! empty($code)) {
            $config = $this->coreConfigRepository->where('code', $code)->first();

            if ($config) {
                $config_val = $config->value;
            }
        }

        return $config_val;
    }

    /**
     * Get all blog tags with their corresponding post count.
     *
     * This function retrieves all blog tags from the database and calculates their
     * post count by counting the number of occurrences of each tag in the blog posts.
     * The function returns a collection of blog tags with their corresponding post
     * count.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTagsWithCount()
    {
        $blogTags = $this->blogRepository->get()->pluck('tags')->toarray();

        $allBlogTags = explode(',', implode(',', $blogTags));

        $allBlogTags = (! empty($allBlogTags)) ? $allBlogTags : [];

        $allBlogTagsArrCount = array_count_values($allBlogTags);

        $tags = $this->blogTagRepository->where('status', 1)->get()->each(function ($item) use ($allBlogTagsArrCount) {
            $item->count = 0;

            $tagId = ($item && isset($item->id) && ! empty($item->id) && ! is_null($item->id)) ? (int) $item->id : 0;

            if (count($allBlogTagsArrCount) > 0 && (int) $tagId > 0) {
                $item->count = (array_key_exists($tagId, $allBlogTagsArrCount)) ? (int) $allBlogTagsArrCount[$tagId] : 0;
            }
        });

        return $tags;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getCommentsRecursive($blog_id = 0, $parent_id = 0)
    {
        $commentsResponse = [];

        $comments = $this->blogCommentRepository
            ->where('post', $blog_id)
            ->where('parent_id', $parent_id)
            ->where('status', 2)
            ->get();

        if (! empty($comments)) {
            if (! empty($comments)) {
                foreach ($comments as $key => $comment) {
                    $commentsResponse[$key]['replay'] = $this->getCommentsRecursive($blog_id, $comment['id']);
                }
            }
        }

        return $commentsResponse;
    }
}