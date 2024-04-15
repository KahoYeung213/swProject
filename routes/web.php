<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Lecturer\ModuleController as LecturerModuleController;
use App\Http\Controllers\Student\ModuleController as StudentModuleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/lecturer/modules', LecturerModuleController::class)->middleware(['auth'])->names('lecturer.modules');
    Route::resource('/student/modules', StudentModuleController::class)->middleware(['auth'])->names('student.modules')->only(['index', 'show']);
    // the routes will only be available when a student is logged in
    Route::resource('games',GameController::class);
});

require __DIR__.'/auth.php';
