<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeSettingController;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\ResumeController;
use App\Models\Project;


// ---------------------------
// Public Routes
// ---------------------------

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {

    Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit');
    Route::post('/home/update', [HomeController::class, 'update'])->name('home.update');
});

// Homepage
Route::get('/', fn() => view('welcome'));


// About
Route::get('/about', fn() => view('about'));

// Contact Form
Route::get('/contact', [MessageController::class, 'showForm'])->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.submit');


Route::get('/login', [AuthController::class, 'loginView'])->name('login.View');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/logout', fn() => view('logout'))->name('logout');
Route::get('/', fn() => view('welcome'));
Route::get('/addform', fn() => view('addform'));
// Resume (fixed - use controller method)
Route::get('/resume', [ResumeController::class, 'show'])->name('resume');


// Public project listing
Route::get('/project', function () {
    $projects = Project::latest()->get();
    return view('project', compact('projects'));
})->name('project');


// Route::get('/', function () {
//     return view('home');
// });
Route::get('/resume', function () {
    return view('resume');
});
Route::get('/contactdash', function () {
    return view('contactdash');
});
// Route::get('/', [HomeController::class, 'index']);




// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/contact', function () {
    return view('contact');
});


// Register
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/login', [AuthController::class, 'loginView'])->name('login.View');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// ---------------------------
// Dashboard & Admin Routes (Requires Auth)
// ---------------------------

Route::middleware('auth')->group(function () {

    // Admin dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

    // Home Page Edit
    Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit');
    Route::post('/home/update', [HomeController::class, 'update'])->name('home.update');

    // Admin Contact Dashboard (was 'contactdash' before - moved here)
    Route::get('/contactdash', [AdminContactController::class, 'index'])->name('contactdash');
    Route::get('/admin/message/{id}/edit', [AdminContactController::class, 'edit'])->name('message.edit');
    Route::put('/admin/message/{id}', [AdminContactController::class, 'update'])->name('message.update');
    Route::delete('/admin/message/{id}', [AdminContactController::class, 'destroy'])->name('message.destroy');

    // Skills Management
    Route::get('/skilldash', [SkillController::class, 'index'])->name('skilldash.index');
    Route::get('/addskill', [SkillController::class, 'add'])->name('skill.add');
    Route::post('/addskill', [SkillController::class, 'store'])->name('skill.store');

    // Projects Management
    Route::get('/projectform', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/projectform', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projectdash', [ProjectController::class, 'index'])->name('projectdash.index');
    Route::get('/projectedit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projectedit/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projectdelete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
});
