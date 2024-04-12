<?php

namespace Webkul\Enclaves\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Enclaves\Contracts\CustomerAttribute as CustomerAttributeContract;

class CustomerAttribute extends TranslatableModel implements CustomerAttributeContract
{
    use HasFactory;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = [];

    /**
     * Get the attribute that owns the attribute option.
     */
    public function options(): HasMany
    {
        return $this->hasMany(CustomerAttributeOptionProxy::modelClass());
    }
}
