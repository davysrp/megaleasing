<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('navs.backend.dashboard'), route('admin.dashboard'));
});

require __DIR__.'/Search.php';
require __DIR__.'/Access/User.php';
require __DIR__.'/Access/Role.php';
require __DIR__.'/Access/Permission.php';
require __DIR__.'/Page.php';
require __DIR__.'/Setting.php';
require __DIR__.'/Blog_Category.php';
require __DIR__.'/Blog_Tag.php';
require __DIR__.'/Blog_Management.php';
require __DIR__.'/Faqs.php';
require __DIR__.'/Menu.php';
require __DIR__.'/LogViewer.php';

require __DIR__.'/Project.php';
require __DIR__.'/Client.php';
require __DIR__.'/Service.php';
require __DIR__.'/Medium.php';
require __DIR__.'/Career.php';
require __DIR__.'/Slide.php';
require __DIR__.'/News.php';
require __DIR__.'/PageMenu.php';
require __DIR__.'/AboutU.php';
require __DIR__.'/Location.php';
require __DIR__.'/About.php';
require __DIR__.'/Customer.php';
require __DIR__.'/ECommerce.php';
require __DIR__.'/Product.php';
require __DIR__.'/Branch.php';
require __DIR__.'/Promotion.php';
require __DIR__.'/Report.php';
require __DIR__.'/PhotoVideo.php';
require __DIR__.'/JobPosition.php';
require __DIR__.'/Job.php';
require __DIR__.'/Province.php';
require __DIR__.'/Explore.php';
require __DIR__.'/Subscriber.php';
require __DIR__.'/PhoductPhoto.php';
require __DIR__.'/ProductPhoto.php';
require __DIR__.'/NewsList.php';
require __DIR__.'/BoardDirector.php';
require __DIR__.'/ManagementTeam.php';