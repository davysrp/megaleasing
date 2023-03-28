<?php

Breadcrumbs::register('admin.pagemenus.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.pagemenus.management'), route('admin.pagemenus.index'));
});

Breadcrumbs::register('admin.pagemenus.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.pagemenus.index');
    $breadcrumbs->push(trans('menus.backend.pagemenus.create'), route('admin.pagemenus.create'));
});

Breadcrumbs::register('admin.pagemenus.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.pagemenus.index');
    $breadcrumbs->push(trans('menus.backend.pagemenus.edit'), route('admin.pagemenus.edit', $id));
});
