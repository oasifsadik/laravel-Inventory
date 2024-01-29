<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmpployeeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductRequestController;
use App\Http\Controllers\admin\RepairRequest;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Fontend\FontendController;
use App\Http\Controllers\Fontend\RepaireController;
use App\Http\Controllers\Fontend\RequestController;
use App\Http\Controllers\WishlistController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[LoginController::class,'showLoginForm'] );

Route::middleware(['auth'])->group(function(){
    Route::get('/user_dashboard', [FontendController::class, 'index']);
    Route::get('/user_profile/{id}', [FontendController::class, 'profile'])->name('profile');
    Route::post('/change-password', [FontendController::class, 'changePassword'])->name('change.password.post');
    Route::get('/all-pro',[FontendController::class,'product']);
    Route::get('/profile_edit/{id}',[FontendController::class,'profileEdit']);
    Route::post('/profile_update/{id}',[FontendController::class,'profileUpdate']);

    //product Request sent
    Route::post('product/request/{id}',[RequestController::class,'storeRequest']);
    Route::get('/user/requests',[RequestController::class,'userRequests']);
    Route::get('/user/delever-product',[RequestController::class,'delevery']);
    Route::get('/user/requests-reject',[RequestController::class,'reject']);
    Route::post('/user/product-return/{id}',[RequestController::class,'return']);

    #wishlist
    Route::get('/wishlist',[WishlistController::class,'index']);
    Route::get('/add-wishlist',[WishlistController::class,'add']);
    Route::post('/store-wishlist',[WishlistController::class,'store']);
    Route::get('delete-wishlist/{id}',[WishlistController::class,'delete']);

    //Repair
    Route::controller(RepaireController::class)->group(function () {
        Route::get('/repair', 'index');
        Route::post('/repair-save', 'store')->name('repair.store');
        Route::get('/repair-all', 'show')->name('repair.show');
        Route::get('/repair-delete/{id}', 'delete')->name('repair.delete');
    });

});



Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'index']);
    //employees
    Route::get('dashboard/employee',[EmpployeeController::class,'index']);
    Route::post('/add-employee',[EmpployeeController::class,'store']);
    Route::get('dashboard/allemployees',[EmpployeeController::class,'show']);
    Route::get('dashboard/edit/{id}',[EmpployeeController::class,'edit']);
    Route::get('dashboard/delete/{id}',[EmpployeeController::class,'delete']);
    Route::get('dashboard/employees-approved/{id}',[EmpployeeController::class,'approved']);
    Route::get('dashboard/employees-reject/{id}',[EmpployeeController::class,'reject']);

    //Branch
    Route::get('/branch',[BranchController::class,'index']);
    Route::post('/branch-save',[BranchController::class,'store']);
    Route::get('/all-branch',[BranchController::class,'show']);
    Route::get('/edit-branch/{id}',[BranchController::class,'edit']);
    Route::post('/branch-update/{id}',[BranchController::class,'update']);
    Route::get('/branch-delete/{id}',[BranchController::class,'delete']);
    //Category
    Route::get('/category',[CategoryController::class,'index']);
    Route::post('/add-category',[CategoryController::class,'store']);
    Route::get('/allCategory',[CategoryController::class,'show']);
    Route::get('/category-edit/{id}',[CategoryController::class,'edit']);
    Route::post('category-update/{id}',[CategoryController::class,'update']);
    Route::get('/category-delete/{id}',[CategoryController::class,'delete']);

    //product
    Route::get('dashboard/product',[ProductController::class,'index']);
    Route::post('dashboard/product-save',[ProductController::class,'store']);
    Route::get('All-product',[ProductController::class,'show']);
    Route::get('product-edit/{id}',[ProductController::class,'edit']);
    Route::post('product-update/{id}',[ProductController::class,'update']);
    Route::get('product-delete/{id}',[ProductController::class,'delete']);
    Route::get('single-product/{id}',[ProductController::class,'single']);
    Route::post('/product/{product_id}/add-stock', [ProductController::class,'addStock'])->name('add.stock');
    Route::delete('/product/{product_id}/stock/{stock_id}', [ProductController::class,'deleteStock'])->name('delete.stock');
    Route::get('/product/{product_id}/stock/{stock_id}/edit', [ProductController::class,'showUpdateStockForm'])->name('show.update.stock.form');
    Route::put('/product/{product_id}/stock/{stock_id}', [ProductController::class,'updateStock'])->name('update.stock');







    //Request Product
    Route::get('/request/product',[ProductRequestController::class,'index']);

    //Accept
    Route::get('complate/order/{id}',[ProductRequestController::class,'complate']);
    Route::post('complate/reject/{id}',[ProductRequestController::class,'reject']);

    //order
    Route::get('/compate/order',[OrderController::class,'index']);
    Route::get('/compate/reject',[OrderController::class,'reject']);
    Route::get('/return-product',[OrderController::class,'returnProduct']);

    //report
    Route::get('generate-report',[OrderController::class,'report']);
    Route::get('wishlist-pro',[OrderController::class,'wishlist']);

    Route::post('wishlist-store/{wishlistItemId}',[OrderController::class,'wishlistStore']);

    //adminRepair
    // Route::controller(RepairRequest::class)->group(function () {
    //     Route::get('/admin-repair', 'requestRepairProduct');
    //     Route::post('/repairs/{id}/update-status', 'updateStatus')->name('repair.updateStatus');
    // });
    Route::get('/admin-repair',[RepairRequest::class,'requestRepairProduct']);
    Route::post('/repairs/{id}/update-status', [RepairRequest::class,'updateStatus'])->name('repair.updateStatus');
    Route::get('/repairs/filter/{status}', [RepairRequest::class, 'filterByStatus'])->name('repair.filterByStatus');

});
