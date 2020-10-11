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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');




/*
|--------------------------------------------------------------------------
| Course Routes
|--------------------------------------------------------------------------
*/

Route::get('/course', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');

Route::get('/course/{course}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.show');



/*
|--------------------------------------------------------------------------
| News Routes
|--------------------------------------------------------------------------
*/

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');

Route::get('/news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');



/*
|--------------------------------------------------------------------------
| News Routes
|--------------------------------------------------------------------------
*/

Route::get('/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
