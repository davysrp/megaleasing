<?php

Breadcrumbs::register('admin.photovideos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.photovideos.management'), route('admin.photovideos.index'));
});

Breadcrumbs::register('admin.photovideos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.photovideos.index');
    $breadcrumbs->push(trans('menus.backend.photovideos.create'), route('admin.photovideos.create'));
});

Breadcrumbs::register('admin.photovideos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.photovideos.index');
    $breadcrumbs->push(trans('menus.backend.photovideos.edit'), route('admin.photovideos.edit', $id));
});
