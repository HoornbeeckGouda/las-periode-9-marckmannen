<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectResultsController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/grading', [SubjectResultsController::class, 'index'])->middleware(['auth', 'notRole:1'])->name('grading');
Route::get('/users', [UserController::class, 'index'])->middleware(['auth', 'notRole:1'])->name('users');
Route::get('/students', [SubjectResultsController::class, 'index'])->middleware(['auth', 'notRole:1'])->name('students');

Route::get('/grading/{student}', [SubjectResultsController::class, 'show'])->name('grading.show');
Route::post('/grading/{student}', [SubjectResultsController::class, 'create'])->name('grading.create');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
