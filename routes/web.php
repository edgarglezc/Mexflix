<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

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

Route::get('index', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('programa/{content}/delete-category', [ContentController::class, 'deleteCategory'])->name('content.delete-category');
Route::post('programa/{content}/add-category', [ContentController::class, 'addCategory'])->name('content.add-category');
Route::resource('content', ContentController::class);

Route::resource('category', CategoryController::class);