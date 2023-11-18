<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|{{  }}
*/

//? Default Route
Route::get('/', [Controller::class, 'index'])->name('/');

//! Route for Authentication
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('Auth', [AdminController::class, 'Auth'])->name('Auth');

//! Route for logout
Route::get('logout', [AdminController::class, 'logout'])->name('logout');


Route::middleware(['AdminMiddleware:admin'])->group(function () {
   Route::get('/tambahStaf', [AdminController::class, 'listStaf'])->name('listStaf');
   Route::get('/editStaf/{id}', [AdminController::class, 'editStaf'])->name('editStaf');
   Route::post('/updateStaf/{id}', [AdminController::class, 'updateStaf'])->name('updateStaf');
   Route::get('/deleteStaf/{id}', [AdminController::class, 'deleteStaf'])->name('deleteStaf');
   Route::post('/tambahStaf/create', [AdminController::class, 'create'])->name('createStaf');
   Route::post('/createFolder', [AdminController::class, 'createFolder'])->name('createFolder');
   Route::get('/tambahAdmin', [SuperAdminController::class, 'lihat'])->name('lihat');
});


// Route::group(['middleware' => 'SuperAdmin'], function () {
   
//    Route::get('/tambahAdmin/create', [SuperAdminController::class, 'create'])->name('create');
//    Route::post('/tambahAdmin/store', [SuperAdminController::class, 'store'])->name('store');
//    Route::get('/editAdmin/edit', [SuperAdminController::class, 'edit'])->name('edit');
//    Route::put('/editAdmin/update', [SuperAdminController::class, 'update'])->name('update');
//    Route::delete('/deleteAdmin/{id}', [SuperAdminController::class, 'destroy'])->name('delete');
// });

//? Route for Super Admin


//? Route for Admin


//? Route for Staf



//! Route for Dummy
Route::get('dummy', function () {
   return view('layouts.dummy');
});

