<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminContactController;

Route::middleware('auth')->group(function () {
    Route::get('/admin/contacts', [AdminContactController::class, 'index'])->name('contactdash');
    Route::get('/admin/message/{id}/edit', [AdminContactController::class, 'edit'])->name('message.edit');
    Route::put('/admin/message/{id}', [AdminContactController::class, 'update'])->name('message.update');
    Route::delete('/admin/message/{id}', [AdminContactController::class, 'destroy'])->name('message.destroy');
});
// Show the contact form
Route::get('/contact', [MessageController::class, 'showForm'])->name('contact');

// Handle the form submission
Route::post('/contact', [MessageController::class, 'store'])->name('contact.submit');


// Admin dashboard
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit');
    Route::post('/home/update', [HomeController::class, 'update'])->name('home.update');
});

// Authentication routes
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginView'])->name('login.View');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Public routes
Route::get('/', fn() => view('welcome'));
Route::get('/addform', fn() => view('addform'));
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/store-message', [MessageController::class, 'store'])->name('store');

// Contact dashboard route using controller
Route::get('/contactdash', [MessageController::class, 'index'])->name('contactdash');

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

// Static pages
Route::get('/about', fn() => view('about'));
Route::get('/project', fn() => view('project'));
Route::get('/home', fn() => view('home'));
Route::get('/resume', fn() => view('resume'));

// Handle contact form submission
Route::post('/contact/submit', [MessageController::class, 'submit'])->name('contact.submit');
