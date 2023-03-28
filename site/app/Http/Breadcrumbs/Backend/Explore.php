<?php

Breadcrumbs::register('admin.explores.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.explores.management'), route('admin.explores.index'));
});

Breadcrumbs::register('admin.explores.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.explores.index');
    $breadcrumbs->push(trans('menus.backend.explores.create'), route('admin.explores.create'));
});

Breadcrumbs::register('admin.explores.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.explores.index');
    $breadcrumbs->push(trans('menus.backend.explores.edit'), route('admin.explores.edit', $id));
});
