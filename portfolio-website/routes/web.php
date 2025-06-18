<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\HomeController;



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
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit');
    Route::post('/home/update', [HomeController::class, 'update'])->name('home.update');
});




// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/register', [AuthController::class, 'registerView']);

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginView'])->name("login");

Route::post('/login', [AuthController::class, 'login']);

// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
