<?php

namespace Webkul\Enclaves\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Webkul\Core\Eloquent\Repository;
use Webkul\Shop\Contracts\ThemeCustomization;

class ThemeCustomizationRepository extends Repository
{
    /**
     * Specify model class name.
     */
    public function model(): string
    {
        return ThemeCustomization::class;
    }

    /**
     * Upload images
     *
     * @param  array  $imageOptions
     * @param  \Webkul\Shop\Contracts\ThemeCustomization  $theme
     * 
     * @return void|string
     */
    public function uploadImage($imageOptions, $theme, $deletedSliderImages = [])
    {
        foreach ($deletedSliderImages as $slider) {
            Storage::delete(str_replace('storage/', '', $slider['image']));
        }

        if (isset($imageOptions['options'])) {
            $options = [];

            foreach ($imageOptions['options'] as $image) {
                $manager = new ImageManager();

                if($image['isUsingCDN'] === 'true') {
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
                    if ($image['image'] instanceof UploadedFile) {
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
        }

        $theme->options = $options ?? [];
    
        $theme->save();
    }
}