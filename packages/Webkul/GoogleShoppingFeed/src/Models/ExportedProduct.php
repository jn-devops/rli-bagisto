<?php

namespace Webkul\GoogleShoppingFeed\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\GoogleShoppingFeed\Contracts\ExportedProduct as ExportedProductContract;

class ExportedProduct extends Model implements ExportedProductContract
{
    /**
     * Guarded.
     *
     * @var array
     */
    protected $guarded = ['id'];
}