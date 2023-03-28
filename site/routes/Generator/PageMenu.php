<?php
/**
 * PageMenu
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'PageMenu'], function () {
        Route::resource('pagemenus', 'PageMenusController');
        //For Datatable
        Route::post('pagemenus/get', 'PageMenusTableController')->name('pagemenus.get');
    });
    
});