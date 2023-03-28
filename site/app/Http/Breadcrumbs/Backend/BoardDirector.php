<?php

Breadcrumbs::register('admin.boarddirectors.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.boarddirectors.management'), route('admin.boarddirectors.index'));
});

Breadcrumbs::register('admin.boarddirectors.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.boarddirectors.index');
    $breadcrumbs->push(trans('menus.backend.boarddirectors.create'), route('admin.boarddirectors.create'));
});

Breadcrumbs::register('admin.boarddirectors.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.boarddirectors.index');
    $breadcrumbs->push(trans('menus.backend.boarddirectors.edit'), route('admin.boarddirectors.edit', $id));
});
