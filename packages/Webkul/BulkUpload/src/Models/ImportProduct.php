<?php

namespace Webkul\BulkUpload\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\BulkUpload\Contracts\ImportProduct as ImportProductContract;

class ImportProduct extends Model implements ImportProductContract
{
    /**
     * The attributes that aren't mass assignable.
     */
    protected $table = "import_products";

    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = [];

    /**
     * Get the profiler files.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profiler()
    {
        return $this->belongsTo(BulkProductImporter::class, 'bulk_product_importer_id', 'id');
    }
}
