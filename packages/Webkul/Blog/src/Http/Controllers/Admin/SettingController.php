<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Core\Models\CoreConfig;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $configKeys = [
            'blog_post_per_page',
            'blog_post_maximum_related',
            'blog_post_recent_order_by',
            'blog_post_show_categories_with_count',
            'blog_post_show_tags_with_count',
            'blog_post_show_author_page',
            'blog_post_enable_comment',
            'blog_post_allow_guest_comment',
            'blog_post_enable_comment_moderation',
            'blog_post_maximum_nested_comment',
            'blog_seo_meta_title',
            'blog_seo_meta_keywords',
            'blog_seo_meta_description',
        ];

        $settingDeatils = $settings = [];

        $settings = $this->coreConfigRepository->whereIn('code', $configKeys)->get();

        if (! empty($settings)) {
            $settings = $settings->toarray();

            foreach ($settings as $setting) {
                $settingDeatils[$setting['code']] = $setting['value'];
            }
        }

        foreach ($configKeys as $configKey) {
            $settings[$configKey] = array_key_exists($configKey, $settingDeatils) ? $settingDeatils[$configKey] : '';
        }

        return view('blog::admin.setting.index', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->all();

        $configExceptKeys = [
            'switch_blog_post_show_categories_with_count',
            'switch_blog_post_show_tags_with_count',
            'switch_blog_post_show_author_page',
            'switch_blog_post_enable_comment',
            'switch_blog_post_allow_guest_comment',
            'switch_blog_post_enable_comment_moderation',
        ];

        if (! empty($data)) {
            foreach ($data as $key => $value) {
                if (! in_array($key, $configExceptKeys)) {

                    $CoreConfig = $this->coreConfigRepository->where('code', $key)->first();

                    if ($CoreConfig) {

                        $CoreConfig->value = $value;
                    } else {
                        $CoreConfig = new CoreConfig();

                        $CoreConfig->code = $key;

                        $CoreConfig->value = $value;
                    }

                    $CoreConfig->save();
                }
            }
        }

        session()->flash('success', trans('blog::app.setting.success'));

        return redirect()->route('admin.blog.setting.index');
    }
}
