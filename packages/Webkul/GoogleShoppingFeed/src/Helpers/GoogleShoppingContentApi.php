<?php

namespace Webkul\GoogleShoppingFeed\Helpers;

use Exception;
use Carbon\Carbon;
use Google\Client as GoogleClient;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Google\Service\ShoppingContent as GoogleServiceShoppingContent;
use Google\Service\ShoppingContent\Product as GoogleServiceShoppingContentProduct;
use Google\Service\ShoppingContent\Price as GoogleServiceShoppingContentPrice;
use Google\Service\ShoppingContent\ProductShippingWeight as GoogleServiceShoppingContentProductShippingWeight;
use Webkul\GoogleShoppingFeed\Repositories\OAuthAccessTokenRepository;
use Webkul\GoogleShoppingFeed\Repositories\MapGoogleCategoryRepository;
use Webkul\GoogleShoppingFeed\Repositories\MapGoogleProductAttributeRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\GoogleShoppingFeed\Repositories\ExportedProductRepository;

class GoogleShoppingContentApi
{
    /**
     * Create the new Helper instance.
     * 
     * @return void 
     */
    public function __construct(
        protected OAuthAccessTokenRepository $oAuthAccessTokenRepository,
        protected MapGoogleCategoryRepository $mapGoogleCategoryRepository,
        protected MapGoogleProductAttributeRepository $mapGoogleProductAttributeRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected AttributeOptionRepository $attributeOptionRepository,
        protected ProductRepository $productRepository,
        protected ExportedProductRepository $exportedProductRepository
    ) {
    }

    /**
     * Fetch google shopping product list.
     *
     * @return \Google\Service\ShoppingContent\ProductsListResponse
     */
    public function getProducts()
    {
        $merchantId = core()->getConfigData('google_feed.settings.general.google_merchant_id');

        try {
            $client = new GoogleClient();

            $client->setAccessToken($this->getAccessToken());

            $serviceShoppingContent =  new GoogleServiceShoppingContent($client);
            
            $products = $serviceShoppingContent->products->listProducts($merchantId);

            return $products;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Exports all products to google shop.
     * 
     * @return void
     */
    public function exportProduct($storeProduct)
    {
        if ($storeProduct->type != 'configurable') {
            $this->uploadProduct($storeProduct, $storeProduct->type);
        }

        foreach ($storeProduct->variants as $variant) {
            $this->uploadProduct($variant, $storeProduct->type);
        }
    }

    /**
     * Upload product to google map.
     *
     * @param  object  $storeProduct
     * @param  string  $type
     * @return \Google\Service\ShoppingContent\Resource\Products|mixed
     */
    public function uploadProduct($storeProduct, $type = null)
    {
        $feedData = $this->getProductFeed($storeProduct, $type);

        $merchantId = core()->getConfigData('google_feed.settings.general.google_merchant_id');

        $accessToken = $this->getAccessToken();
        
        $client = new GoogleClient();

        $client->getCache()->clear();

        $client->setAccessToken($accessToken);

        $service = new GoogleServiceShoppingContent($client);

        $product = new GoogleServiceShoppingContentProduct();

        $product->setOfferId($feedData['offer_id']);

        $product->setTitle($feedData['title']);

        $product->setDescription($feedData['description']);

        $product->setLink($feedData['product_link']);

        $product->setImageLink($feedData['image']);

        $product->setAdditionalImageLinks($feedData['additional_images']);

        $product->setContentLanguage($feedData['lang']);

        $product->setTargetCountry(core()->getConfigData('google_feed.settings.default_configuration.target_country'));

        $product->setChannel('online');

        $product->setAvailability($feedData['availability']);

        $product->setCondition($feedData['condition']);

        $product->setGoogleProductCategory($feedData['category']);

        if ($type = 'configurable') {
            $product->setItemGroupId($storeProduct->product_id);
        }

        if ($type = 'bundle') {
            $product->setIsBundle(true);
        }

        $price = new GoogleServiceShoppingContentPrice();

        $price->setValue($feedData['price']);

        $price->setCurrency($feedData['currency']);

        if ($feedData['brand']) {
            $product->setBrand($feedData['brand']);
        }

        if ($feedData['color']) {
            $product->setColor($feedData['color']);
        }

        $product->setGender($feedData['gender']);

        if ($feedData['gtin']) {
            $product->setGtin($feedData['gtin']);
        } else {
            $product->setIdentifierExists(false);
        }

        $product->setAgeGroup($feedData['ageGroup']);

        if ($feedData['size']) {
            $product->setSizes($feedData['size']);
        }

        $shippingWeight = new GoogleServiceShoppingContentProductShippingWeight();

        $shippingWeight->setValue($feedData['weight']);

        $shippingWeight->setUnit(core()->getConfigData('google_feed.settings.default_configuration.weight_unit'));
        
        $product->setShippingWeight($shippingWeight);

        $product->setPrice($price);

        $result = $service->products->insert($merchantId, $product);

        return $result;
    }

    /**
     * Get access token.
     *
     * @return void
     */
    public function getAccessToken()
    {
        $tokenDetails = $this->oAuthAccessTokenRepository->first();
        
        $current = Carbon::now();

        if ($tokenDetails
            && $current->lessThan($tokenDetails->expire_at)
        ) {
            return $tokenDetails->access_token;
        } 

        return null;
    }

    /**
     * Get feed category.
     *
     * @param  object $product
     * @return mixed
     */
    public function getProductCategoryFeed($product)
    {
        $lastProductCategory = $product->categories->last();

        if (
            ! $lastProductCategory
            && $product->parent_id
        ) {
            $lastProductCategory = $product->parent->categories->last();
        }

        $googleCategory = null;

        if ($lastProductCategory) {
            $googleCategory = $this->mapGoogleCategoryRepository->findOneWhere([
                'category_id' => $lastProductCategory->id,
            ]);
        }

        return $googleCategory;
    }

    /**
     * Get feed category.
     * 
     * @param  object $product
     * @return mixed
     */
    public function getProductPriceFeed($product)
    {
        try {
            $price = $product->getTypeInstance()->getMinimalPrice();

            return $price;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Get feed product image.
     * 
     * @param  object  $product
     * @param  string  $type
     * @return string
     */
    public function getProductImageFeed($product)
    {
        $images = $this->getGalleryImages($product);

        return $images[0]['medium_image_url'];
    }

    /** 
     * Get Additional product images.
     * 
     * @param  object  $product
     * @param  string  $type
     * @return string
     */
    public function getProductAdditionalImages($product)
    {
        $additionalImages = [];

        $images = $this->getGalleryImages($product);

        foreach ($images as $key => $image) {
            if ($key == 0) {
                continue;
            }

            $additionalImages[] = $image['medium_image_url'];
        }

        return $additionalImages;
    }


    /**
     * Get Grouped and bundle product weight.
     * 
     * @param object $product
     * @param string $type
     * @return int|float
     */
    public function getGroupOrBundleWeight($product, $type)
    {
        $productIds = $product->grouped_products->pluck('associated_product_id')->toArray();

        $weights =  $this->productRepository->findWhereIn('id', $productIds )->pluck('weight')->toArray();

        if ($type == 'bundle') {
            $productIds = $product->product->bundle_options[0]->bundle_option_products->pluck('product_id')->toArray();

            $weights =  $this->productRepository->findWhereIn('id', $productIds )->pluck('weight')->toArray();
        }

        return array_sum($weights);
    }

    /**
     * Get product feed data.
     * 
     * @param  object  $product
     * @param  string  $type
     * @return array
     */
    public function getProductFeed($product, $type)
    {
        $attributes = $this->mapGoogleProductAttributeRepository->first();

        $googleCategory = $this->getProductCategoryFeed($product);

        $productWeight = null;

        if (
            $type == 'bundle' 
            || $type == 'grouped'
        ) {
            $productWeight = $this->getGroupOrBundleWeight($product, $type);
        } elseif ($type == 'configurable') {
            $weight = 0;

            foreach ($product->variants as $variant) {
                $weight += $variant[$attributes->weight_id];
            }

            $productWeight = $weight;
        } else {
            $productWeight = $product[$attributes->weight_id];
        }

        $feedData = [
            "offer_id"          => $product[$attributes->product_id],
            "title"             => $product[$attributes->title_id],
            "gtin"              => $product[$attributes->gtin_id],
            "description"       => $product[$attributes->description_id],
            "brand"             => $this->getSelectMultiSelectAttributeValues($product[$attributes->brand_id]),
            "color"             => $this->getSelectMultiSelectAttributeValues($product[$attributes->color_id]),
            "weight"            => $productWeight,
            "image"             => $this->getProductImageFeed($product),
            "size"              => $this->getSelectMultiSelectAttributeValues($product->size),
            "size_system"       => $attributes->size_system_id ? $product[$attributes->size_system_id]: null,
            "size_type"         => $attributes->size_type_id ? $product[$attributes->size_type_id] : null,
            "mpn"               => $product[$attributes->mpn_id],
            'product_link'      => $type == 'configurable'? url('/').'/'.$product->parent->url_key : url('/').'/'.$product->url_key,
            'lang'              => core()->getCurrentLocale()->code,
            'availability'      => $product->totalQuantity() ? 'in stock' : 'out of stock',
            'category'          => is_null($googleCategory) ? core()->getConfigData('google_feed.settings.default_configuration.category') : $googleCategory->google_category_path,
            'price'             => $this->getProductPriceFeed($product),
            'currency'          => core()->getBaseCurrency()->code,
            'custom_product'    => isset($product->custom_product) ? $product->custom_product : 0,
            'additional_images' => $this->getProductAdditionalImages($product),
        ];

        $feedData['ageGroup'] = $this->getSelectMultiSelectAttributeValues($product->age_group) ?? core()->getConfigData('google_feed.settings.defaultConfiguration.age_group');

        $feedData['gender'] = $this->getSelectMultiSelectAttributeValues($product->available_for) ?? core()->getConfigData('google_feed.settings.defaultConfiguration.available_for');

        $feedData['condition'] = $this->getSelectMultiSelectAttributeValues($product->condition) ?? core()->getConfigData('google_feed.settings.defaultConfiguration.condition');

        return $feedData;
    }

    /**
     * Get product attribute option values.
     * 
     * @param int $id
     * @return string
     */
    public function getSelectMultiSelectAttributeValues($id)
    {
        $optionValue  = $this->attributeOptionRepository->find($id);

        if ($optionValue) {
            return $optionValue->admin_name;
        } 
        
        return null;
    }

    /**
     * Retrieve collection of gallery images.
     *
     * @param  \Webkul\Product\Contracts\Product  $product
     * @return array
     */
    public function getGalleryImages($product)
    {
        if (! $product) {
            return [];
        }

        $images = [];

        foreach ($product->images as $image) {
            if (! Storage::has($image->path)) {
                continue;
            }

            $images[] = $this->getCachedImageUrls($image->path);
        }

        if (
            ! $product->parent_id
            && ! count($images)
            && ! count($product->videos ?? [])
        ) {
            $images[] = $this->getFallbackImageUrls();
        }

        /*
         * Product parent checked already above. If the case reached here that means the
         * parent is available. So recursing the method for getting the parent image if
         * images of the child are not found.
         */
        if (empty($images)) {
            $images = $this->getGalleryImages($product->parent);
        }

        return $images;
    }

     /**
     * Get cached urls configured for intervention package.
     *
     * @param  string  $path
     */
    private function getCachedImageUrls($path): array
    {
        if (! $this->isDriverLocal()) {
            return [
                'small_image_url'    => Storage::url($path),
                'medium_image_url'   => Storage::url($path),
                'large_image_url'    => Storage::url($path),
                'original_image_url' => Storage::url($path),
            ];
        }

        return [
            'small_image_url'    => url('cache/small/' . $path),
            'medium_image_url'   => url('cache/medium/' . $path),
            'large_image_url'    => url('cache/large/' . $path),
            'original_image_url' => url('cache/original/' . $path),
        ];
    }

    /**
     * Get fallback urls.
     */
    private function getFallbackImageUrls(): array
    {
        return [
            'small_image_url'    => bagisto_asset('images/small-product-placeholder.webp', 'shop'),
            'medium_image_url'   => bagisto_asset('images/medium-product-placeholder.webp', 'shop'),
            'large_image_url'    => bagisto_asset('images/large-product-placeholder.webp', 'shop'),
            'original_image_url' => bagisto_asset('images/large-product-placeholder.webp', 'shop'),
        ];
    }

    /**
     * Is driver local.
     */
    private function isDriverLocal(): bool
    {
        return Storage::getAdapter() instanceof LocalFilesystemAdapter;
    }
}