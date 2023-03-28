<?php
/**
 * Job
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Job'], function () {
        Route::resource('jobs', 'JobsController');
        //For Datatable
        Route::post('jobs/get', 'JobsTableController')->name('jobs.get');
    });
    
});