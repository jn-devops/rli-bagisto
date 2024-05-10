<?php

namespace Webkul\BulkUpload\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
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
    ) {
    }

    /**
     * Read All URL and return image
     *
     * @param int
     * @return \Illuminate\Http\JsonResponse
     */
    public function readUrls($id)
    {
        $this->validate(request(), [
            'urls' => 'required',
        ]);

        $urls = explode(',', request('urls'));

        if (! empty($urls)) {
            $imageZipName = $imageName = [];

            foreach ($urls as $url) {
                $response = Http::get($url);

                if ($response->successful()) {
                    $dir = 'product/' . $id;

                    $manager = new ImageManager();

                    $fileName = Str::random(40) . '.webp';

                    $file = $dir . '/' . $fileName;

                    $image = $manager->make($response->body())->encode('webp');

                    $imageZipName[] = [
                        'url'       => config('app.url') . '/storage/' . $file,
                    ];
    
                    $imageName[] = $fileName;

                    Storage::put($file, $image);

                    return new JsonResponse([
                        'images' => $imageZipName,
                        'names'  => implode(',', $imageName),
                    ]);

                } elseif($response->status() === 404) {

                    Log::info('================ CDN Image Uploader if Image Not Found ================');

                    Log::info($url);

                    return new JsonResponse([
                        'images' => null,
                        'names'  => [],
                    ]);
                }
            }
        }
    }

    /**
     * Store Product URL
     *
     * @return \Illuminate\Http\JsonResponse
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

        $property = $this->productPropertiesRepository->updateOrCreate([
            'product_id' => $property['product_id'],
            'image_url'  => $property['image_url'],
        ], $property);

        $slot_id = str_replace('resizable_', '', request()->input('slot_id'));

        $propertyFlats = $this->productPropertyFlatsRepository->updateOrCreate([
            'x_coordinate' => request()->input('x_coordinate'),
            'y_coordinate' => request()->input('y_coordinate'),
            'property_id'  => $property->id,
            'slot_id'      => $slot_id,
        ], [
            'property_id'  => $property->id,
            'slot_id'      => $slot_id,
            'flat_numbers' => request()->input('flat_numbers'),
            'x_coordinate' => request()->input('x_coordinate'),
            'y_coordinate' => request()->input('y_coordinate'),
        ]);

        return new JsonResponse([
            'slot'    => $propertyFlats,
            'message' => 'slot added successfully',
        ]);
    }

    /**
     * get Product URL
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function productUrlGet()
    {
        if (! request()->has('product_id')) {
            return new JsonResponse([]);
        }

        return new JsonResponse([
            'flats'  => $this->productPropertiesRepository->with('slots')
                ->where([
                    'product_id' => request('product_id'),
                    'image_url'  => request('image_url'),
                ])->get(),
        ]);
    }

    /**
     * get slot
     *
     * @return mixed
     */
    public function getSlot()
    {
        if (request()->has('slot_id')
                && request()->has('product_id')) {
            return new JsonResponse([
                'flat'  => $this->productPropertiesRepository->with('slot')->where([
                    'product_id' => request('product_id'),
                    'image_url'  => request('image_url'),
                ])->first(),
            ]);
        }

        return false;
    }

    /**
     * update slot Coordinate
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSlotCoordinate()
    {
        request()->validate([
            'product_id'        => 'required',
            'image_url'         => 'required',
            'slot.x_coordinate' => 'required',
            'slot.y_coordinate' => 'required',
            'slot.slot_id'      => 'required',
        ]);

        $productProperties = $this->productPropertiesRepository->updateOrCreate([
            'product_id' => request()->input('product_id'),
            'image_url'  => request()->input('image_url'),
        ], [
            'product_id' => request()->input('product_id'),
            'image_url'  => request()->input('image_url'),
        ]);

        $slot_id = str_replace('resizable_', '', request()->input('slot.slot_id'));

        return $this->productPropertyFlatsRepository->updateOrCreate([
            'slot_id'     => (int) $slot_id,
            'property_id' => $productProperties->id,
        ], [
            'slot_id'      => (int) $slot_id,
            'property_id'  => $productProperties->id,
            'x_coordinate' => request()->input('slot.x_coordinate'),
            'y_coordinate' => request()->input('slot.y_coordinate'),
            'width'        => request()->input('slot.width'),
            'height'       => request()->input('slot.height'),
        ]);
    }
}
