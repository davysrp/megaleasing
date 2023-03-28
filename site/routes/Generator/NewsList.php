<?php
/**
 * NewsList
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'NewsList'], function () {
        Route::resource('newslists', 'NewsListsController');
        //For Datatable
        Route::post('newslists/get', 'NewsListsTableController')->name('newslists.get');
    });
    
});