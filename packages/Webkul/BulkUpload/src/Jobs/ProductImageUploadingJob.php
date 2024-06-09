<?php

namespace Webkul\BulkUpload\Jobs;

use Illuminate\Support\Str;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Webkul\BulkUpload\Helpers\ResultHelper;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductImageRepository;

class ProductImageUploadingJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param  array  $chunk
     */
    public function __construct(
        protected $csvImageData
    ) {
    }

    /**
     * Execute the job.
     *
     * Store the uploaded or error of product records
     */
    public function handle()
    {
        Log::info('Bulk Upload Product Image Start');

        if (isset($this->csvImageData)
                && ! empty($this->csvImageData)) {
            $this->storeImageZip($this->csvImageData);
        }

        Log::info('Bulk Upload Product Image End');
    }

    /**
     * Store and extract images from a zip file, removing any single quotes
     * or double quotes in image filenames.
     *
     * @param  $dataFlowProfileRecord  - The data flow profile record containing image information.
     * @return array - An array containing information about the extracted images.
     */
    public function storeImageZip($dataFlowProfileRecord)
    {
        foreach ($dataFlowProfileRecord as $images) {
            $product = app(ProductRepository::class)->findOneByField('sku', $images['sku']);

            if (! $images['url_links'] && ! $product) {
                continue;
            }

            foreach (json_decode($images['url_links']) as $image) {

                try {
                    $response = Http::get(trim($image));

                    if ($response->successful()) {
                        $manager = new ImageManager();

                        $fileName = Str::random(40) . '.webp';

                        $dir = 'product/'. $product->id;

                        $file = $dir . '/' . $fileName;
        
                        $image = $manager->make($response->body())->encode('webp');
                        
                        Storage::put($file, $image);

                        app(ProductImageRepository::class)->create([
                            'path'       => $file,
                            'product_id' => $product->id,
                        ]);
                    } elseif($response->status() === 404) {
                        // Prepare data
                        $data = [
                            'url' => $image,
                        ];
                        
                        app(ResultHelper::class)->result($data, 'image_not_found.json');
                    }
                } catch (\Throwable $th) {
                    // Prepare data
                    $data = [
                        'url' => $image,
                    ];
                    
                    app(ResultHelper::class)->result($data, 'image_not_found.json');
                }
            }
        }
    }
}
