<?php
/**
 * Province
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Province'], function () {
        Route::resource('provinces', 'ProvincesController');
        //For Datatable
        Route::post('provinces/get', 'ProvincesTableController')->name('provinces.get');
    });
    
});