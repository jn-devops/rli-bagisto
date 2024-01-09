<?php

namespace Webkul\BulkUpload\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\BulkUpload\Contracts\ProductPropertyFlats as ProductPropertyFlatsContract;

class ProductPropertyFlats extends Model implements ProductPropertyFlatsContract
{
    /**
     * The table associated with the model.
     */
    protected $table = "product_property_flats";

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
            'x_coordinate',
            'y_coordinate',
            'property_id',
            'slot_id',
            'flat_numbers',
    ];
}
