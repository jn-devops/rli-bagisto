<?php

namespace Webkul\Enclaves\Listeners;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category
{
    /**
     * After Customer is Create
     *
     * @return void
     */
    public function afterCreateOrUpdate($category)
    {
        $data = request()->all();

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
