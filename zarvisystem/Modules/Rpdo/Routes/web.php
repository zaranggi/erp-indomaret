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

    Route::post('rpdo/tampillist', array('before' => 'csrf','uses' => 'RpdoController@tampillist'));

    Route::get('rpdo/preview/{id}', array('uses' => 'RpdoController@preview'));
    Route::get('rpdo/previewmgr/{id}', array('uses' => 'RpdoController@previewmgr'));
    Route::get('rpdo/previewdbm/{id}', array('uses' => 'RpdoController@previewdbm'));
    Route::get('rpdo/previewdbmall/{minggu}/{periode}', array('uses' => 'RpdoController@previewdbmall'));

    Route::resource('rpdo', 'RpdoController');

});
