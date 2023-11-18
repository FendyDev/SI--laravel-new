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
Route::post('Auth', [Controller::class, 'Auth'])->name('Auth');

//! Route for logout
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

//? Route for Super Admin
Route::middleware(['checkRole:SuperAdmin, web'])->group(function () {
   //Add Admin
   Route::get('/tambahAdmin', [SuperAdminController::class, 'lihat'])->name('lihat');
   Route::get('/tambahAdmin/create', [SuperAdminController::class, 'create'])->name('create');
   Route::post('/tambahAdmin/store', [SuperAdminController::class, 'store'])->name('store');
   Route::get('/editAdmin/{id}', [SuperAdminController::class, 'edit'])->name('edit');
   Route::put('/updateAdmin/{id}', [SuperAdminController::class, 'update'])->name('update');
   Route::delete('/deleteAdmin/{id}', [SuperAdminController::class, 'destroy'])->name('delete');
   //Dashboard
});

//? Route for Admin
Route::middleware(['checkRole:Admin, web'])->group(function () {
   //Add Staf
   Route::get('/tambahStaf', [AdminController::class, 'listStaf'])->name('listStaf');
   Route::post('/tambahStaf/create', [AdminController::class, 'create'])->name('createStaf');
   Route::get('/editStaf/{id}', [AdminController::class, 'editStaf'])->name('editStaf');
   Route::put('/updateStaf/{id}', [AdminController::class, 'updateStaf'])->name('updateStaf');
   Route::delete('/deleteStaf/{id}', [AdminController::class, 'deleteStaf'])->name('deleteStaf');
   //Add Folder
   Route::get('/showFolder', [AdminController::class, 'showFolder'])->name('showFolder');
   Route::post('/createFolder', [AdminController::class, 'createFolder'])->name('createFolder');
   Route::get('/editFolder/{id}', [AdminController::class, 'editFolder'])->name('editFolder');
   Route::put('/updateFolder/{id}', [AdminController::class, 'updateFolder'])->name('updateFolder');
   Route::delete('/deleteFolder/{id}', [AdminController::class, 'deleteFolder'])->name('deleteFolder');
});

//? Route for Staf
Route::middleware(['checkRole:staf, staf'])->group(function () {
   Route::get('dummy', function () {
      return view('layouts.dummy');
   });
});


