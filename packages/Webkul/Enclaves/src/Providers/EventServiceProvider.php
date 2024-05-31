<?php

namespace Webkul\Enclaves\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Webkul\Enclaves\Listeners\ThemeListener;
use Webkul\Enclaves\Helpers\Product\ProductImageUpdate;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'checkout.cart.collect.totals.after'  => [
            'Webkul\Enclaves\Listeners\Cart@afterCreate',
        ],
        'customer.registration.after' => [
            'Webkul\Enclaves\Listeners\Customer@afterCreate',
        ],
        'customer.update.after' => [
            'Webkul\Enclaves\Listeners\Customer@afterUpdate',
        ],
        'catalog.category.create.after' => [
            'Webkul\Enclaves\Listeners\Category@afterUpdate',
        ],
        'catalog.category.update.after' => [
            'Webkul\Enclaves\Listeners\Category@afterCreateOrUpdate',
        ],
        'catalog.category.create.after' => [
            'Webkul\Enclaves\Listeners\Category@afterCreateOrUpdate',
        ],
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('bagisto.admin.setting.theme.edit.form.images.before', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.components.image.index');
        });

        Event::listen('bagisto.admin.customers.create.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.customers.form.create.index');
        });

        Event::listen('bagisto.admin.customers.customers.view.edit.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.customers.form.edit.index');
        });

        Event::listen('bagisto.admin.catalog.categories.edit.card.accordion.filterable_attributes.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.catalog.categories.edit');
        });

        Event::listen('bagisto.admin.catalog.categories.create.card.accordion.filterable_attributes.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.catalog.categories.create');
        });

        Event::listen('bagisto.admin.catalog.product.edit.form.images.before', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.catalog.products.image.index');
        });

        Event::listen('bagisto.admin.catalog.categories.edit.card.description_images.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.catalog.categories.image.index');
        });

        Event::listen('bagisto.admin.settings.channels.edit.card.design.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.settings.channels.edit');
        });

        Event::listen('bagisto.admin.settings.channels.create.card.design.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::admin.settings.channels.create');
        });

        Event::listen('bagisto.shop.products.price.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::shop.products.prices.processing');
        });

        Event::listen('bagisto.shop.checkout.addresses.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('enclaves::shop.checkout.onepage.properties.index');
        });

        Event::listen('catalog.product.update.after', function ($product) {
            app(ProductImageUpdate::class)->insertImages($product);
        });

        Event::listen('core.channel.update.after', function ($theme) {
            app(ThemeListener::class)->afterUpdateOrCreate($theme);
        });

        Event::listen('core.channel.create.after', function ($theme) {
            app(ThemeListener::class)->afterUpdateOrCreate($theme);
        });
    }
}
