<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SeasonController;
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

Route::get('content/{content}/show-season/{season}', [ContentController::class, 'showSeason'])->name('content.show-season');
Route::get('content/{content}/create-season', [ContentController::class, 'createSeason'])->name('content.create-season');
Route::post('content/{content}/delete-category', [ContentController::class, 'deleteCategory'])->name('content.delete-category');
Route::post('content/{content}/add-category', [ContentController::class, 'addCategory'])->name('content.add-category');
Route::resource('content', ContentController::class);

Route::resource('category', CategoryController::class);

Route::resource('season', SeasonController::class);