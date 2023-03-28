<?php
/**
 * AboutUs
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'AboutUs'], function () {
        Route::resource('aboutuses', 'AboutUsController');
        //For Datatable
        Route::post('aboutuses/get', 'AboutUsTableController')->name('aboutus.get');
    });
    
});