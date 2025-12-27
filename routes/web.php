<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController,ClassChangeController, StudentProfileController, AuthController, CourseController};

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

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('dashboard',[UserController::class, 'dashboard'])->name('dashboard');
    Route::get('profile',[StudentProfileController::class, 'edit'])->name('profile');
    // Route::get('courses',[UserController::class, 'courses'])->name('courses');
    Route::get('quiz',[UserController::class, 'quiz'])->name('quiz');
    Route::get('interactive-quizzes-games',[UserController::class, 'gameQuiz'])->name('gameQuiz');
    Route::post('/assignment/update-status', [UserController::class, 'updateStatus'])->name('assignment.updateStatus');
    Route::get('classroom-report',[UserController::class, 'classRoomReport'])->name('classroom-report');
    Route::get('teacher-feedback',[UserController::class, 'teacherFeedback'])->name('teacher-feedback');
    Route::post('/student/profile/image-upload',[StudentProfileController::class, 'uploadImage'])->name('student.profile.image.upload');
    Route::post('/student/profile', [StudentProfileController::class, 'update'])->name('student.profile.update');
    Route::get('performance', [UserController::class, 'performance'])->name('student.performance');
    Route::get('performance/data', [UserController::class, 'performanceData'])->name('student.performance.data');

    Route::get('/student/bmi', [UserController::class, 'BMIData'])->name('student.bmi');
    Route::get('/student/doctor-consultation', [UserController::class, 'doctorConsultant'])->name('student.doctor-consultation');
    Route::get('/student/died-plan-access', [UserController::class, 'diedPlanAccess'])->name('student.died-plan-access');
    Route::get('/student/bmi-chart', [UserController::class,'labReport'])->name('student.bmi-chart');
    Route::post('/student/doctor-consultation',[UserController::class, 'store'])->name('student.doctor-consultation.store');
    Route::put('/student/doctor-consultation/{id}',[UserController::class, 'update'])->name('student.doctor-consultation.update');
    Route::delete('/student/doctor-consultation/{id}',[UserController::class, 'destroy'])->name('student.doctor-consultation.destroy');
    Route::get('/student/workshop-calendar', [UserController::class, 'workshopCalender'])->name('student.workshopcalendar');
   
    Route::get('/workshop-events', [UserController::class, 'getEvents'])->name('workshop.events');
    Route::get('/student/certificates', [UserController::class, 'certificates'])->name('student.certificates');
    Route::get('/student/lab-report', [UserController::class, 'labReportData'])->name('student.lab-report');
    Route::get('/student/appointment-test-reminder', [UserController::class, 'appointmentTestRemindersList'])->name('student.appointment-test-reminder');

    Route::get('courses/enrolled-courses',[CourseController::class, 'enrolledCourses'])->name('courses.enrolled_courses');
    Route::get('courses/course-catalog',[CourseController::class, 'courseCatalog'])->name('courses.course_catalog');
    Route::get('courses/language',[CourseController::class, 'languageCourse'])->name('courses.language_course');

    Route::get('/class-change', [ClassChangeController::class, 'index'])->name('student.class-change.index');
    Route::post('/class-change', [ClassChangeController::class, 'store'])->name('student.class-change.store');
    Route::put('/class-change/{id}', [ClassChangeController::class, 'update'])->name('student.class-change.update');
    Route::delete('/class-change/{id}', [ClassChangeController::class, 'destroy'])->name('student.class-change.destroy');
});