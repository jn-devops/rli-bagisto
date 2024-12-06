<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\EnclaveMenu;

use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Enclaves\Http\Controllers\Shop\Category\CategoryController;

class EnclaveMenuController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CategoryController $categoryController,
    ) {}

    /**
     * Get all categories.
     */
    public function menuItems()
    {
        $menuItems = [
            [
                'label' => trans('enclaves::app.shop.menus.homepage'),
                'type'  => 'link',
                'url'   => route('shop.home.index'),
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => trans('enclaves::app.shop.menus.about-us'),
                'type'  => 'link',
                'url'   => route('shop.cms.page', 'about-us'),
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => trans('enclaves::app.shop.menus.ask-joy'),
                'type'  => 'button',
                'modal' => 'ask-joy-modal',
                'class' => 'openAskToJoyModel',
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => trans('enclaves::app.shop.menus.our-brands'),
                'type'  => 'button',
                'visible' => true,
                'submenu' => $this->productCategories(),
            ],
            [
                'label' => trans('enclaves::app.shop.menus.partner-with-us'),
                'type'  => 'link',
                'url'   => route('shop.partners.index'),
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => trans('enclaves::app.shop.menus.announcements'),
                'type'  => 'link',
                'url'   => route('shop.article.index'),
                'visible' => true,
                'submenu' => []
            ],
            [
                'label' => trans('enclaves::app.shop.menus.contact-us'),
                'type'  => 'link',
                'url'   => route('shop.cms.page', 'contact-us'),
                'visible' => true,
                'submenu' => []
            ]
        ];

        return response()->json([
            'data' => $menuItems,
        ]);
    }

    public function productCategories()
    {
        $categories = [];

        foreach ($this->categoryController->index() as $category) {
            $categories[] = [
                'label'   => $category->name,
                'type'    => 'category',
                'url'     => $category->url,
                'visible' => true
            ];
        }

        return $categories;
    }
}
