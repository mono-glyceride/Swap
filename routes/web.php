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

Route::get('/', 'ExhibitsController@index');

// resource Restful
// index
// URL
/*
/exhibits => ExhibitsController@index

*/



// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');



// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');



// 認証が必要なもの
Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    Route::resource('exhibits', 'ExhibitsController', ['only' => ['store']]);
    // マイページ
    Route::get('wanted/{id}', 'ExhibitsController@wanted') ->name('exhibits.wanted');
    Route::get('swapping/{id}', 'RequestsController@swapping') ->name('requests.swapping');
    Route::get('talk/{id}', 'RequestsController@talk') ->name('requests.talk');
    Route::resource('exhibits', 'ExhibitsController');
    Route::resource('exhibits', 'ExhibitsController', ['only' => ['store','index','edit']]);
    Route::resource('users', 'UsersController');

    Route::resource('requests', 'RequestsController');

    Route::get('exhibits/{id}/requests/create_mail', 'RequestsController@create_mail')->name('requests.create_mail');
    Route::get('exhibits/{id}/requests/create_handing', 'RequestsController@create_handing')->name('requests.create_handing');

    Route::resource('messages', 'MessagesController');
});