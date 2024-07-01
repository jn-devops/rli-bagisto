<?php

namespace Webkul\GoogleShoppingFeed\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Webkul\GoogleShoppingFeed\Imports\DataGridImport;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\GoogleShoppingFeed\DataGrids\MapCategoryDataGrid;
use Webkul\GoogleShoppingFeed\Repositories\MapGoogleCategoryRepository;

class CategoryController extends Controller
{
    /**
     * Holds the list of all google category from local file
     * 
     * @var array
     */
    protected $googleCategory;
    
    /**
     * Create new controller instance
     *
     *  @return void
     */
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected MapGoogleCategoryRepository $mapGoogleCategoryRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(MapCategoryDataGrid::class)->toJson();
        }

        return view('google_feed::admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->googleCategory = (new DataGridImport)->toArray(__DIR__ . '/../../Data/category.ods');
        
        $storeCategory = $this->categoryRepository->all();
        
        $googleCategory = $this->googleCategory[0];
        
        return view('google_feed::admin.category.create')->with([
            'googleCategory' => $googleCategory, 
            'storeCategory'  => $storeCategory,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = request()->all();

        if (is_null($requestData['bagisto_category'][0])) {
            session()->flash('error', trans('google_feed::app.admin.store.select-store-category'));

            return redirect()->back();
        }

        if (is_null($requestData['origin_category'][0])) {
            session()->flash('error', trans('google_feed::app.admin.store.select-google-category'));

            return redirect()->back();
        }

        $category = [
            'category_id'          => end($requestData['bagisto_category']) ? end($requestData['bagisto_category']) : $requestData['bagisto_category'][count($requestData['bagisto_category']) - 2],
            'google_category_path' => implode('>', $requestData['origin_category']),
        ];

        $this->mapGoogleCategoryRepository->create($category);

        session()->flash('success', trans('google_feed::app.admin.map-categories.success-save') );

        return redirect()->route('google_feed.category.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function massDestroy()
    {
        $this->mapGoogleCategoryRepository->whereIn('id', request()->input('indices'))->delete();

        return new JsonResponse([
            'message' => trans('google_feed::app.admin.map-categories.success-delete')
        ], 200);
    }
}