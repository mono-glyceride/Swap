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

Route::get('/', 'GivesController@index');

// resource Restful
// index
// URL
/*
/gives => GivesController@index

*/
Route::resource('gives', 'GivesController');


// サンプル
// Route::get('/mypage', 'UserController@index');
// Route::post('/mypage', 'UserController@edit');