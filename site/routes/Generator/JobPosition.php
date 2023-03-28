<?php
/**
 * JobPosition
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'JobPosition'], function () {
        Route::resource('jobpositions', 'JobPositionsController');
        //For Datatable
        Route::post('jobpositions/get', 'JobPositionsTableController')->name('jobpositions.get');
    });
    
});