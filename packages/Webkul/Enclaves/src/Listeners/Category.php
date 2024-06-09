<?php

namespace Webkul\Enclaves\Listeners;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category
{
    /**
     * banner Image move one path to other path
     * 
     * @return void
     */
    public function afterUpdateOrCreate($category)
    {
        $data = request()->all();

        $images = ['logo_path', 'banner_path', 'community_banner_path'];

        foreach ($images as $image) {
            if ($fileImage = request()->input('cdn_image_' . $image)) {

                $filePath = 'category/'. $category->id .'/'. Str::random(40) .'.webp';

                Storage::move($fileImage, $filePath);

                $category->{$image} = $filePath;
            }
        }

        $file = 'community_banner_path';

        $path = 'category/'. $category->id;

        if (request()->hasFile($file)) {
            Storage::delete($path);

            $category->community_banner_path = $path .'/'. Str::random(40) .'.webp';
            
            $manager = new ImageManager();

            $image = $manager->make(request()->file($file)[0])->encode('webp');

            Storage::put($category->community_banner_path, $image);
        } else {
            Storage::delete($path);
        }

        $category->communities_status = $data['switch_status'] ?? 0;
      
        $category->btn_text = $data['btn_text'];
        $category->btn_color = $data['btn_color'];
        $category->btn_background_color = $data['btn_background_color'];
        $category->btn_border_color = $data['btn_border_color'];
        $category->sort = $data['sort'];

        $category->save();
    }
}
