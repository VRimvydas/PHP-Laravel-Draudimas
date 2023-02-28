<?php

use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/owners',[OwnerController::class,'owners'])->name("owners.list");
Route::get('/owners/create',[OwnerController::class,'create'])->name("owners.create");
Route::post('/owners/store',[OwnerController::class,'store'])->name("owners.store");
Route::get('/owners/{id}/update',[OwnerController::class,'update'])->name("owners.update");
Route::post('/owners/{id}/save', [OwnerController::class, 'save'])->name("owners.save");
Route::get('/owners/{id}/destroy',[OwnerController::class, 'delete'])->name("owners.delete");

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
