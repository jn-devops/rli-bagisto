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
            'blog_seo_meta_title',
            'blog_seo_meta_keywords',
            'blog_seo_meta_description',
        ];

        $settingDetails = $settings = [];

        $settings = $this->coreConfigRepository->whereIn('code', $configKeys)->get();

        if (! empty($settings)) {
            foreach ($settings as $setting) {
                $settingDetails[$setting->code] = $setting->value;
            }
        }

        foreach ($configKeys as $configKey) {
            $settings[$configKey] = array_key_exists($configKey, $settingDetails) ? $settingDetails[$configKey] : '';
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
        ];

        foreach ($data ?? [] as $key => $value) {
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

        session()->flash('success', trans('blog::app.setting.index.success'));

        return redirect()->route('admin.blog.setting.index');
    }
}
