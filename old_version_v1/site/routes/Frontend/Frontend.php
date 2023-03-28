<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('page/{slug}', 'FrontendController@getPage')->name('homepage');
Route::get('page/{id}/{parent}/{slug}', 'FrontendController@getSubPage')->name('pagemenu2');
Route::get('page/{id}/{slug}', 'FrontendController@getPage')->name('pagemenu1');
Route::get('promotion/{id}/{slug?}', 'FrontendController@promotion')->name('promotion');
Route::get('report/{id}/{slug?}', 'FrontendController@report')->name('report');
Route::get('news-events/{id}/{slug?}', 'FrontendController@news')->name('news');
Route::get('product-detail/{id}/{slug?}', 'FrontendController@productDetail')->name('productDetail');
Route::get('job-detail/{id}/{slug?}', 'FrontendController@jobdetail')->name('jobdetail');
Route::get('online-application/', 'FrontendController@onlineapplication')->name('onlineapplication');
Route::get('search-product/', 'FrontendController@searchproduct')->name('searchproduct');
Route::get('subscribe/', 'FrontendController@subscribe')->name('subscribe');
Route::get('search-job/', 'FrontendController@searchjob')->name('searchjob');
Route::get('search-job-keyword/', 'FrontendController@search_product_by_key')->name('search_product_by_key');
Route::post('job-application/', 'FrontendController@jobapplication')->name('jobapplication');
Route::post('contact-us/', 'FrontendController@jobapplication')->name('jobapplication');
Route::get('explore/{id}/{slug}', 'FrontendController@explore')->name('explore');
Route::get('calculate-interest/', 'FrontendController@calculate_interest')->name('calculate-interest');
Route::post('send-contact/', 'FrontendController@contactSendMail')->name('contactSend');
Route::post('send-feedback/', 'FrontendController@customerFeedBack')->name('customerFeedBack');
Route::post('send-application/', 'FrontendController@onlineapplicationsubmit')->name('onlineapplicationsubmit');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');
