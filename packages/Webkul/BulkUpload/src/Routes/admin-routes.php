<?php

use Illuminate\Support\Facades\Route;
use Webkul\BulkUpload\Http\Controllers\Admin\BulkProductImporterController;
use Webkul\BulkUpload\Http\Controllers\Admin\UploadFileController;

Route::middleware(['web', 'admin', 'bulkUpload'])
    ->prefix(config('app.admin_url'))
    ->group(function () {

        Route::prefix('bulk-upload')->group(function () {
            Route::prefix('bulk-product-importer')->group(function () {
                // Index
                Route::get('/', [BulkProductImporterController::class, 'index'])
                    ->name('admin.bulk-upload.bulk-product-importer.index');

                // Store
                Route::post('/add-profile', [BulkProductImporterController::class, 'store'])
                    ->name('admin.bulk-upload.bulk-product-importer.add');

                // Edit
                Route::get('/edit/{id}', [BulkProductImporterController::class, 'edit'])
                    ->name('admin.bulk-upload.bulk-product-importer.edit');

                Route::put('/update', [BulkProductImporterController::class, 'update'])
                    ->name('admin.bulk-upload.bulk-product-importer.update');

                // Destroy
                Route::post('/delete/{id}', [BulkProductImporterController::class, 'destroy'])
                    ->name('admin.bulk-upload.bulk-product-importer.delete');

                // Mass Destroy
                Route::post('/mass-destroy', [BulkProductImporterController::class, 'massDestroy'])
                    ->name('admin.bulk-upload.bulk-product-importer.massDelete');

                // Get Attribute Family by Importer ID
                Route::post('/get-attribute', [BulkProductImporterController::class, 'getAttributeFamilyByImporterId'])
                    ->name('admin.bulk-upload.bulk-product-importer.get-attribute-family');
            });

            Route::prefix('upload-file')->group(function () {
                // Route to display the index page for uploading files
                Route::get('/', [UploadFileController::class, 'index'])
                    ->name('admin.bulk-upload.upload-file.index');

                // Route to handle downloading sample files
                Route::post('/download-sample-file', [UploadFileController::class, 'downloadSampleFile'])
                    ->name('admin.bulk-upload.upload-file.download-sample-files');

                // Route to fetch bulk product importer profiles
                Route::get('/get-profiles', [UploadFileController::class, 'getBulkProductImporter'])
                    ->name('admin.bulk-upload.upload-file.get-all-profile');

                // Route to import products from uploaded files
                Route::post('/import-products-file', [UploadFileController::class, 'storeProductsFile'])
                    ->name('admin.bulk-upload.upload-file.import-products-file');
            });

            Route::prefix('import-product-file')->group(function () {
                // Get attribute family when uploading bulk-product
                Route::get('/', [UploadFileController::class, 'getFamilyAttributesToUploadFile'])
                    ->name('admin.bulk-upload.import-file.run-profile.index');

                // Get product importer records while product is uploading
                Route::get('/get-importer', [UploadFileController::class, 'getProductImporter'])
                    ->name('admin.bulk-upload.upload-file.get-importer');

                // Delete importer file while uploading bulk-product
                Route::post('/delete-file', [UploadFileController::class, 'deleteProductFile'])
                    ->name('admin.bulk-upload.upload-file.delete');

                // Read csv file and execute the uploading product
                Route::post('/read-csv', [UploadFileController::class, 'readCSVData'])
                    ->name('admin.bulk-upload.upload-file.run-profile.read-csv');

                // get error after product uploading
                Route::get('/download-csv', [UploadFileController::class, 'downloadCsv'])
                    ->name('admin.bulk-upload.upload-file.run-profile.download-csv');

                // Delete the csv error file
                Route::post('/delete-csv', [UploadFileController::class, 'deleteCSV'])
                    ->name('admin.bulk-upload.upload-file.run-profile.delete-csv-file');

                // Get uploaded and not uploaded product records
                Route::post('/get-uploaded-product', [UploadFileController::class, 'getUploadedProductOrNotUploadedProduct'])
                    ->name('admin.bulk-upload.upload-file.get-uploaded-and-not-uploaded-product');
            });
        });
    });
