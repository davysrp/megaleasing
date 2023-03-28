<?php

Breadcrumbs::register('admin.ecommerces.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.ecommerces.management'), route('admin.ecommerces.index'));
});

Breadcrumbs::register('admin.ecommerces.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.ecommerces.index');
    $breadcrumbs->push(trans('menus.backend.ecommerces.create'), route('admin.ecommerces.create'));
});

Breadcrumbs::register('admin.ecommerces.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.ecommerces.index');
    $breadcrumbs->push(trans('menus.backend.ecommerces.edit'), route('admin.ecommerces.edit', $id));
});
