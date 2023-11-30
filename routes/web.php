<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Models\Profile;

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
Route::redirect('home', 'login');
Route::redirect('/', 'login');

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
   Route::put('/staff-account/{id}', [AdminController::class, 'updateStaf'])->name('updateStaf');
   Route::delete('/staff-accounts/{id}', [AdminController::class, 'deleteStaf'])->name('deleteStaf');
   //Add Folder
   Route::get('/folders/{id}', [AdminController::class, 'editFolder'])->name('editFolder');
   Route::put('/folders/{id}', [AdminController::class, 'updateFolder'])->name('updateFolder');
   Route::delete('/folders/{id}', [AdminController::class, 'deleteFolder'])->name('deleteFolder');
   
   Route::post('createFolder', [AdminController::class, 'createFolder'])->name('createFolder');
   Route::post('addFile', [Controller::class, 'addFile'])->name('addFile');
   Route::delete('deleteFile/{id}', [Controller::class, 'deleteFile'])->name('deleteFile');

   Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
   Route::put('/profile{id}', [ProfileController::class, 'update'])->name('profile.update');
   Route::put('/profile', [ProfileController::class, 'hapus'])->name('hapus');
});

//? Route for Super Admin
Route::middleware(['checkRole:SuperAdmin, web'])->group(function () {
   //Add Admin
   Route::get('/admin-account', [SuperAdminController::class, 'lihat'])->name('lihat');
   Route::post('/admin-account', [SuperAdminController::class, 'store'])->name('store');
   Route::put('/admin-account/{id}', [SuperAdminController::class, 'update'])->name('update');
   Route::delete('/admin-account/{id}', [SuperAdminController::class, 'destroy'])->name('delete');
   
   Route::get('folders{role}', [SuperAdminController::class, 'folders'])->name('folders');
   Route::get('open{id}&{role}', [SuperAdminController::class, 'open'])->name('open');
   Route::post('/folders', [SuperAdminController::class, 'createFolder'])->name('foldersS');
});

//? Route for Admin
Route::middleware(['checkRole:Admin, web'])->group(function () {
   //View Folder and Add File
   Route::get('folder', [AdminController::class, 'showFolder'])->name('folder');
   Route::get('inFolder{id}', [AdminController::class, 'inFolder'])->name('inFolder');
});

//? Route for Staf
Route::middleware(['checkRole:Staff, staf'])->group(function () {
   // Route::get('dummy', function () {
   //    return view('layouts.dummy');
   // });

   Route::get('/folders', [AdminController::class, 'lihatFolder'])->name('server');
   Route::get('/insideFolder{id}', [AdminController::class, 'inFolderS'])->name('insideFolder');
   Route::post('/files', [Controller::class, 'addFileS'])->name('addFileS');
   Route::delete('/files/{id}', [Controller::class, 'deleteFileS'])->name('deleteFileS');
  
});