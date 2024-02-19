<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/**
 * Profile routes.
 */
Breadcrumbs::for('store.customer.profile.index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('store::app.customer.account.profile.index.title'), route('shop.customer.profile.index'));
});

Breadcrumbs::for('store.customer.profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('store.customer.profile.index');
});

/**
 * Order routes.
 */
Breadcrumbs::for('store.customer.orders.index', function (BreadcrumbTrail $trail) {
    $trail->parent('store.customer.profile.index');

    $trail->push(trans('store::app.customer.account.order.index.page-title'), route('shop.customer.orders.index'));
});

Breadcrumbs::for('store.customer.orders.view', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('store.customer.orders.index');
});

/**
 * Downloadable products.
 */
Breadcrumbs::for('store.customer.downloadable_products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('store.customer.profile.index');

    $trail->push(trans('store::app.customer.account.downloadable_products.title'), route('shop.customer.downloadable_products.index'));
});

/**
 * Wishlists.
 */
Breadcrumbs::for('store.customer.wishlist.index', function (BreadcrumbTrail $trail) {
    $trail->parent('store.customer.profile.index');

    $trail->push(trans('store::app.customer.account.wishlist.page-title'), route('shop.customer.wishlist.index'));
});

/**
 * Reviews.
 */
Breadcrumbs::for('store.customer.reviews.index', function (BreadcrumbTrail $trail) {
    $trail->parent('store.customer.profile.index');

    $trail->push(trans('store::app.customer.account.review.index.page-title'), route('shop.customer.reviews.index'));
});

/**
 * Addresses.
 */
Breadcrumbs::for('store.customer.addresses.index', function (BreadcrumbTrail $trail) {
    $trail->parent('store.customer.profile.index');

    $trail->push(trans('store::app.customer.account.address.index.page-title'), route('shop.customer.addresses.index'));
});

Breadcrumbs::for('store.customer.addresses.create', function (BreadcrumbTrail $trail) {
    $trail->parent('store.customer.addresses.index');

    $trail->push(trans('store::app.customer.account.address.create.page-title'), route('shop.customer.addresses.create'));
});

Breadcrumbs::for('store.customer.addresses.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('store.customer.addresses.index');

    $trail->push(trans('store::app.customer.account.address.edit.page-title'), route('shop.customer.addresses.edit', $id));
});
