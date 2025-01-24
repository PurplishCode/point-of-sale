<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', 'App\Http\Controllers\CategoryController');
Route::resource('brands', 'App\Http\Controllers\BrandController');
