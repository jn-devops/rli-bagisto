<?php

namespace Webkul\BulkUpload\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\BulkUpload\Contracts\EkycVerification as EkycVerificationContract;

class EkycVerification extends Model implements EkycVerificationContract
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'cart_id',
        'transaction_id',
        'sku',
        'status',
        'payload',
    ];
}
