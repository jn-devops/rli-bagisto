<?php

namespace Webkul\Enclaves\Http\Controllers\Category;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Shop\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Default short
     */
    protected const SHORT = "desc";

    /**
     * Default limt
     */
    protected const LIMIT = 10;

    /**
     */
    public function __construct(
        protected CategoryRepository $categoryRepository,
    ) {
    }
    
    /**
     * Get all categories.
     */
    public function index(): JsonResource
    {
        /**
         * These are the default parameters. By default, only the enabled category
         * will be shown in the current locale.
         */
        $defaultParams = [
            'status'    => 1,
            'locale'    => app()->getLocale(),
        ];

        $categories = $this->categoryRepository
            ->leftJoin('category_translations', 'category_translations.category_id', '=', 'categories.id')
            ->where($defaultParams)
            ->whereNotNull('parent_id')
            ->limit(request('limit') ?? self::LIMIT)
            ->orderBy('categories.id',request('short') ?? self::SHORT)
            ->get();

        return CategoryResource::collection($categories);
    }
}