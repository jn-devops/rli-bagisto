<?php

namespace Webkul\Enclaves\Http\Controllers\Admin\Theme;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Event;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Theme\Repositories\ThemeCustomizationRepository;

class ThemeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        public ThemeCustomizationRepository $themeCustomizationRepository
    ) {
    }

    /**
     * Edit the theme
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $theme = $this->themeCustomizationRepository->find($id);

        return view('enclaves::admin.settings.themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $locale = request('locale');

        $data = request()->all();
       
        if ($data['type'] == 'static_content') {
            $data[$locale]['options']['html'] = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $data[$locale]['options']['html']);
            $data[$locale]['options']['css'] = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $data[$locale]['options']['css']);
        }

        $data['status'] = request()->input('status') == 'on';

        if ($data['type'] == 'image_carousel') {
            unset($data['options']);
        }

        Event::dispatch('theme_customization.update.before', $id);
       
        $theme = $this->themeCustomizationRepository->update($data, $id);

        if ($data['type'] == 'image_carousel') {
            $this->uploadImage(
                request()->all(),
                $theme
            );
        }

        Event::dispatch('theme_customization.update.after', $theme);

        session()->flash('success', trans('admin::app.settings.themes.update-success'));

        return redirect()->route('admin.settings.themes.index');
    }

    /**
     * Upload images
     *
     * @param  array  $imageOptions
     * @param  \Webkul\Shop\Contracts\ThemeCustomization  $theme
     * @return void|string
     */
    public function uploadImage($data, $theme)
    {
        $locale = core()->getRequestedLocaleCode();
        
        if (isset($data[$locale]['deleted_sliders'])) {
            foreach ($data[$locale]['deleted_sliders'] as $slider) {
                Storage::delete(str_replace('storage/', '', $slider['image']));
            }
        }

        if (! isset($data[$locale]['options'])) {
            return;
        }

        $options = [];

        foreach ($data[$locale]['options'] as $image) {
            $manager = new ImageManager();

            if ($image['isUsingCDN'] === 'true') {
                $imageContent = $manager->make(file_get_contents(trim($image['image_cdn_link'])))->encode('webp');

                $path = 'theme/' . $theme->id . '/' . Str::random(40) . '.webp';

                Storage::put($path, $imageContent);

                if (
                    isset($imageOptions['type'])
                    && $imageOptions['type'] == 'static_content'
                ) {
                    return Storage::url($path);
                }

                $options['images'][] = [
                    'image'       => 'storage/' . $path,
                    'link'        => $image['link'],
                    'button_text'    => $image['button_text'],
                    'slider_syntax'  => $image['slider_syntax'],
                    'image_cdn_link' => $image['image_cdn_link'],
                    'isUsingCDN'     => true,
                ];

            } else {
                if (isset($image['service_icon'])) {
                    $options['services'][] = [
                        'service_icon' => $image['service_icon'],
                        'description'  => $image['description'],
                        'title'        => $image['title'],
                    ];
                } elseif ($image['image'] instanceof UploadedFile) {

                    $path = 'theme/' . $theme->id . '/' . Str::random(40) . '.webp';

                    Storage::put($path, $manager->make($image['image'])->encode('webp'));

                    if (
                        isset($imageOptions['type'])
                        && $imageOptions['type'] == 'static_content'
                    ) {
                        return Storage::url($path);
                    }

                    $options['images'][] = [
                        'image'       => 'storage/' . $path,
                        'link'        => $image['link'],
                        'button_text'    => $image['button_text'],
                        'slider_syntax'  => $image['slider_syntax'],
                        'image_cdn_link' => $image['image_cdn_link'],
                        'isUsingCDN'     => false,
                    ];
                } else {
                    $options['images'][] = $image;
                }
            }
        }

        $translatedModel = $theme->translate($locale);
        $translatedModel->options = $options ?? [];
        $translatedModel->theme_customization_id = $theme->id;
        $theme->save();
    }
}
