<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\AdminController;

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


Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
//Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/contact', [ContactController::class, 'index'])->name('contact.index');
// ログイン必須ページ
//Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::middleware('auth')->group(function () {

    // 管理画面
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/search', function () {
        return view('search');
    });

    Route::get('/delete', function () {
        return view('delete');
    });

    Route::get('/reset', function () {
        return view('reset');
    });

});

Fortify::loginView(function () {
    return view('login');
});

Fortify::registerView(function () {
    return view('register');
});