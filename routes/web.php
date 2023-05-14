<?php

use Illuminate\Support\Facades\Route;
// Class // Class Request http
use Illuminate\Http\Request;
// Gọi Controllers sử dụng
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
// Multi language
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

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

/* Edit Language start */

Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');
/* Edit Language End */

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
// Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

// User
// Route::get('/user/{id}', function ($id) {
//     return 'User ' . $id;
// });
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
