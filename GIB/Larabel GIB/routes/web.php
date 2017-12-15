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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/menu', function () {
    return view('menu');
})->middleware('auth');

Auth::routes();

Route::get('/personal', 'Personales@Carga_Combos')->middleware('auth');

Route::post('/personal', 'Personales@create')->name('crear_p')->middleware('auth');

Route::get('/procedimientos', function(){
  return view('faq')->middleware('auth');
});

Route::get('/usuarios', function(){
  return view('abmUsers')->middleware('auth');
});


//
// Route::get('/home', 'HomeController@index')->name('home');
//
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login');
// Route::post('/logout', 'Auth\LoginController@lgout')->name('logout');
//
//Password Reset Route....
