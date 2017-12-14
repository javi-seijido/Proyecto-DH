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

Route::get('/users', function () {
    return view('abmUsers');
});

Auth::routes();

Route::get('/personal', function(){
  return view('registro_personal');
})->name('per');

Route::post('/personal', function(){
  return view('registro_personal');
});

Route::get('/faq', function () {
    return view('faq');
});

//
// Route::get('/home', 'HomeController@index')->name('home');
//
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login');
// Route::post('/logout', 'Auth\LoginController@lgout')->name('logout');
//
//Password Reset Route....
