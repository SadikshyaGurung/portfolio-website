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
use App\Models\Project;
use App\Http\Controllers\ResumeController;

Route::get('/resume', [ResumeController::class, 'show']);


// Public pages
Route::get('/', fn() => view('welcome'));
Route::get('/about', fn() => view('about'));
Route::get('/resume', fn() => view('resume'));

Route::get('/project', function () {
    $projects = Project::latest()->get();
    return view('project', compact('projects'));
})->name('project');  // Add this line

// Auth routes
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginView'])->name('login.View');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Contact form (public)
Route::get('/contact', [MessageController::class, 'showForm'])->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.submit');

// Home route with dynamic projects (can be made public if desired)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Admin dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

    // Home page edit
    Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit');
    Route::post('/home/update', [HomeController::class, 'update'])->name('home.update');

    // Admin contact dashboard
    Route::get('/admin/contacts', [AdminContactController::class, 'index'])->name('contactdash');
    Route::get('/admin/message/{id}/edit', [AdminContactController::class, 'edit'])->name('message.edit');
    Route::put('/admin/message/{id}', [AdminContactController::class, 'update'])->name('message.update');
    Route::delete('/admin/message/{id}', [AdminContactController::class, 'destroy'])->name('message.destroy');

    // Skills
    Route::get('/skilldash', [SkillController::class, 'index'])->name('skilldash.index');
    Route::get('/addskill', [SkillController::class, 'add'])->name('skill.add');
    Route::post('/addskill', [SkillController::class, 'store'])->name('skill.store');

    // Projects
    Route::get('/projectform', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/projectform', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projectdash', [ProjectController::class, 'index'])->name('projectdash.index');
    Route::get('/projectedit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projectedit/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projectdelete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
});
