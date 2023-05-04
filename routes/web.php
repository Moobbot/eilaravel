<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome', ['page_title' => "Trang chủ"]);
});
// Route::get('/{name}', function ($name) {
//     return view('welcome', ['name' => $name]);
// });
// Route::get('/home', function () {
//     return view('home', ['page_title' => "Trang chủ"]);
// });
Route::get('/test', function () {
    return view('test');
});
Route::get('/login', function () {
    return view('login', ['page_title' => "Đăng nhập"]);
});
Route::get('/register', function () {
    return view('register', ['page_title' => "Đăng ký"]);
});
// Route::view('register', 'register');
