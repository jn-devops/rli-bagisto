<?php

namespace Webkul\BulkUpload\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Webkul\BulkUpload\Repositories\ProductFlatSlotsRepository;

class ReadProductUrlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ProductFlatSlotsRepository $productFlatSlotsRepository,
    )
    {
    }
    
    /**
     * Read All URL and return image
     */
    public function readUrls($id)
    {
        $this->validate(request(), [
            'urls' => 'required',
        ]);

        $urls = explode(',', request('urls'));

        if(! empty($urls)) {
            $imageZipName = $imageName = [];

            foreach ($urls as $url) {
                $manager = new ImageManager();

                $image = $manager->make(file_get_contents(trim($url)))->encode('webp');

                $fileName = Str::random(40) . '.webp';

                $path = 'product/'. $id. '/' . $fileName;

                $imageZipName[] = [
                    'url'       => config('app.url').'/storage/'. $path,
                ];

                $imageName[] = $fileName;

                Storage::put($path , $image);
            }
        }

        return new JsonResponse([
                'images'    => $imageZipName,
                'names'     => implode(',', $imageName)
        ]);
    }

    /**
     * Store Product URL
     */
    public function productUrlStore() 
    {
        $this->validate(request(), [
            'flat_numbers' => 'required',
            'image_url'    => 'required',
            'product_id'   => 'required',
            'slot_id'      => 'required',
            'x_coordinate' => 'required',
            'y_coordinate' => 'required',
        ]);

        $slot = $this->productFlatSlotsRepository->updateOrCreate([
            'slot_id'       => request('slot_id'),
            'product_id'    => request('product_id'),
            'image_url'     => request('image_url'),
        ], request()->all());

        return new JsonResponse([
            'slot'      => $slot,
            'message'   => 'slot added successfully',
        ]);
    }

    /**
     * get Product URL
     */
    public function productUrlGet()
    {
        if(! request()->has('product_id'))
        {
            return new JsonResponse([]);
        }

        return new JsonResponse([
            'slots'  => $this->productFlatSlotsRepository->findWhere(['product_id' => request('product_id'), 'image_url' => request('image_url')]),
        ]);
    }

    /**
     * get slot
     */
    public function getSlot()
    {
        if(request()->has('slot_id') && request()->has('product_id'))
        {
            return new JsonResponse([
                'slot'  => $this->productFlatSlotsRepository->findOneWhere(request()->all()),
            ]);
        }

        return false;
    }
}
