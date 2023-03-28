<?php
/**
 * Client
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Client'], function () {
        Route::resource('clients', 'ClientsController');
        //For Datatable
        Route::post('clients/get', 'ClientsTableController')->name('clients.get');
    });
    
});