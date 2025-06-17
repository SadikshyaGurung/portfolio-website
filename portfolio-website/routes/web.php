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
