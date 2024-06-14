<?php

namespace Webkul\Enclaves\Http\Controllers\Admin\Product;

use Illuminate\Http\JsonResponse;
use Webkul\Enclaves\Http\Controllers\Controller;
use Webkul\Enclaves\Repositories\ProductConditionRepository;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected ProductConditionRepository $productConditionRepository) 
    {
    }

    /**
     * Store product conditions.
     *
     * @param int
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $data = request()->all();

        $this->validate(request(), [
            'heading'      => 'string|required',
            'description'  => 'string|required',
            'product_id'   => 'required',
        ]);

        $this->productConditionRepository->create($data);

        $productConditions =  $this->productConditionRepository
            ->findWhere(['product_id' => $data['product_id']]);

        return new JsonResponse([
            'conditions' => $productConditions,
        ]);
    }

    /**
     * Delete product conditions.
     *
     * @param int
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $productConditions = $this->productConditionRepository->findOneWhere(['id' => $id]);

        if ($productConditions) {
            $this->productConditionRepository->delete($id);
        }

        $productConditions = $this->productConditionRepository
            ->findWhere(['product_id' => $productConditions->product_id]);

        return new JsonResponse([
            'conditions' => $productConditions,
        ]);
    }
}