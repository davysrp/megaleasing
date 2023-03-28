<?php
/**
 * ProductPhoto
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'ProductPhoto'], function () {
        Route::resource('productphotos', 'ProductPhotosController');
        //For Datatable
        Route::post('productphotos/get', 'ProductPhotosTableController')->name('productphotos.get');
    });
    
});