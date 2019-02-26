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
Route::resource('kontak','Kontak'); //tambahkan baris ini

Route::get('/halaman-kedua', function () {
    return view('halamandua');
});
Route::get('foo', function () {
    return 'Hello World';
});