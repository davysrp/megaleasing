<?php

Breadcrumbs::register('admin.newslists.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.newslists.management'), route('admin.newslists.index'));
});

Breadcrumbs::register('admin.newslists.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.newslists.index');
    $breadcrumbs->push(trans('menus.backend.newslists.create'), route('admin.newslists.create'));
});

Breadcrumbs::register('admin.newslists.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.newslists.index');
    $breadcrumbs->push(trans('menus.backend.newslists.edit'), route('admin.newslists.edit', $id));
});
