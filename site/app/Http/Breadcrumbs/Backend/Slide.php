<?php

Breadcrumbs::register('admin.slides.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.slides.management'), route('admin.slides.index'));
});

Breadcrumbs::register('admin.slides.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.slides.index');
    $breadcrumbs->push(trans('menus.backend.slides.create'), route('admin.slides.create'));
});

Breadcrumbs::register('admin.slides.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.slides.index');
    $breadcrumbs->push(trans('menus.backend.slides.edit'), route('admin.slides.edit', $id));
});
