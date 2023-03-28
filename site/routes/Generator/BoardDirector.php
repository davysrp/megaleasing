<?php
/**
 * BoardDirector
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'BoardDirector'], function () {
        Route::resource('boarddirectors', 'BoardDirectorsController');
        //For Datatable
        Route::post('boarddirectors/get', 'BoardDirectorsTableController')->name('boarddirectors.get');
    });
    
});