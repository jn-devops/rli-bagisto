<?php

namespace Webkul\Enclaves\Http\Controllers\Admin\Category;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Category\Repositories\CategoryRepository;

class ReadUrlCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {
    }

    /**
     * Read All URL and return image
     *
     * @param int
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {
        $this->validate(request(), [
            'url'  => 'required',
            'type' => 'required',
        ]);

        $category = $this->categoryRepository->find($id);
        
        $response = Http::get(trim(request()->input('url')));

        if ($response->successful()) {
            $type = request()->input('type');

            $manager = new ImageManager();

            $image = $manager->make($response->body())->encode('webp');

            $category->{$type} = 'category/'.$category->id.'/'.Str::random(40).'.webp';

            Storage::put($category->{$type}, $image);

            $category->save();

            $message = trans('enclaves::app.admin.catalog.category.image.success-message');

            $status = true;
        } elseif($response->status() === 404) {
            $status = false;

            $message = trans('enclaves::app.admin.catalog.category.image.error-message');

            $notFound = request()->input('url');
        }

        return new JsonResponse([
            'status'    => $status,
            'message'   => $message,
            'not_found' => $notFound ?? '',
        ]);
    }

    public function store() 
    {
        $this->validate(request(), [
            'url'  => 'required',
            'type' => 'required',
        ]);

        $images = request()->input('images');

        $response = Http::get(trim(request()->input('url')));

        if ($response->successful()) {
            $type = request()->input('type');

            $manager = new ImageManager();

            $image = $manager->make($response->body())->encode('webp');

            $fileName = Str::random(40) .'.webp';

            $path = 'category/preview-image/'. $type .'/'. $fileName;

            $images[$type] = $path;

            Storage::put($path, $image);

            $message = trans('enclaves::app.admin.catalog.category.image.success-message');

            $status = true;
        } elseif($response->status() === 404) {
            $status = false;

            $message = trans('enclaves::app.admin.catalog.category.image.error-message');

            $notFound = request()->input('url');
        }

        return new JsonResponse([
            'status'    => $status,
            'images'    => $images,
            'message'   => $message,
            'not_found' => $notFound ?? '',
        ]);
    }
}
