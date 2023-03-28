<?php
/**
 * Subscriber
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Subscriber'], function () {
        Route::resource('subscribers', 'SubscribersController');
        //For Datatable
        Route::post('subscribers/get', 'SubscribersTableController')->name('subscribers.get');
    });
    
});