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

Route::get('/', function () {
    return view('index');
});
//kontak
Route::resource('kontak','Kontak'); //tambahkan baris ini
Route::get('kontak/create','Kontak@create');
Route::post('kontak/create','Kontak@store');
Route::get('kontak/{id}','Kontak@show');
Route::get('kontak/{id}/edit','Kontak@edit');
Route::put('kontak/{id}','Kontak@update');
Route::delete('kontak/{id}','Kontak@destroy');

//user REST
Route::get('user','User@index');
Route::get('user/{id}','User@show');
Route::post('user/store','User@store');
Route::put('user/{id}','User@update');
Route::delete('user/{id}','User@destroy');

//auth
Route::get('/home_user', 'Auth@index');
Route::get('/login', 'Auth@login');
Route::post('/loginPost', 'Auth@loginPost');
Route::get('/register', 'Auth@register');
Route::post('/registerPost', 'Auth@registerPost');
Route::get('/logout', 'Auth@logout');


Route::get('/halaman-kedua', function () {
    return view('halamandua');
});
Route::get('foo', function () {
    return 'Hello World';
});