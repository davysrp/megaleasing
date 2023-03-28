<?php
/**
 * ECommerce
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'ECommerce'], function () {
        Route::resource('ecommerces', 'ECommercesController');
        //For Datatable
        Route::post('ecommerces/get', 'ECommercesTableController')->name('ecommerces.get');
    });
    
});