<?php

Breadcrumbs::register('admin.provinces.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.provinces.management'), route('admin.provinces.index'));
});

Breadcrumbs::register('admin.provinces.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.provinces.index');
    $breadcrumbs->push(trans('menus.backend.provinces.create'), route('admin.provinces.create'));
});

Breadcrumbs::register('admin.provinces.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.provinces.index');
    $breadcrumbs->push(trans('menus.backend.provinces.edit'), route('admin.provinces.edit', $id));
});
