<?php
/**
 * ManagementTeam
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'ManagementTeam'], function () {
        Route::resource('managementteams', 'ManagementTeamsController');
        //For Datatable
        Route::post('managementteams/get', 'ManagementTeamsTableController')->name('managementteams.get');
    });
    
});