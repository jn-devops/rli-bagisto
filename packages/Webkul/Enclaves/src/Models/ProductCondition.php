<?php

namespace Webkul\Enclaves\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Product\Models\ProductProxy;
use Webkul\Enclaves\Contracts\ProductCondition as ProductConditionContract;

class ProductCondition extends Model implements ProductConditionContract
{
    protected $fillable = [
        'heading',
        'description',
        'product_id',
    ];

    /**
     * Get the product.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductProxy::modelClass());
    }
}
