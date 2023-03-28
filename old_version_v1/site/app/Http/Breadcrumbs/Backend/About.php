<?php

Breadcrumbs::register('admin.abouts.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.abouts.management'), route('admin.abouts.index'));
});

Breadcrumbs::register('admin.abouts.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.abouts.index');
    $breadcrumbs->push(trans('menus.backend.abouts.create'), route('admin.abouts.create'));
});

Breadcrumbs::register('admin.abouts.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.abouts.index');
    $breadcrumbs->push(trans('menus.backend.abouts.edit'), route('admin.abouts.edit', $id));
});
