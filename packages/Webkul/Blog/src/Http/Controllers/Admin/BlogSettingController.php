<?php

namespace Webkul\Blog\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Models\CoreConfig;
use Webkul\Core\Repositories\CoreConfigRepository;

class BlogSettingController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CoreConfigRepository $coreConfigRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $post_orders = array(
            'recent'     => 'Recent',
            'popularity' => 'Popularity',
            'random'     => 'Random',
        );

        $configDatakeys = [
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

        $settings = $this->coreConfigRepository->whereIn('code', $configDatakeys)->get();

        if (! empty($settings) 
            && count($settings) > 0) {
            $settings = $settings->toarray();

            foreach ($settings as $setting) {
                $settingDeatils[$setting['code']] = $setting['value'];
            }
        }

        foreach ($configDatakeys as $configDatakey) {
            $settings[$configDatakey] = (array_key_exists($configDatakey, $settingDeatils)) ? $settingDeatils[$configDatakey] : '';
        }

        return view('blog::admin.setting.index', compact('post_orders', 'settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $requests = request()->all();
    
        $config_except_keys = [
            'switch_blog_post_show_categories_with_count',
            'switch_blog_post_show_tags_with_count',
            'switch_blog_post_show_author_page',
            'switch_blog_post_enable_comment',
            'switch_blog_post_allow_guest_comment',
            'switch_blog_post_enable_comment_moderation',
        ];

        if (! empty($requests)) {
            foreach ($requests as $requestKey => $request) {
                if (! in_array($requestKey, $config_except_keys) ) {
                    $coreConfig = $this->coreConfigRepository->where('code', $requestKey)->first();

                    if ($coreConfig) {
                        $coreConfig->value = $request;
                    } else {
                        $coreConfig = new CoreConfig;

                        $coreConfig->code = $requestKey;

                        $coreConfig->value = $request;
                    }

                    $coreConfig->save();
                }
            }
        }

        session()->flash('success', 'Save Blog Setting Successfully');

        return redirect()->route('admin.blog.setting.index');
    }
}
