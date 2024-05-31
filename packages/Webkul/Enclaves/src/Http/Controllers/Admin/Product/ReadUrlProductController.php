<?php

namespace Webkul\Enclaves\Http\Controllers\Admin\Product;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Webkul\Enclaves\Http\Controllers\Controller;

class ReadUrlProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
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
            'urls' => 'required',
        ]);

        $urls = explode(',', request('urls'));

        $imageZipName = $imageName = [];
        
        $imageNotFound = [];

        if (! empty($urls)) {
            foreach ($urls as $url) {
                $response = Http::get(trim($url));
              
                if ($response->successful()) {
                    $dir = 'product/' . $id;

                    $manager = new ImageManager();

                    $fileName = Str::random(40) . '.webp';

                    $file = $dir . '/' . $fileName;

                    $image = $manager->make($response->body())->encode('webp');
                    
                    $imageZipName[] = [
                        'url' => config('app.url') . '/storage/' . $file,
                    ];
    
                    $imageName[] = $fileName;

                    Storage::put($file, $image);
                } elseif($response->status() === 404) {
                    $imageNotFound[] = $url;
                }
            }
        }

        return new JsonResponse([
            'images'          => $imageZipName,
            'names'           => implode(',', $imageName),
            'image_not_found' => $imageNotFound,
        ]);
    }
}
