<?php

namespace Webkul\Enclaves\Http\Controllers\Admin\Channel;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Webkul\Enclaves\Http\Controllers\Controller;

class ReadChannelUrlController extends Controller
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
    public function readUrl()
    {
        $this->validate(request(), [
            'link' => 'required',
            'type' => 'required',
        ]);

        $response = Http::get(trim(request()->input('link')));

        if ($response->successful()) {
            $type = request()->input('type');

            $manager = new ImageManager();

            $image = $manager->make($response->body())->encode('webp');

            $folderName = $type;

            $fileName = Str::random(40) . '.webp';

            $imagePath = 'channel/' . $type . '/'. $fileName;

            Storage::put($imagePath, $image);

            return new JsonResponse([
                'status' => true,
                'file'   => implode('|', [$type, $folderName, $imagePath, $fileName]),
                'name'   => Storage::url($imagePath),
            ]);

        } elseif($response->status() === 404) {
            return new JsonResponse([
                'status'  => false,
                'url'     => request()->input('link'),
            ]);
        }
    }
}
