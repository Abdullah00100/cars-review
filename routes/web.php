<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnginesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CarProductController;
use App\Http\Controllers\HeadquartersController;
use App\Http\Controllers\CarProductionDateController;
use App\Http\Controllers\userController;
use App\Http\Controllers\usersController;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('user');



 Route::middleware(['auth','isAdmin'])->group( function(){
    Route::get('/dashboard', function () {
        return view('admin/index');
     });
     Route::get('dashbord',function(){
        return view('admin/index');
    }
    );
    Route::resource('dashbord/cars',CarsController::class);
    Route::resource('dashbord/models',CarModelController::class);
    Route::resource('dashbord/carproduct',CarProductController::class);
    Route::resource('dashbord/carproductiondate',CarProductionDateController::class);
    Route::resource('dashbord/engines',EnginesController::class);
    Route::resource('dashbord/headquarters',HeadquartersController::class);
    Route::resource('dashbord/products',ProductController::class);
    Route::resource('dashbord/users',usersController::class);
    
    Route::get('dashbord/user/{id}',[userController::class,'showUserPage']);
 });