<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'checkAdmin'])->name('dashboard');
Route::get('/', [StudentController::class, 'index'])->middleware(['auth'])->name('students');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('courses', CourseController::class)->middleware('checkAdmin');
Route::resource('students', StudentController::class);
Route::resource('orders', OrderController::class);

Route::get('/admin/students', [AdminController::class, 'viewStudents'])->middleware('checkAdmin')->name('admin.students.index');
Route::get('/admin/courses', [AdminController::class, 'viewCourses'])->middleware('checkAdmin')->name('admin.courses.index');
require __DIR__ . '/auth.php';