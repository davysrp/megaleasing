<?php
/**
 * PhoductPhoto
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'PhoductPhoto'], function () {
        Route::resource('phoductphotos', 'PhoductPhotosController');
        //For Datatable
        Route::post('phoductphotos/get', 'PhoductPhotosTableController')->name('phoductphotos.get');
    });
    
});