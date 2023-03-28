<?php

Breadcrumbs::register('admin.aboutus.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.aboutus.management'), route('admin.aboutus.index'));
});

Breadcrumbs::register('admin.aboutus.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.aboutus.index');
    $breadcrumbs->push(trans('menus.backend.aboutus.create'), route('admin.aboutus.create'));
});

Breadcrumbs::register('admin.aboutus.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.aboutus.index');
    $breadcrumbs->push(trans('menus.backend.aboutus.edit'), route('admin.aboutus.edit', $id));
});
