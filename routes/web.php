<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest:student'], function () {
    Route::get('student/login', 'Auth\LoginController@showStudentLoginForm');
    Route::post('student/login', 'Auth\LoginController@studentLogin');
});

Route::group(['middleware' => 'guest:teacher'], function () {
    Route::get('teacher/login', 'Auth\LoginController@showTeacherLoginForm');
    Route::post('teacher/login', 'Auth\LoginController@teacherLogin');
});

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('admin/login', 'Auth\LoginController@showAdminLoginForm');
    Route::post('admin/login', 'Auth\LoginController@adminLogin');
});

