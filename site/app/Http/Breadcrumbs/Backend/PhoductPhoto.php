<?php

Breadcrumbs::register('admin.phoductphotos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.phoductphotos.management'), route('admin.phoductphotos.index'));
});

Breadcrumbs::register('admin.phoductphotos.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.phoductphotos.index');
    $breadcrumbs->push(trans('menus.backend.phoductphotos.create'), route('admin.phoductphotos.create'));
});

Breadcrumbs::register('admin.phoductphotos.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.phoductphotos.index');
    $breadcrumbs->push(trans('menus.backend.phoductphotos.edit'), route('admin.phoductphotos.edit', $id));
});
