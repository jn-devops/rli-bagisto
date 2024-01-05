<?php

namespace Webkul\BulkUpload\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Webkul\BulkUpload\Repositories\ProductPropertiesRepository;
use Webkul\BulkUpload\Repositories\ProductPropertyFlatsRepository;

class ReadProductUrlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ProductPropertiesRepository $productPropertiesRepository,
        protected ProductPropertyFlatsRepository $productPropertyFlatsRepository,
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

        $property = request()->only([
            'image_url',
            'product_id',
        ]);

        $slot = $this->productPropertiesRepository->updateOrCreate([
            'product_id'    => $property['product_id'],
            'image_url'     => $property['image_url'],
        ], $property);

        request()->request->add(['property_id' => $slot->id]);

        $propertyFlats = request()->only([
            'property_id',
            'slot_id',
            'flat_numbers',
            'x_coordinate',
            'y_coordinate',
        ]);

        $propertyFlats = $this->productPropertyFlatsRepository->updateOrCreate([
                'x_coordinate' => $propertyFlats['x_coordinate'],
                'y_coordinate' => $propertyFlats['y_coordinate'],
                'property_id'  => $propertyFlats['property_id'],
                'slot_id'      => $propertyFlats['slot_id'],
            ], $propertyFlats);

        return new JsonResponse([
            'slot'      => $propertyFlats,
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
            'flats'  => $this->productPropertiesRepository->with('slots')->where(['product_id' => request('product_id'), 'image_url' => request('image_url')])->get(),
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
                'flat'  => $this->productPropertiesRepository->with('slot')->where([
                                'product_id' => request('product_id'),
                                'image_url'  => request('image_url'),
                            ])
                            ->first(),
            ]);
        }

        return false;
    }
}
