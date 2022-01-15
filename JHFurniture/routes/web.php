<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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
    return view('auth.login');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('profile');
    Route::get('/update_profile', [ProfileController::class, 'update_profile'])->name('profile.update_profile');
    Route::patch('/update_profile', [ProfileController::class, 'updating_profile'])->name('profile.update_profile');
});


Route::get('/furniture/all', [FurnitureController::class, 'AllFurniture'])->name('all.furniture');
Route::get('/furniture/viewAdd', [FurnitureController::class, 'ViewAddFurniture'])->name('viewAdd.furniture');
Route::get('/furniture/home', [FurnitureController::class, 'home']);
Route::get('/search',[FurnitureController::class, 'search']);
Route::post('/furniture/add', [FurnitureController::class, 'AddFurniture'])->name('store.furniture');
Route::get('/furniture/edit/{id}', [FurnitureController::class, 'Edit']);
Route::post('/furniture/update/{id}', [FurnitureController::class, 'Update']);
Route::get('/furniture/delete/{id}', [FurnitureController::class, 'Delete']);
Route::get('/furniture/detail/{id}', [FurnitureController::class, 'Detail']);

// Cart
//Route::view('/mycart', 'user.cart');
Route::get('/mycart', [\App\Http\Controllers\CartController::class, 'cartPage'])->name('all.cart');
Route::get('/addCart/{id}', [\App\Http\Controllers\CartController::class, 'addCart']);
Route::get('/addToCart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('/minusToCart/{id}', [\App\Http\Controllers\CartController::class, 'minusToCart']);

Route::get('/removeCart/{id}', [\App\Http\Controllers\CartController::class, 'remove']);
Route::get('/increaseQty/{id}', [\App\Http\Controllers\CartController::class, 'increment']);
Route::get('/decreaseQty/{id}', [\App\Http\Controllers\CartController::class, 'decreaseQuantity']);