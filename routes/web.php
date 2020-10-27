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

Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');

Route::get('/course/full', [App\Http\Controllers\CourseController::class, 'full'])->name('course.full');

Route::post('/course/{course}/enroll', [App\Http\Controllers\CourseController::class, 'enroll'])->name('course.enroll');

Route::get('/course/{course}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.show');



/*
|--------------------------------------------------------------------------
| Exams Routes
|--------------------------------------------------------------------------
*/

Route::get('/course/{course}/exam', [App\Http\Controllers\ExamController::class, 'index'])->name('exam.index');

Route::get('/course/{course}/exam/{exam}', [App\Http\Controllers\ExamController::class, 'show'])->name('exam.show');

Route::get('/course/{course}/exam/{exam}/resume', [App\Http\Controllers\ExamController::class, 'resume'])->name('exam.resume');

Route::post('/course/{course}/exam/{exam}/doing/{doing}/submit', [App\Http\Controllers\ExamController::class, 'submit'])->name('exam.submit');

Route::get('/course/{course}/exam/{exam}/doing/{doing}/result', [App\Http\Controllers\ExamController::class, 'result'])->name('exam.result');



/*
|--------------------------------------------------------------------------
| News Routes
|--------------------------------------------------------------------------
*/

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');

Route::get('/news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');



/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::get('/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');





Route::get('/examList', function(){
    return view('examlist');
}) ;
Route::put('/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');



/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::get('student/export/', [App\Http\Controllers\StudentController::class, 'export'])->name('student.export');

Route::get('student/import/', [App\Http\Controllers\StudentController::class, 'import'])->name('student.import');



/*
|--------------------------------------------------------------------------
| Lecturer Routes
|--------------------------------------------------------------------------
*/

Route::get('lecturer/export/', [App\Http\Controllers\LecturerController::class, 'export'])->name('lecturer.export');

Route::get('lecturer/import/', [App\Http\Controllers\LecturerController::class, 'import'])->name('lecturer.import');

Route::get('/lecturer', [App\Http\Controllers\LecturerController::class, 'dashboard'])->name('lecturer');

Route::get('/lecturer/course', [App\Http\Controllers\LecturerController::class, 'courses'])->name('lecturer.course');

Route::get('/lecturer/course/{course}', [App\Http\Controllers\LecturerController::class, 'exams'])->name('lecturer.course.exam');

Route::get('/lecturer/course/{course}/exam/{exam}', [App\Http\Controllers\LecturerController::class, 'questions'])->name('lecturer.course.exam.question');

Route::get('/lecturer/dashboard', [App\Http\Controllers\LecturerController::class, 'dashboard'])->name('lecturer.dashboard');



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
