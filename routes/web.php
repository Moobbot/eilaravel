<?php

use Illuminate\Support\Facades\Route;
// Class // Class Request http
use Illuminate\Http\Request;
// Gọi Controllers sử dụng
use App\Http\Controllers\CustomAuthController;
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

Route::view('/', 'welcome', ['page_title' => "Trang chủ"]);
Route::redirect('/home', '/'); // dường link "home" dẫn vào "/"

Route::get('test', function () {
    return view('test');
});
// Route::get('login', function () {
//     return view('login', ['page_title' => "Đăng nhập"]);
// });
// Route::get('register', function () {
//     return view('register', ['page_title' => "Đăng ký"]);
// });
// Route::view('register', 'register');\

/* Thiết kế login và đăng ký tài khoản*/
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

// User
Route::get('/user/{id}', function ($id) {
    return 'User ' . $id;
});
