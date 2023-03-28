<?php
/**
 * Project
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Project'], function () {
        Route::resource('projects', 'ProjectsController');
        //For Datatable
        Route::post('projects/get', 'ProjectsTableController')->name('projects.get');
    });
    
});