<?php
/**
 * About
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'About'], function () {
        Route::resource('abouts', 'AboutsController');
        //For Datatable
        Route::post('abouts/get', 'AboutsTableController')->name('abouts.get');
    });
    
});