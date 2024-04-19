<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// Home > My Account > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('account');
    $trail->push(trans('enclaves::app.shop.layouts.dashboard'), route('enclaves.customers.account.dashboard.index'));
});

// Home > My Account > documents
Breadcrumbs::for('documents', function (BreadcrumbTrail $trail) {
    $trail->parent('account');
    $trail->push(trans('enclaves::app.shop.layouts.documents'), route('shop.customers.account.profile.index'));
});

//Home > My Account >> inquiries
Breadcrumbs::for('inquiries', function (BreadcrumbTrail $trail) {
    $trail->parent('account');
    $trail->push(trans('enclaves::app.shop.layouts.inquiries'), route('enclaves.customers.account.inquiries.index'));
});

// Home > My Account > transactions
Breadcrumbs::for('transactions', function (BreadcrumbTrail $trail) {
    $trail->parent('account');
    $trail->push(trans('enclaves::app.shop.customers.account.transactions.index.title'), route('shop.customers.account.transactions.index'));
});

Breadcrumbs::for('transactions.view', function (BreadcrumbTrail $trail, $entity) {
    $trail->parent('transactions');
    $trail->push(trans('enclaves::app.shop.customers.account.transactions.index.title'), route('shop.customers.account.transactions.view', $entity->id));
});

