<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
//use App\Http\Controllers\Auth\RegisterController;
//use App\Http\Controllers\Auth\LoginController;
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


Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
//Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
//Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/contact', [ContactController::class, 'index'])->name('contact.index');
// ログイン必須ページ
//Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {

    // 管理画面
    Route::get('/admin', [AdminController::class, 'admin']);
    Route::get('/search', [ContactController::class, 'search']);
    Route::post('/delete', [ContactController::class, 'destroy']);
    Route::post('/export', [ContactController::class, 'export']);

    Route::get('/reset', function () {
        return view('reset');
    });

});
