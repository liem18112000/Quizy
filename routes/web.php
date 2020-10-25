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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');



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

Route::get('/course/{course}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.show');



/*
|--------------------------------------------------------------------------
| Exams Routes
|--------------------------------------------------------------------------
*/

Route::get('/course/{course}/exam', [App\Http\Controllers\ExamController::class, 'index'])->name('exam.index');

Route::get('/course/{course}/exam/{exam}', [App\Http\Controllers\ExamController::class, 'show'])->name('exam.show');



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

Route::get('/lecturer/dashboard', [App\Http\Controllers\LecturerController::class, 'dashboard'])->name('lecturer.dashboard');

Route::get('/lecturer/table/course', [App\Http\Controllers\LecturerController::class, 'tableCourse'])->name('lecturer.table.course');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/table/user', [App\Http\Controllers\AdminController::class, 'tableUser'])->name('admin.table.user');

Route::get('/admin/table/course', [App\Http\Controllers\AdminController::class, 'tableCourse'])->name('admin.table.course');
