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
Route::get('/dashboard', [Controller::class, 'index'])->name('/');
Route::redirect('home','login');
Route::redirect('/','login');

//! Route for Authentication
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('Auth', [Controller::class, 'Auth'])->name('Auth');;

//! Route for logout
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');


//? Route for Super Admin and Admin
Route::middleware('web')->group(function () {
   //Add Staff
   Route::get('/staff-account', [AdminController::class, 'listStaf'])->name('listStaf');
   Route::post('/staff-account', [AdminController::class, 'create'])->name('createStaf');
   Route::get('/staff-account/{id}', [AdminController::class, 'editStaf'])->name('editStaf');
   Route::put('/staff-account/{id}', [AdminController::class, 'updateStaf'])->name('updateStaf');
   Route::delete('/staff-accounts/{id}', [AdminController::class, 'deleteStaf'])->name('deleteStaf');
   //Add Folder
   Route::post('/folders', [AdminController::class, 'createFolder'])->name('createFolder');
   Route::get('/folders/{id}', [AdminController::class, 'editFolder'])->name('editFolder');
   Route::put('/folders/{id}', [AdminController::class, 'updateFolder'])->name('updateFolder');
   Route::delete('/folders/{id}', [AdminController::class, 'deleteFolder'])->name('deleteFolder');
});

//? Route for Super Admin
Route::middleware(['checkRole:SuperAdmin, web'])->group(function () {
   //Add Admin
   Route::get('/admin-account', [SuperAdminController::class, 'lihat'])->name('lihat');
   Route::post('/admin-account', [SuperAdminController::class, 'store'])->name('store');
   Route::get('/admin-account/{id}', [SuperAdminController::class, 'edit'])->name('edit');
   Route::put('/admin-account/{id}', [SuperAdminController::class, 'update'])->name('update');
   Route::delete('/admin-account/{id}', [SuperAdminController::class, 'destroy'])->name('delete');
   
});

//? Route for Admin
Route::middleware(['checkRole:Admin, web'])->group(function (){
   //View Folder and Add File
   Route::get('/folders', [AdminController::class, 'showFolder'])->name('folder');
   Route::get('/folders{id}', [AdminController::class, 'inFolder'])->name('inFolder');
   Route::post('/files', [Controller::class, 'addFile'])->name('addFile');
   Route::delete('/files/{id}', [Controller::class, 'deleteFile'])->name('deleteFile');
});

//? Route for Staf
Route::middleware(['checkRole:Staff, staf'])->group(function () {
   // Route::get('dummy', function () {
   //    return view('layouts.dummy');
   // });
   // Route::get('/folders', [Controller::class, 'showFolder'])->name('server');
   // Route::get('server{id}', [Controller::class, 'inFolder'])->name('inFolder');
   // Route::get('server', [Controller::class, 'showFolder'])->name('server');
   // Route::get('server{id}', [Controller::class, 'inFolder'])->name('inFolder');
   // Route::post('/files', [Controller::class, 'addFile'])->name('addFile');
   // Route::delete('/files/{id}', [Controller::class, 'deleteFile'])->name('deleteFile');
});