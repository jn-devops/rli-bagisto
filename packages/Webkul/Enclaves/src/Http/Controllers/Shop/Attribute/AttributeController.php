<?php

namespace Webkul\Enclaves\Http\Controllers\Shop\Attribute;

use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Attribute\Repositories\AttributeRepository;

class AttributeController extends Controller
{
    /**
     * Using const variable for status
     *
     * @var int Status
     */
    protected const STATUS = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeRepository $attributeRepository,

    ) {}

    public function getAttributes($code = null)
    {
        if ($code) {
            $data = $this->attributeRepository->where('code', $code)->first();
            $data->options;

            return response()->json([
                'data' => $data,
            ]);
        }
    }
}
