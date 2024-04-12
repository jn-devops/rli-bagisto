<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(trans('blog::app.shop.blog.title'), route('shop.article.index'));

    $trail->push(trans('blog::app.shop.blog.news_and_updates'), route('shop.article.index'));

    $trail->push(trans('blog::app.shop.blog.details_page'), route('shop.article.index'));
});

// Home > blogs
Breadcrumbs::for('blogs', function (BreadcrumbTrail $trail) {
    $trail->parent('home');

    $trail->push(trans('blog::app.shop.blog.news_and_updates'), route('shop.article.index'));
});