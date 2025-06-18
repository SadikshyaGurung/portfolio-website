<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/store-message', [MessageController::class, 'store'])->name('storeMessage');
Route::get('/contactdash', [MessageController::class, 'index'])->name('contactdash');



Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');

//message routes
Route::get('/skilldash', [SkillController::class, 'index'])->name('skilldash.index');
Route::get('/addskill', [SkillController::class, 'add'])->name('skill.add');
Route::post('/addskill', [SkillController::class, 'store'])->name('skill.store');



Route::get('/', fn () => view('welcome'));
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
Route::get('/project', function () {
    return view('project');
});

Route::get('/', function () {
    return view('home');
});
Route::get('/resume', function () {
    return view('resume');
});
Route::get('/contactdash', function () {
    return view('contactdash');
});
Route::get('/contact', function () {
    return view('contact');
});

