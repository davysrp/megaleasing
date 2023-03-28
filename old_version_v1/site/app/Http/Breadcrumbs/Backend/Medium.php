<?php

Breadcrumbs::register('admin.media.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.media.management'), route('admin.media.index'));
});

Breadcrumbs::register('admin.media.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.media.index');
    $breadcrumbs->push(trans('menus.backend.media.create'), route('admin.media.create'));
});

Breadcrumbs::register('admin.media.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.media.index');
    $breadcrumbs->push(trans('menus.backend.media.edit'), route('admin.media.edit', $id));
});
