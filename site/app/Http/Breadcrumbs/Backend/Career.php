<?php

Breadcrumbs::register('admin.careers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.careers.management'), route('admin.careers.index'));
});

Breadcrumbs::register('admin.careers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.careers.index');
    $breadcrumbs->push(trans('menus.backend.careers.create'), route('admin.careers.create'));
});

Breadcrumbs::register('admin.careers.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.careers.index');
    $breadcrumbs->push(trans('menus.backend.careers.edit'), route('admin.careers.edit', $id));
});
