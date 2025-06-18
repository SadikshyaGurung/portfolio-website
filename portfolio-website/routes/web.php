<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;

Route::get('/', fn () => view('welcome'));
Route::get('/admin', fn () => view('admin'));
Route::get('/addform', fn () => view('addform'));

// Skill routes
Route::get('/skilldash', [SkillController::class, 'index'])->name('skilldash.index');
Route::get('/addskill', [SkillController::class, 'add'])->name('skill.add');
Route::post('/addskill', [SkillController::class, 'store'])->name('skill.store');

// Project routes
Route::get('/projectform', [ProjectController::class, 'create'])->name('project.create');
Route::post('/projectform', [ProjectController::class, 'store'])->name('project.store');
Route::get('/projectdash', [ProjectController::class, 'index'])->name('projectdash.index');
Route::get('/projectedit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/projectedit/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/projectdelete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

// About and Welcome routes
Route::get('/about', function () {
    return view('about');
});
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
