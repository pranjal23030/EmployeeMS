<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

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

//    Route::get('/', [AdminController::class,'dashboard']);
Route::get('admin/login',[AdminController::class,'login'])->name('login');
Route::post('admin/login',[AdminController::class,'to_login']);

//Department
Route::get('department/{id}/delete',[DepartmentController::class,'destroy']);
Route::resource('department',DepartmentController::class);

//Employee
    Route::get('employee/{id}/delete',[EmployeeController::class,'destroy']);
    Route::resource('employee',EmployeeController::class);


    Route::group(['middleware'=>'auth'],function (){
//        Route::get('admin',[AdminController::class,'index']);
        Route::get('admin',[AdminController::class,'index']);
        Route::get('admin/logout',[AdminController::class,'logout']);
    });

//    Route::get('admin',[AdminController::class,'index']);
//            Route::get('admin',[AdminController::class,'index']);
//            Route::get('admin/logout',[AdminController::class,'logout']);
