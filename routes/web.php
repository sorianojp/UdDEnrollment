<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentDescriptionController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\ProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('students', StudentController::class);
    Route::resource('students.enrollments', EnrollmentController::class)->shallow();
    Route::resource('students.payments', PaymentController::class)->shallow();
    Route::resource('colleges', CollegeController::class);
    Route::resource('paymentdescriptions', PaymentDescriptionController::class);
    Route::resource('colleges.programs', ProgramController::class)->shallow();

});
require __DIR__.'/auth.php';
