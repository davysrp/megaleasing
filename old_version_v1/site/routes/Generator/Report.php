<?php
/**
 * Report
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Report'], function () {
        Route::resource('reports', 'ReportsController');
        //For Datatable
        Route::post('reports/get', 'ReportsTableController')->name('reports.get');
    });
    
});