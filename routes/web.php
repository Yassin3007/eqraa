<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Finance\FinanceController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFinanceController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminTeacherRatingController;
use App\Http\Controllers\Admin\SupervisorController;
use App\Http\Controllers\Supervisor\TeacherRatingController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Supervisor\SupervisorDashboardController;

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

################### login routes ####################


Route::get('/', function () {
    return view('auth.selection');
})->name('selection');

Route::get('login/{type}',[AuthController::class,'loginType'])->name('loginType');
Route::post('postLogin',[AuthController::class,'postLogin'])->name('postLogin');

Route::get('logout/{type}',[AuthController::class,'logout'])->name('logout');


###################end login routes ####################


################# admin routes #########################
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){

    Route::controller(AdminDashboardController::class)->group(function(){

        Route::get('/','index')->name('admin_index');
        Route::get('students','getStudents')->name('admin_students');
        Route::get('teachers','getTeachers')->name('admin_teachers');
    
    });

    Route::resource('student',AdminStudentController::class);
    Route::resource('teacher',AdminTeacherController::class);
    Route::resource('supervisor',SupervisorController::class);
    Route::resource('reward',AdminFinanceController::class);
    Route::resource('teachers_rating',AdminTeacherRatingController::class);
    Route::get('reward_delete/{id}', [AdminFinanceController::class,'destroy'])->name('reward_delete');
    Route::get('admin_block_student/{id}', [AdminStudentController::class,'block_student'])->name('admin_block_student');
    Route::get('admin_active_student/{id}', [AdminStudentController::class,'active_student'])->name('admin_active_student');


    Route::get('admin_block_teacher/{id}', [AdminTeacherController::class,'block_teacher'])->name('admin_block_teacher');
    Route::get('admin_active_teacher/{id}', [AdminTeacherController::class,'active_teacher'])->name('admin_active_teacher');

});


################# admin routes #########################

#################### supervisor routes #####################
Route::group(['prefix'=>'supervisor','middleware'=>'auth:supervisor'],function(){


Route::controller(SupervisorDashboardController::class)->group(function(){

    Route::get('/','index')->name('supervisor_index');
    Route::get('/supervisor_students','getStudents')->name('supervisor_students');
    Route::get('/supervisor_teachers','getTeachers')->name('supervisor_teachers');

});
Route::resource('teacher_rating',TeacherRatingController::class);
Route::resource('students',StudentController::class);
Route::resource('teachers',TeacherController::class);
Route::resource('rewards',FinanceController::class);
Route::get('rewards_delete/{id}', [FinanceController::class,'destroy'])->name('rewards_delete');
Route::get('block_student/{id}', [StudentController::class,'block_student'])->name('block_student');
Route::get('active_student/{id}', [StudentController::class,'active_student'])->name('active_student');


Route::get('block_teacher/{id}', [TeacherController::class,'block_teacher'])->name('block_teacher');
Route::get('active_teacher/{id}', [TeacherController::class,'active_teacher'])->name('active_teacher');
});


#################### supervisor routes #####################



Route::group(['prefix'=>'teacher','middleware'=>'auth:teacher'],function(){


    Route::controller(TeacherDashboardController::class)->group(function(){

        Route::get('/','index')->name('teacher_index');
        Route::get('/table','table')->name('teacher_table');
        Route::get('/students','students')->name('teacher_students');
        Route::get('/teacher_rewards','teacher_rewards')->name('teacher_rewards');
    
    });
    
    Route::post('add_student_notes/{id}',[StudentController::class,'add_student_notes'])->name('add_student_notes');
    


});





//Auth::routes();









