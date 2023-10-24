<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmpployeeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Fontend\FontendController;

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
Auth::routes();
Route::get('/',[LoginController::class,'showLoginForm'] );

Route::middleware(['auth'])->group(function(){
    Route::get('/user_dashboard', [FontendController::class, 'index'])->name('home');

});
Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'index']);
    Route::get('dashboard/employee',[EmpployeeController::class,'index']);
    Route::post('/add-employee',[EmpployeeController::class,'store']);
    Route::get('dashboard/allemployees',[EmpployeeController::class,'show']);
    Route::get('dashboard/delete/{id}',[EmpployeeController::class,'delete']);

    //Category
    Route::get('/category',[CategoryController::class,'index']);
    Route::post('/add-category',[CategoryController::class,'store']);
    Route::get('/allCategory',[CategoryController::class,'show']);
    Route::get('/category-edit/{id}',[CategoryController::class,'edit']);
    Route::post('category-update/{id}',[CategoryController::class,'update']);
    Route::get('/category-delete/{id}',[CategoryController::class,'delete']);

    //product

});
