<?php

namespace Webkul\BulkUpload\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Attribute\Models\AttributeFamilyProxy;
use Webkul\BulkUpload\Contracts\BulkProductImporter as BulkProductImporterContract;

class BulkProductImporter extends Model implements BulkProductImporterContract
{
    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = [];

    /**
     * Get the product attribute family that owns the product.
     */
    public function attribute_family(): BelongsTo
    {
        return $this->belongsTo(AttributeFamilyProxy::modelClass());
    }

    /**
     * Get the product files.
     */
    public function import_product(): HasMany
    {
        return $this->hasMany(ImportProductProxy::modelClass());
    }
}
