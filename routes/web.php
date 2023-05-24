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
Route::view('/welcome', 'welcome');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('home', 'HomeController@index')->name('home.home');

    Route::group(['middleware' => ['guest']], function () {

        Route::group(['namespace' => 'Auth'], function () {
            // Controllers Within The "App\Http\Controllers\Auth" Namespace

            /**
             * Login Routes
             */
            Route::get('login', 'LoginController@index')->name('login');
            Route::post('login', 'LoginController@login')->name('login.custom');

            /**
             * Register Routes
             */
            Route::get('register', 'RegisterController@index')->name('register');
            Route::post('registration', 'RegisterController@register')->name('register.custom');
        });
    });

    /**
     * The logout route that can be access only if user authenticated.
     */
    Route::group(['middleware' => ['auth']], function () {

        Route::group(['namespace' => 'Auth'], function () {
            /**
             * Logout Routes
             */
            Route::get('logout', 'LogoutController@logout')->name('logout');
        });
    });

    // Route::middleware(['auth', 'auth.session'])->group(function () { });
    // User
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
});
