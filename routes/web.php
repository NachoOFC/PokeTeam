<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('index.register');
});


Route::get('/login', function () {
    return view('index.login');
});

Route::get('/editperfil', function () {
    return view('index.editperfil');
});

Route::post('/editperfil', 'editperfilController@store')->name('avatars.store');

Route::post('user/update/password', 'editperfilController@update')->name('user.update');

