<?php

Breadcrumbs::register('admin.subscribers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.subscribers.management'), route('admin.subscribers.index'));
});

Breadcrumbs::register('admin.subscribers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.subscribers.index');
    $breadcrumbs->push(trans('menus.backend.subscribers.create'), route('admin.subscribers.create'));
});

Breadcrumbs::register('admin.subscribers.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.subscribers.index');
    $breadcrumbs->push(trans('menus.backend.subscribers.edit'), route('admin.subscribers.edit', $id));
});
