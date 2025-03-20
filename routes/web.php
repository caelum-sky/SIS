<?php

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\SubjectController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web', 'verified'])->name('dashboard');
Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])
    ->middleware(['auth:student'])
    ->name('student.dashboard');

Route::resource('/students', StudentController::class)->middleware(['auth:web', 'verified']);
Route::resource('/subjects', SubjectController::class)->middleware(['auth:web', 'verified']);
Route::resource('/grade', GradeController::class)->middleware(['auth:web', 'verified']);
Route::resource('/student/enroll', EnrollmentController::class)->middleware(['auth:web', 'verified']);
Route::get('/student/{student_id}/subjects', [EnrollmentController::class, 'getSubjects'])
    ->name('enrollment.subjects')
    ->middleware(['auth:web', 'verified']);

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
