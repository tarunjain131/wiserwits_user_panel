<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController, StudentProfileController, AuthController};

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard',[UserController::class, 'dashboard'])->name('dashboard');
    Route::get('profile',[StudentProfileController::class, 'edit'])->name('profile');
    Route::get('courses',[UserController::class, 'courses'])->name('courses');
    Route::get('quiz',[UserController::class, 'quiz'])->name('quiz');
    Route::post('/assignment/update-status', [UserController::class, 'updateStatus'])->name('assignment.updateStatus');
    Route::get('classroom-report',[UserController::class, 'classRoomReport'])->name('classroom-report');
    Route::get('teacher-feedback',[UserController::class, 'teacherFeedback'])->name('teacher-feedback');
    Route::post('/student/profile/image-upload',[StudentProfileController::class, 'uploadImage'])->name('student.profile.image.upload');
    Route::post('/student/profile', [StudentProfileController::class, 'update'])->name('student.profile.update');
    Route::get('performance', [UserController::class, 'performance'])->name('student.performance');
    Route::get('performance/data', [UserController::class, 'performanceData'])->name('student.performance.data');

    Route::get('/student/bmi', [UserController::class, 'BMIData'])->name('student.bmi');
    Route::get('/student/bmi-chart', [UserController::class,'labReport'])->name('student.bmi-chart');
});