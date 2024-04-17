<?php

namespace Webkul\Enclaves\Listeners;

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
        
        $category->btn_text = $data['btn_text'];
        $category->btn_color = $data['btn_color'];
        $category->btn_background_color = $data['btn_background_color'];
        $category->btn_border_color = $data['btn_border_color'];
        $category->sort = $data['sort'];

        $category->save();
    }
}
