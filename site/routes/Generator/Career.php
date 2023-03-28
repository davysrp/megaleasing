<?php
/**
 * Career
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Career'], function () {
        Route::resource('careers', 'CareersController');
        //For Datatable
        Route::post('careers/get', 'CareersTableController')->name('careers.get');
    });
    
});