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
    Route::get('swapping/{id}', 'PropositionsController@swapping') ->name('propositions.swapping');
    Route::get('talk/{id}', 'PropositionsController@talk') ->name('propositions.talk');
    Route::resource('exhibits', 'ExhibitsController');
    Route::resource('exhibits', 'ExhibitsController', ['only' => ['store','index','edit']]);
    Route::resource('users', 'UsersController');

    Route::resource('propositions', 'PropositionsController');

    Route::get('exhibits/{id}/propositions/create_mail', 'PropositionsController@create_mail')->name('propositions.create_mail');
    Route::get('exhibits/{id}/propositions/create_handing', 'PropositionsController@create_handing')->name('propositions.create_handing');

    Route::resource('messages', 'MessagesController');
});