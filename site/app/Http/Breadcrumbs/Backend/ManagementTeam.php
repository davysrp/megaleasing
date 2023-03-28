<?php

Breadcrumbs::register('admin.managementteams.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.managementteams.management'), route('admin.managementteams.index'));
});

Breadcrumbs::register('admin.managementteams.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.managementteams.index');
    $breadcrumbs->push(trans('menus.backend.managementteams.create'), route('admin.managementteams.create'));
});

Breadcrumbs::register('admin.managementteams.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.managementteams.index');
    $breadcrumbs->push(trans('menus.backend.managementteams.edit'), route('admin.managementteams.edit', $id));
});
