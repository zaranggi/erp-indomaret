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

Route::group([ 'middleware' => ['web','auth'], ], function() {

    Route::get('pendspl/preview/{id}', array('uses' => 'PendsplController@preview'));
    Route::get('pendspl/previewuser/{id}', array('uses' => 'PendsplController@previewuser'));

    Route::post('pendspl/mgr', array('before' => 'csrf','uses' => 'PendsplController@mgr'));
    Route::post('pendspl/mgr/app', array('before' => 'csrf','uses' => 'PendsplController@mgrapp'));

    Route::post('pendspl/dbm', array('before' => 'csrf','uses' => 'PendsplController@dbm'));
    Route::post('pendspl/dbm/app', array('before' => 'csrf','uses' => 'PendsplController@dbmapp'));

    Route::resource('pendspl', 'PendsplController');

});

