<?php

Breadcrumbs::register('admin.productphotos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.productphotos.management'), route('admin.productphotos.index'));
});

Breadcrumbs::register('admin.productphotos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.productphotos.index');
    $breadcrumbs->push(trans('menus.backend.productphotos.create'), route('admin.productphotos.create'));
});

Breadcrumbs::register('admin.productphotos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.productphotos.index');
    $breadcrumbs->push(trans('menus.backend.productphotos.edit'), route('admin.productphotos.edit', $id));
});
