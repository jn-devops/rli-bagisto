<?php

namespace Webkul\BulkUpload\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\BulkUpload\Models\BulkProductImporter::class,
        \Webkul\BulkUpload\Models\ImportProduct::class,
        \Webkul\BulkUpload\Models\ProductProperties::class,
        \Webkul\BulkUpload\Models\ProductPropertyFlats::class,
        \Webkul\BulkUpload\Models\EkycVerfication::class,
    ];
}
