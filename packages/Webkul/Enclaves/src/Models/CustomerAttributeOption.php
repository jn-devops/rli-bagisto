<?php

namespace Webkul\Enclaves\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Enclaves\Contracts\CustomerAttributeOption as CustomerAttributeOptionContract;

class CustomerAttributeOption extends TranslatableModel implements CustomerAttributeOptionContract
{
    use HasFactory;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = [];
}