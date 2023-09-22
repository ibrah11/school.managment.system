<?php

//use App\Models\ClassSubjectModel;
use App\Http\Controllers\ClassSubjectController;

//use App\Models\ClassSubjectModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',  [DashboardController::class, 'Dashboard']);
Route::post('login', [AuthController::class, 'AuthLogin'])->name('login');
Route::get('login', [AuthController::class, 'Login'])->name('login');
Route::get('logout', [AuthController::class, 'logout']);
//Route::get('forgot-password', [AuthController::class, '']);
//Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('admin/dashboard', [DashboardController::class, 'Dashboard']);

//Route::get('admin/admin/list', function () {
    //return view('admin.admin.list');
//});

route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'Dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete{id}', [AdminController::class, 'delete']);

    //class url
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [classController::class, 'add']);
    Route::post('admin/class/add', [classController::class, 'insert']);
    Route::get('admin/class/edit{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete{id}', [ClassController::class, 'delete']);

    //class subject
    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('admin/subject/edit{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete{id}', [SubjectController::class, 'delete']);

    //class subject assign
    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete{id}', [ClassSubjectController::class, 'delete']);
});

route::group(['middleware' => 'teacher'], function () {

    Route::get('teacher/dashboard', [DashboardController::class, 'Dashboard']);
});

route::group(['middleware' => 'student'], function () {

    Route::get('student/dashboard', [DashboardController::class, 'Dashboard']);
});

route::group(['middleware' => 'parent'], function () {

    Route::get('parent/dashboard', [DashboardController::class, 'Dashboard']);
});
