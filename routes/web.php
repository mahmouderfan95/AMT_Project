<?php

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
    return redirect(route('login'));
});

Auth::routes();

Route::group(['middleware' => 'auth:web'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//staff list route
    Route::get('staff-list',[\App\Http\Controllers\Website\WebsiteController::class,'staffList'])->name('staff_list');
// student list
    Route::get('student-list',[\App\Http\Controllers\Website\WebsiteController::class,'studentList'])->name('student_list');
// course list
    Route::get('course-list',[\App\Http\Controllers\Website\WebsiteController::class,'courseList'])->name('course_list');
// report list
    Route::get('reports',[\App\Http\Controllers\Website\WebsiteController::class,'report'])->name('report');
// add staff route
    Route::post('add/staff',[\App\Http\Controllers\Website\WebsiteController::class,'addStaff'])->name('addStaff');
// add student route
    Route::post('add/student',[\App\Http\Controllers\Website\WebsiteController::class,'addStudent'])->name('addStudent');
// mange attendance route
    Route::get('mange-attendance',[\App\Http\Controllers\Website\WebsiteController::class,'mangeAttendance'])->name('mangeAttendance');
    // store course
    Route::post('add/course',[\App\Http\Controllers\Website\WebsiteController::class,'addCourse'])->name('addCourse');
    // get staffs route
    Route::get('get/staffs',[\App\Http\Controllers\Website\WebsiteController::class,'getStaffs'])->name('getStaffs');
    // delete user
    Route::get('delete/user/{id}',[\App\Http\Controllers\Website\WebsiteController::class,'deleteUser'])->name('delete_user');
    // search by staff_id
    Route::get('user/search/id',[\App\Http\Controllers\Website\WebsiteController::class,'searchUser'])->name('search.user');
    // att student
    Route::get('attend/student/{student_id}/{course_id}/{att}',[\App\Http\Controllers\Website\WebsiteController::class,'attendSt'])->name('attendSt');
});
