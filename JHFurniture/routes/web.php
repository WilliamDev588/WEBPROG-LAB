<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/furniture/all', [FurnitureController::class, 'AllFurniture'])->name('all.furniture');
Route::post('/furniture/add', [FurnitureController::class, 'AddFurniture'])->name('store.furniture');
Route::get('/furniture/edit/{id}', [FurnitureController::class, 'Edit']);
Route::post('/furniture/update/{id}', [FurnitureController::class, 'Update']);
Route::get('/furniture/delete/{id}', [FurnitureController::class, 'Delete']);
