<?php
/**
 * Slide
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Slide'], function () {
        Route::resource('slides', 'SlidesController');
        //For Datatable
        Route::post('slides/get', 'SlidesTableController')->name('slides.get');
    });
    
});