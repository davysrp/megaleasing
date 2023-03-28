<?php
/**
 * Routes for : Media
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Media'], function () {
	    Route::get('media', 'MediaController@index')->name('media.index');
	    
	    
	    
	    //For Datatable
	    Route::post('media/get', 'MediaTableController')->name('media.get');
	});
	
});