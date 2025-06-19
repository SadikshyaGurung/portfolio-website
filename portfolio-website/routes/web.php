<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PersonalDetailController;

    // Show registration form
Route::get('/register', [AuthController::class, 'registerview'])->name('register.view');

// Handle registration form submission
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/', [HomeController::class, 'index'])->name('home'); // Homepage
Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit'); // Edit settings
Route::post('/home/update', [HomeController::class, 'update'])->name('home.update'); // Update settings

// Homepage
Route::get('/home_edit', fn() => view('home_edit'));

// About
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index']);

// Contact Form (GET route for the form)
Route::get('/contact', function () {
    return view('contact'); // Returns contact.blade.php
});

// Handle contact form submission (POST route)
Route::post('/contact', [MessageController::class, 'store'])->name('message.store');

// Login/Logout
Route::get('/login', [AuthController::class, 'loginView'])->name('login.View');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Resume
Route::get('/resume', [ResumeController::class, 'show'])->name('resume');

// Projects
Route::get('/project', function () {
    $projects = Project::latest()->get();
    return view('project', compact('projects'));
})->name('project');

// ---------------------------
// Dashboard & Admin Routes (Requires Auth)
// ---------------------------

Route::middleware('auth')->group(function () {

    // Admin dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

    // Admin Contact Dashboard route
    Route::get('/contactdash', [AdminContactController::class, 'index'])->name('contactdash');

    // Admin message management routes
    Route::get('/admin/message/{id}/edit', [AdminContactController::class, 'edit'])->name('message.edit');
    Route::put('/admin/message/{id}', [AdminContactController::class, 'update'])->name('message.update');
    Route::delete('/admin/message/{id}', [AdminContactController::class, 'destroy'])->name('message.destroy');

    Route::get('/personal', [PersonalDetailController::class, 'personal'])->name('personal');

// Route to show the edit form for personal details
Route::get('/personal/edit', [PersonalDetailController::class, 'edit'])->name('personal.edit');

// Route to handle the update (post form submission)
Route::post('/personal/update', [PersonalDetailController::class, 'update'])->name('personal.update');


    // Skill Management
    Route::get('/skilldash', [SkillController::class, 'index'])->name('skilldash.index');
    Route::get('/addskill', [SkillController::class, 'add'])->name('skill.add');
    Route::post('/addskill', [SkillController::class, 'store'])->name('skill.store');

    // In routes/web.php
Route::get('home_edit', [HomeController::class, 'edit'])->name('home.edit');
Route::post('home_update', [HomeController::class, 'update'])->name('home.update');

    // Project Management
    Route::get('/projectform', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/projectform', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projectdash', [ProjectController::class, 'index'])->name('projectdash.index');
    Route::get('/projectedit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projectedit/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projectdelete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
});


