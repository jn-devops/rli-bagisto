<?php

namespace Webkul\BulkUpload\Repositories;

use Illuminate\Support\Facades\DB;
use Webkul\Core\Eloquent\Repository;

class ProductPropertyFlatsRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\BulkUpload\Contracts\ProductPropertyFlats';
    }

    /**
     * find flats Numbers
     * 
     * @param $slots
     * 
     * @return mixed
     */
    public function getFlatNumbers($slots)
    {
        return DB::table('product_property_flats')
                ->join('product_properties', 'product_properties.id', 'product_property_flats.property_id')
                ->where('product_properties.image_url', $slots['image_url'])
                ->where('product_properties.product_id', $slots['product_id'])
                ->where('product_property_flats.slot_id', $slots['slot_id'])
                ->get();
    }
}
