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

    Route::post('hisspl/downloadExcel', array('before' => 'csrf','uses' => 'HissplController@downloadExcel'));
    Route::post('hisspl/user', array('before' => 'csrf','uses' => 'HissplController@user'));
    Route::post('hisspl/spv', array('before' => 'csrf','uses' => 'HissplController@spv'));
    Route::post('hisspl/dbm', array('before' => 'csrf','uses' => 'HissplController@dbm'));
    Route::post('hisspl/mgr', array('before' => 'csrf','uses' => 'HissplController@mgr'));
    Route::resource('hisspl', 'HissplController');

});
