<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('promotion')->middleware(['auth', 'module:promotion'])->group(function() {

    Route::get('/', 'HomeController@index')->name('promotion.home');
     
    Route::prefix('staff')->group(function() {
        Route::get('apply', 'ApplicationController@create')->name('promotion.application.create');
        Route::get('applications', 'ApplicationController@index')->name('promotion.application.index');  
        Route::get('application/{application}', 'ApplicationController@show')->name('promotion.application.show');
        Route::get('application/{application}/delete', 'ApplicationController@delete')->name('promotion.application.delete');
        Route::get('application/{application}/download', 'ApplicationController@download')->name('promotion.application.download');
        Route::get('peer-review', 'PeerReviewController@index')->name('promotion.peer.index');
        Route::get('peer-review/{application}', 'PeerReviewController@review')->name('promotion.peer.review');       
    });

    Route::prefix('staff')->middleware(['promotion:peer'])->group(function() {
        Route::get('peer-review', 'PeerReviewController@index')->name('promotion.peer.index');
        Route::get('peer-review/{application}', 'PeerReviewController@review')->name('promotion.peer.review');
    });

    Route::prefix('appraiser')->middleware(['promotion:appraiser'])->group(function() {
        Route::get('head-review', 'HeadReviewController@index')->name('promotion.head.index');
        Route::get('head-review/{application}', 'HeadReviewController@review')->name('promotion.head.review');
    });

    Route::prefix('admin')->middleware(['promotion:admin'])->group(function() {
        Route::get('appraiser-setup/applications', 'AppraiserController@index')->name('promotion.appraiser.index');
        Route::get('appraiser-setup/{application}', 'AppraiserController@setup')->name('promotion.appraiser.setup');
        Route::get('applications', 'AdminController@applications')->name('promotion.admin.applications');
    });

});
