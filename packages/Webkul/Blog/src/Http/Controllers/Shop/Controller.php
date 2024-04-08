<?php

namespace Webkul\Blog\Http\Controllers\Shop;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Webkul\Blog\Repositories\BlogRepository;
use Webkul\Blog\Repositories\BlogTagRepository;
use Webkul\Core\Repositories\CoreConfigRepository;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public function __construct(
        protected CoreConfigRepository $coreConfigRepository,
        protected BlogRepository $blogRepository,
        protected BlogTagRepository $blogTagRepository,
    ) {
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

        $allBlogTags_arr = (! empty($allBlogTags_arr) && count($allBlogTags_arr) > 0 ) ? $allBlogTags_arr : [];

        $allBlogTags_arr_el_count = array_count_values($allBlogTags_arr);

        $tags = $this->blogTagRepository->where('status', 1)
                        ->get()
                        ->each(function ($item) use ($allBlogTags_arr, $allBlogTags_arr_el_count) {
            $item->count = 0;

            $tag_id = ($item && ! empty($item->id)) ? (int)$item->id : 0;
            
            if (count($allBlogTags_arr_el_count) > 0 
                    && (int)$tag_id > 0) {
                $item->count = (array_key_exists($tag_id, $allBlogTags_arr_el_count)) ? (int)$allBlogTags_arr_el_count[$tag_id] : 0;
            }
        });

        return $tags;
    }
}