<?php

namespace Webkul\BulkUpload\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\BulkUpload\Contracts\ProductProperties as ProductPropertiesContract;

class ProductProperties extends Model implements ProductPropertiesContract
{
    /**
     * The table associated with the model.
     */
    protected $table = "product_properties";

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['product_id', 'image_url'];

    /**
     * Get the property flats.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function slots(): HasMany
    {
        return $this->hasMany(ProductPropertyFlats::class, 'property_id');
    }

    /**
     * Get the property flats.
     *
     * @return \Illuminate\Database\Eloquent\Relations\haHasOnesOne
     */
    public function slot(): HasOne
    {
        if(request('slot_id')) {
            return $this->hasOne(ProductPropertyFlats::class, 'property_id')->where('slot_id', str_replace('resizable_', '', request('slot_id')));
        }

        return $this->hasOne(ProductPropertyFlats::class, 'property_id');
    }
}
