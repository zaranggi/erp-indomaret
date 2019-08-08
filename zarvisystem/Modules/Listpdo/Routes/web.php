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

    Route::get('listpdo/download/{id}', array('uses' => 'ListpdoController@download'));

    Route::get('listpdo/appmgr/{id}', array('uses' => 'ListpdoController@appmgr'));
    Route::get('listpdo/rjmgr/{id}', array('uses' => 'ListpdoController@rjmgr'));
    Route::get('listpdo/appdbm/{id}', array('uses' => 'ListpdoController@appdbm'));
    Route::get('listpdo/rjdbm/{id}', array('uses' => 'ListpdoController@rjdbm'));


    Route::get('listpdo/preview/{id}', array('uses' => 'ListpdoController@preview'));
    Route::get('listpdo/previewmgr/{id}', array('uses' => 'ListpdoController@previewmgr'));
    Route::get('listpdo/previewdbm/{id}', array('uses' => 'ListpdoController@previewdbm'));

    Route::resource('listpdo', 'ListpdoController');

});
