<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Default Routes
|--------------------------------------------------------------------------
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::post('/setting/mode', [App\Http\Controllers\SettingController::class, 'mode'])->name('setting.mode');

Route::get('/main-dashboard', function(){
    return view('main-dashboard');
})->name('main-dashboard');



/*
|--------------------------------------------------------------------------
| OAuth Routes
|--------------------------------------------------------------------------
*/

Route::get('login/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login.provider');

Route::get('login/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('login.provider.callback');



/*
|--------------------------------------------------------------------------
| Course Routes
|--------------------------------------------------------------------------
*/

Route::post('/course/import/', [App\Http\Controllers\CourseController::class, 'import'])->name('course.import');

Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');

Route::post('/course/{course}/enroll', [App\Http\Controllers\CourseController::class, 'enroll'])->name('course.enroll');

Route::get('/course/{course}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.show');



/*
|--------------------------------------------------------------------------
| Exams Routes
|--------------------------------------------------------------------------
*/

Route::get('/course/{course}/exam/export/', [App\Http\Controllers\ExamController::class, 'export'])->name('exam.export');

Route::post('/course/{course}/exam/import/', [App\Http\Controllers\ExamController::class, 'import'])->name('exam.import');

Route::get('/course/{course}/exam', [App\Http\Controllers\ExamController::class, 'index'])->name('exam.index')->middleware('enroll');

Route::get('/course/{course}/exam/{exam}', [App\Http\Controllers\ExamController::class, 'show'])->name('exam.show')->middleware('enroll');

Route::get('/course/{course}/exam/{exam}/resume', [App\Http\Controllers\ExamController::class, 'resume'])->name('exam.resume')->middleware('enroll');

Route::post('/course/{course}/exam/{exam}/doing/{doing}/submit', [App\Http\Controllers\ExamController::class, 'submit'])->name('exam.submit')->middleware('enroll');

Route::get('/course/{course}/exam/{exam}/doing/{doing}/result', [App\Http\Controllers\ExamController::class, 'result'])->name('exam.result')->middleware('enroll');



/*
|--------------------------------------------------------------------------
| News Routes
|--------------------------------------------------------------------------
*/

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');

Route::post('/news', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');

Route::get('/news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');



/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::get('/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');

Route::put('/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');



/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::get('student/export/', [App\Http\Controllers\StudentController::class, 'export'])->name('student.export');

Route::get('student/import/', [App\Http\Controllers\StudentController::class, 'import'])->name('student.import');

Route::get('/student', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('student');

Route::get('/student/dashboard', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('student.dashboard');

Route::get('/student/course', [App\Http\Controllers\StudentController::class, 'courses'])->name('student.course');

Route::get('/student/course/{course}', [App\Http\Controllers\StudentController::class, 'exams'])->name('student.course.exam');

Route::get('/student/result/', [App\Http\Controllers\StudentController::class, 'result'])->name('student.result');

Route::get('/student/course/{course}/exam/{exam}', [App\Http\Controllers\StudentController::class, 'preview'])->name('student.course.exam.preview');

Route::post('/student/request', [App\Http\Controllers\StudentController::class, 'request'])->name('student.request');



/*
|--------------------------------------------------------------------------
| Lecturer Routes
|--------------------------------------------------------------------------
*/

Route::get('/lecturer/export/', [App\Http\Controllers\LecturerController::class, 'export'])->name('lecturer.export');

Route::get('/lecturer/import/', [App\Http\Controllers\LecturerController::class, 'import'])->name('lecturer.import');

Route::get('/lecturer', [App\Http\Controllers\LecturerController::class, 'dashboard'])->name('lecturer');

Route::get('/lecturer/course', [App\Http\Controllers\LecturerController::class, 'courses'])->name('lecturer.course');

Route::get('/lecturer/course/{course}', [App\Http\Controllers\LecturerController::class, 'exams'])->name('lecturer.course.exam');

Route::post('/lecturer/course/{course}', [App\Http\Controllers\LecturerController::class, 'storeExam'])->name('lecturer.exam.store');

Route::get('/lecturer/course/{course}/exam/{exam}', [App\Http\Controllers\LecturerController::class, 'questions'])->name('lecturer.course.exam.question');

Route::post('/lecturer/course/{course}/exam/{exam}', [App\Http\Controllers\LecturerController::class, 'storeQuestion'])->name('lecturer.course.exam.question.store');

Route::get('/lecturer/dashboard', [App\Http\Controllers\LecturerController::class, 'dashboard'])->name('lecturer.dashboard');

Route::post('/lecturer/request', [App\Http\Controllers\LecturerController::class, 'request'])->name('lecturer.request');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/user', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.user');

Route::post('/admin/user', [App\Http\Controllers\AdminController::class, 'storeUser'])->name('admin.user.store');

Route::post('/admin/course', [App\Http\Controllers\AdminController::class, 'storeCourse'])->name('admin.course.store');

Route::get('/admin/course', [App\Http\Controllers\AdminController::class, 'courses'])->name('admin.course');

Route::get('/admin/course/{course}', [App\Http\Controllers\AdminController::class, 'exams'])->name('admin.course.exam');

Route::get('/admin/course/{course}/exam/{exam}', [App\Http\Controllers\AdminController::class, 'questions'])->name('admin.course.exam.question');

Route::get('/admin/request', [App\Http\Controllers\AdminController::class, 'allRequests'])->name('admin.request.index');

Route::put('/admin/request/{userRequest}/verify', [App\Http\Controllers\AdminController::class, 'verify'])->name('admin.request.verify');

Route::put('/admin/request/{userRequest}/deny', [App\Http\Controllers\AdminController::class, 'deny'])->name('admin.request.deny');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/{role}/feedback/inbox', [App\Http\Controllers\FeedbackController::class,'inbox'])->name('feedback.inbox');

Route::post('/{role}/feedback/inbox/readAll', [App\Http\Controllers\FeedbackController::class,'markAsReadAll'])->name('feedback.inbox.readAll');

Route::get('/{role}/feedback/', [App\Http\Controllers\FeedbackController::class,'index'])->name('feedback.index');

Route::get('/feedback/read/{notify}', [App\Http\Controllers\FeedbackController::class, 'read'])->name('feedback.read');
