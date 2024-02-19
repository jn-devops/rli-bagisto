<?php

use Illuminate\Support\Facades\Route;
use Webkul\Store\Http\Controllers\API\CoreController;
use Webkul\Store\Http\Controllers\API\CategoryController;
use Webkul\Store\Http\Controllers\API\ProductController;
use Webkul\Store\Http\Controllers\API\ReviewController;
use Webkul\Store\Http\Controllers\API\CompareController;
use Webkul\Store\Http\Controllers\API\CartController;
use Webkul\Store\Http\Controllers\API\OnepageController;
use Webkul\Store\Http\Controllers\API\AddressController;
use Webkul\Store\Http\Controllers\API\WishlistController;

Route::group(['middleware' => ['locale', 'theme', 'currency'], 'prefix' => 'api'], function () {
    Route::controller(CoreController::class)->prefix('core')->group(function () {
        Route::get('countries', 'getCountries')->name('store.api.core.countries');

        Route::get('states', 'getStates')->name('store.api.core.states');
    });

    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->name('store.api.categories.index');

        Route::get('tree', 'tree')->name('store.api.categories.tree');

        Route::get('attributes', 'getAttributes')->name('store.api.categories.attributes');

        Route::get('max-price/{id?}', 'getProductMaxPrice')->name('store.api.categories.max_price');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('store.api.products.index');

        Route::get('{id}/related', 'relatedProducts')->name('store.api.products.related.index');

        Route::get('{id}/up-sell', 'upSellProducts')->name('store.api.products.up-sell.index');
    });

    Route::controller(ReviewController::class)->prefix('product/{id}')->group(function () {
        Route::get('reviews', 'index')->name('store.api.products.reviews.index');

        Route::post('review', 'store')->name('store.api.products.reviews.store');
    });

    Route::controller(CompareController::class)->prefix('compare-items')->group(function () {
        Route::get('', 'index')->name('store.api.compare.index');

        Route::post('', 'store')->name('store.api.compare.store');

        Route::delete('', 'destroy')->name('store.api.compare.destroy');

        Route::delete('all', 'destroyAll')->name('store.api.compare.destroy_all');
    });

    Route::controller(CartController::class)->prefix('checkout/cart')->group(function () {
        Route::get('', 'index')->name('store.api.checkout.cart.index');

        Route::post('', 'store')->name('store.api.checkout.cart.store');

        Route::put('', 'update')->name('store.api.checkout.cart.update');

        Route::delete('', 'destroy')->name('store.api.checkout.cart.destroy');

        Route::delete('selected', 'destroySelected')->name('store.api.checkout.cart.destroy_selected');

        Route::post('move-to-wishlist', 'moveToWishlist')->name('store.api.checkout.cart.move_to_wishlist');

        Route::post('coupon', 'storeCoupon')->name('store.api.checkout.cart.coupon.apply');

        Route::delete('coupon', 'destroyCoupon')->name('store.api.checkout.cart.coupon.remove');
    });

    Route::controller(OnepageController::class)->prefix('checkout/onepage')->group(function () {
        Route::get('summary', 'summary')->name('store.checkout.onepage.summary');

        Route::post('addresses', 'storeAddress')->name('store.checkout.onepage.addresses.store');

        Route::post('shipping-methods', 'storeShippingMethod')->name('store.checkout.onepage.shipping_methods.store');

        Route::post('payment-methods', 'storePaymentMethod')->name('store.checkout.onepage.payment_methods.store');

        Route::post('orders', 'storeOrder')->name('store.checkout.onepage.orders.store');

        Route::post('check-minimum-order', 'checkMinimumOrder')->name('store.checkout.onepage.check_minimum_order');
    });

    Route::group(['middleware' => ['customer'], 'prefix' => 'customer'], function () {
        Route::controller(AddressController::class)->prefix('addresses')->group(function () {
            Route::get('', 'index')->name('api.store.customers.account.addresses.index');

            Route::post('', 'store')->name('api.store.customers.account.addresses.store');
        });

        Route::controller(WishlistController::class)->prefix('wishlist')->group(function () {
            Route::get('', 'index')->name('store.api.customers.account.wishlist.index');

            Route::post('', 'store')->name('store.api.customers.account.wishlist.store');

            Route::post('{id}/move-to-cart', 'moveToCart')->name('store.api.customers.account.wishlist.move_to_cart');

            Route::delete('all', 'destroyAll')->name('store.api.customers.account.wishlist.destroy_all');

            Route::delete('{id}', 'destroy')->name('store.api.customers.account.wishlist.destroy');
        });
    });
});
