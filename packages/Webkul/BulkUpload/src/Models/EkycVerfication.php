<?php

namespace Webkul\BulkUpload\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\BulkUpload\Contracts\EkycVerfication as EkycVerficationContract;

class EkycVerfication extends Model implements EkycVerficationContract
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'cart_id',
        'sku',
        'status',
        'payload',
    ];
}
