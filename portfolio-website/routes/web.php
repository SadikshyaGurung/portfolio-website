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
use App\Http\Controllers\PersonalDetailController;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

// Public Routes

// Public Projects page (anyone can view)
Route::get('/project', function () {
    $projects = Project::with('skills')->latest()->get();
    return view('project', compact('projects'));
})->name('project');

// Registration
Route::get('/register', [AuthController::class, 'registerview'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login / Logout
Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Other public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit');
Route::post('/home/update', [HomeController::class, 'update'])->name('home.update');

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index']);
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', [MessageController::class, 'store'])->name('message.store');
Route::get('/resume', [ResumeController::class, 'show'])->name('resume');


// Authenticated Routes (only logged-in users)
Route::middleware('auth')->group(function () {

    // Admin dashboard & other admin routes
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
    Route::get('/contactdash', [AdminContactController::class, 'index'])->name('contactdash');
    Route::get('/admin/message/{id}/edit', [AdminContactController::class, 'edit'])->name('message.edit');
    Route::put('/admin/message/{id}', [AdminContactController::class, 'update'])->name('message.update');
    Route::delete('/admin/message/{id}', [AdminContactController::class, 'destroy'])->name('message.destroy');

    // Personal details
    Route::get('/personal', [PersonalDetailController::class, 'personal'])->name('personal');
    Route::get('/personal/edit', [PersonalDetailController::class, 'edit'])->name('personal.edit');
    Route::post('/personal/update', [PersonalDetailController::class, 'update'])->name('personal.update');

    // Skill management
    Route::get('/skilldash', [SkillController::class, 'index'])->name('skilldash.index');
    Route::get('/addskill', [SkillController::class, 'add'])->name('skill.add');
    Route::post('/addskill', [SkillController::class, 'store'])->name('skill.store');
    Route::delete('/skilldash/{skill_id}', [SkillController::class, 'destroy'])->name('skilldash.destroy');



    // Project management routes (only for authenticated users)
    Route::get('/projectdash', [ProjectController::class, 'index'])->name('projectdash.index');
    Route::get('/projectform', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/projectform', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projectedit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projectedit/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projectdelete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
});
