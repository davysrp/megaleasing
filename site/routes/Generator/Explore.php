<?php
/**
 * Explore
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Explore'], function () {
        Route::resource('explores', 'ExploresController');
        //For Datatable
        Route::post('explores/get', 'ExploresTableController')->name('explores.get');
    });
    
});