<?php

namespace Webkul\Blog\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Blog\Repositories\BlogTagRepository;
use Webkul\Blog\Repositories\BlogCommentRepository;
use Webkul\Blog\Repositories\BlogCategoryRepository;
use Webkul\User\Repositories\AdminRepository;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;

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


    public function getTagsWithCount()
    {
        $blogTags = $this->blogRepository->get()->pluck('tags')->toarray();
        
        $allBlogTags_arr = explode(',', implode(',', $blogTags));
        
        $allBlogTags_arr = (! empty($allBlogTags_arr) && count($allBlogTags_arr) > 0) ? $allBlogTags_arr : [];
        
        $allBlogTags_arr_el_count = array_count_values($allBlogTags_arr);
        
        $tags = $this->blogTagRepository->where('status', 1)->get()->each(function ($item) use ($allBlogTags_arr_el_count) {
            $item->count = 0;
            
            $tag_id = ($item && isset($item->id) && ! empty($item->id) && ! is_null($item->id)) ? (int) $item->id : 0;
            
            if (count($allBlogTags_arr_el_count) > 0 && (int) $tag_id > 0) {
                $item->count = (array_key_exists($tag_id, $allBlogTags_arr_el_count)) ? (int) $allBlogTags_arr_el_count[$tag_id] : 0;
            }
        });

        return $tags;
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