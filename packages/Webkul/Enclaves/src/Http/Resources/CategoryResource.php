<?php

namespace Webkul\Enclaves\Http\Resources;

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
                'banner_url' => $this->banner_url,
                'logo_url'   => $this->logo_url,
            ],
            'sort'                 => $this->sort,
            'btn_border_color'     => $this->btn_border_color,
            'btn_background_color' => $this->btn_background_color,
            'btn_color'            => $this->btn_color,
        ];
    }
}
