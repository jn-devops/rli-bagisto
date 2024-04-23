<?php

namespace Webkul\Blog\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'name'        => substr($this->name, 0, 75). '..',
            'slug'        => $this->slug,
            'category'    => $this->category,
            'base_image'  => $this->src ? Storage::url($this->src) : null,
        ];
    }
}
