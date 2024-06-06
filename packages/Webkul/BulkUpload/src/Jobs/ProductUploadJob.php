<?php

namespace Webkul\BulkUpload\Jobs;

use Illuminate\Support\Str;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Webkul\Admin\Exports\DataGridExport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Webkul\BulkUpload\Helpers\ResultHelper;
use Webkul\BulkUpload\Repositories\Products\SimpleProductRepository;

class ProductUploadJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param  array  $chunk
     */
    public function __construct(
        protected $dataFlowProfileRecord,
        protected $chunk,
        protected $countCSV,
    ) {
    }

    /**
     * Execute the job.
     *
     * Store the uploaded or error of product records
     */
    public function handle()
    {
        Log::info('Bulk Upload Product start');
        
        // flush session when the new CSV file executing
        $simpleProductRepository = app(SimpleProductRepository::class);

        $errorArray = [];
        $records = [];
        $uploadedProduct = [];
        $isError = false;
        $count = 0;
        
        foreach ($this->chunk as $data) {
            foreach ($data as $key => $arr) {
                $count++;

                $uploadedProduct = $simpleProductRepository->createProduct($this->dataFlowProfileRecord, $arr, $key);

                if (! empty($uploadedProduct)) {
                    $isError = true;

                    $errorArray['error'] = json_encode($uploadedProduct['error']);

                    $records[$key] = (object) array_merge($errorArray, $arr);
                    
                    /**
                     * Result Data Prepping
                     */
                    app(ResultHelper::class)->result($errorArray, 'bulk_upload_error.json');
                }
            }
        }

        // After Uploaded Product store success message in session
        if ($this->countCSV == $count) {
            session()->put('completionMessage', 'CSV Product Successfully Imported');
        }

        if ($isError) {
            Excel::store(new DataGridExport(collect($records)), 'error-csv-file/' . $this->dataFlowProfileRecord->profiler->id . '/' . Str::random(10) . '.csv');
        }

        Log::info('Bulk Upload Product end');
    }
}