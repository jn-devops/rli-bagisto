<?php

namespace Webkul\Blog\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
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
        if(! empty($this->src)) {
            $src =  Storage::url($this->src);
        } else {
            $src = bagisto_asset('images/medium-product-placeholder.webp', 'shop');
        }

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'short_description' => $this->short_description,
            'description'       => $this->description,
            'author'            => $this->author,
            'post_date'         => Carbon::createFromTimestamp(strtotime($this->published_at))->format('d M Y'),
            'slug'              => $this->slug,
            'base_image'        => $src,
        ];
    }
}
