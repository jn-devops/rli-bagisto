<?php

namespace Webkul\GoogleShoppingFeed\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class MapAttribute extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "product_id"     => "required",
            "title_id"       => "required",
            "description_id" => "required",
            "brand_id"       => "required",
            "color_id"       => "required",
            "weight_id"      => "required",
        ];
    }

    /**
     * Custom message for validation.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'product_id.required'     => 'Product ID is a required field.',
            'title_id.required'       => 'Title is a required field.',
            'description_id.required' => 'Description is a required field.',
            'brand_id.required'       => 'Brand is a required field.',
            'color_id.required'       => 'Color is a required field.',
            'weight_id.required'      => 'Weight is a required field.',
        ];
    }
}