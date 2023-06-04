<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use \App\Http\Controllers\Admin\StudentController;
use \App\Http\Controllers\Admin\DoctorController;
use \App\Http\Controllers\Admin\CourseController;
use \App\Http\Controllers\Admin\AssistantController;
// login route admin

Route::group(['as' => 'admin.','prefix' => 'admin'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout/', [AuthController::class, 'logout'])->name('logout');
});
Route::group(['prefix' => 'admin','middleware' => 'auth:admin'],function(){
   Route::get('/',[AuthController::class,'dashboard'])->name('admin.dashboard');
    // students route
    Route::resource('students',StudentController::class)->except('show');
    Route::get('students/data',[StudentController::class,'getData'])->name('students.data');
    // doctors route
    Route::resource('doctors',DoctorController::class)->except('show');
    Route::get('doctors/data',[DoctorController::class,'getData'])->name('doctors.data');
    // assistant route
    Route::resource('assistants',AssistantController::class)->except('show');
    Route::get('assistants/data',[AssistantController::class,'getData'])->name('assistants.data');
    // courses route
    Route::resource('courses',CourseController::class)->except('show');
    Route::get('courses/data',[CourseController::class,'getData'])->name('courses.data');
});


?>
