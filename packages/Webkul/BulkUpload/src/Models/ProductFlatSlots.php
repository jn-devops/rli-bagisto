<?php

namespace Webkul\BulkUpload\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\BulkUpload\Contracts\ProductFlatSlots as ProductFlatSlotsContract;

class ProductFlatSlots extends Model implements ProductFlatSlotsContract
{
    protected $table = "product_flat_slots";

    protected $guarded = [];
}
