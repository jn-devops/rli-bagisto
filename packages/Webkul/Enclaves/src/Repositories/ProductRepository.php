<?php

namespace Webkul\Enclaves\Repositories;

use Illuminate\Support\Facades\DB;
use Webkul\Product\Repositories\ProductRepository as BaseProductRepository;

class ProductRepository extends BaseProductRepository
{
    /**
     * Get all products.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAll(array $params = [])
    {
        if (core()->getConfigData('catalog.products.storefront.search_mode') == 'elastic') {
            return $this->searchFromElastic($params);
        }

        return $this->searchFromDatabase($params);
    }

    /**
     * Search product from database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function searchFromDatabase(array $params = [])
    {
        $params = array_merge([
            'status'               => 1,
            'visible_individually' => 1,
            'url_key'             => null,
        ], $params);

        if (! empty($params['query'])) {
            $params['name'] = $params['query'];
        }

        $query = $this->with([
            'attribute_family',
            'images',
            'videos',
            'attribute_values',
            'price_indices',
            'inventory_indices',
            'reviews',
        ])->scopeQuery(function ($query) use ($params) {
            $prefix = DB::getTablePrefix();

            $qb = $query->distinct()
                ->select('products.*')
                ->leftJoin('products as variants', DB::raw('COALESCE(' . $prefix . 'variants.parent_id, ' . $prefix . 'variants.id)'), '=', 'products.id')
                ->leftJoin('product_price_indices', function ($join) {
                    $customerGroup = $this->customerRepository->getCurrentGroup();

                    $join->on('products.id', '=', 'product_price_indices.product_id')
                        ->where('product_price_indices.customer_group_id', $customerGroup->id);
                });

            if (! empty($params['category_id'])) {
                $qb->leftJoin('product_categories', 'product_categories.product_id', '=', 'products.id')
                    ->whereIn('product_categories.category_id', explode(',', $params['category_id']));
            }

            if (! empty($params['type'])) {
                $qb->where('products.type', $params['type']);
            }

            /**
             * Filter query by price.
             */
            if (! empty($params['price'])) {
                $priceRange = explode(',', $params['price']);

                $qb->whereBetween('product_price_indices.min_price', [
                    core()->convertToBasePrice(current($priceRange)),
                    core()->convertToBasePrice(end($priceRange)),
                ]);
            }

            /**
             * Retrieve all the filterable attributes.
             */
            $filterableAttributes = $this->attributeRepository->getProductDefaultAttributes(array_keys($params));

            /**
             * Filter the required attributes.
             */
            $attributes = $filterableAttributes->whereIn('code', [
                'name',
                'status',
                'visible_individually',
                'url_key',
            ]);

            /**
             * Filter collection by required attributes.
             */
            foreach ($attributes as $attribute) {
                $alias = $attribute->code . '_product_attribute_values';

                $qb->leftJoin('product_attribute_values as ' . $alias, 'products.id', '=', $alias . '.product_id')
                    ->where($alias . '.attribute_id', $attribute->id);

                if ($attribute->code == 'name') {
                    $synonyms = $this->searchSynonymRepository->getSynonymsByQuery(urldecode($params['name']));

                    $qb->where(function ($subQuery) use ($alias, $synonyms) {
                        foreach ($synonyms as $synonym) {
                            $subQuery->orWhere($alias . '.text_value', 'like', '%' . $synonym . '%');
                        }
                    });
                } elseif ($attribute->code == 'url_key') {
                    if (empty($params['url_key'])) {
                        $qb->whereNotNull($alias . '.text_value');
                    } else {
                        $qb->where($alias . '.text_value', 'like', '%' . urldecode($params['url_key']) . '%');
                    }
                } else {
                    if (is_null($params[$attribute->code])) {
                        continue;
                    }

                    $qb->where($alias . '.' . $attribute->column_name, 1);
                }
            }

            /**
             * Filter the filterable attributes.
             */
            $attributes = $filterableAttributes->whereNotIn('code', [
                'price',
                'name',
                'status',
                'visible_individually',
                'url_key',
            ]);

            /**
             * Filter query by attributes using AND conditions
             */
            if ($attributes->isNotEmpty()) {
                foreach ($attributes as $attribute) {
                    if (isset($params[$attribute->code])) {
                        $values = explode(',', $params[$attribute->code]);

                        $alias = 'filter_' . $attribute->code;

                        $qb->leftJoin('product_attribute_values as ' . $alias, function ($join) use ($alias, $attribute) {
                            $join->on('products.id', '=', $alias . '.product_id')
                                ->where($alias . '.attribute_id', '=', $attribute->id);
                        });

                        if ($attribute->type == 'price') {
                            $qb->whereBetween($alias . '.' . $attribute->column_name, [
                                core()->convertToBasePrice(current($values)),
                                core()->convertToBasePrice(end($values)),
                            ]);
                        } else {
                            $qb->whereIn($alias . '.' . $attribute->column_name, $values);
                        }
                    }
                }
            }

            /**
             * Sort collection.
             */
            $sortOptions = $this->getSortOptions($params);

            if ($sortOptions['order'] != 'rand') {
                $attribute = $this->attributeRepository->findOneByField('code', $sortOptions['sort']);

                if ($attribute) {
                    if ($attribute->code === 'price') {
                        $qb->orderBy('product_price_indices.min_price', $sortOptions['order']);
                    } else {
                        $alias = 'sort_product_attribute_values';

                        $qb->leftJoin('product_attribute_values as ' . $alias, function ($join) use ($alias, $attribute) {
                            $join->on('products.id', '=', $alias . '.product_id')
                                ->where($alias . '.attribute_id', $attribute->id)
                                ->where($alias . '.channel', core()->getRequestedChannelCode())
                                ->where($alias . '.locale', core()->getRequestedLocaleCode());
                        })
                            ->orderBy($alias . '.' . $attribute->column_name, $sortOptions['order']);
                    }
                } else {
                    $qb->orderBy('products.created_at', $sortOptions['order']);
                }
            } else {
                return $qb->inRandomOrder();
            }

            return $qb->groupBy('products.id');
        });

        $limit = $this->getPerPageLimit($params);

        return $query->paginate($limit);
    }
}
