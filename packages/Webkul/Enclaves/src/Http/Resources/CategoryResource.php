<?php

namespace Webkul\Enclaves\Http\Resources;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $communityBannerPath = '';

        if($this->community_banner_path) {
            $communityBannerPath = $this->communityBannerPath();
        } else {
            $communityBannerPath = bagisto_asset('images/medium-product-placeholder.webp', 'shop');
        }

        return [
            'id'           => $this->id,
            'parent_id'    => $this->parent_id,
            'name'         => $this->name,
            'slug'         => $this->slug,
            'url_path'     => $this->url_path,
            'status'       => $this->status,
            'position'     => $this->position,
            'display_mode' => $this->display_mode,
            'images'       => [
                'banner_url'            => $this->banner_url,
                'logo_url'              => $this->logo_url,
                'community_banner_path' => $communityBannerPath,
            ],
            'sort'                 => $this->sort,
            'btn_border_color'     => $this->btn_border_color,
            'btn_background_color' => $this->btn_background_color,
            'btn_color'            => $this->btn_color,
            'btn_text'             => $this->btn_text,
        ];
    }

    /**
     * Get community banner path url for the category image.
     *
     * @return string
     */
    public function communityBannerPath()
    {
        return Storage::url($this->community_banner_path);
    }
}
