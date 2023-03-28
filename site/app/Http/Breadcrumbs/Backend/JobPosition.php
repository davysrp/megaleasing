<?php

Breadcrumbs::register('admin.jobpositions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.jobpositions.management'), route('admin.jobpositions.index'));
});

Breadcrumbs::register('admin.jobpositions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.jobpositions.index');
    $breadcrumbs->push(trans('menus.backend.jobpositions.create'), route('admin.jobpositions.create'));
});

Breadcrumbs::register('admin.jobpositions.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.jobpositions.index');
    $breadcrumbs->push(trans('menus.backend.jobpositions.edit'), route('admin.jobpositions.edit', $id));
});
