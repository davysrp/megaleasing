<?php
/**
 * PhotoVideo
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'PhotoVideo'], function () {
        Route::resource('photovideos', 'PhotoVideosController');
        //For Datatable
        Route::post('photovideos/get', 'PhotoVideosTableController')->name('photovideos.get');
    });
    
});