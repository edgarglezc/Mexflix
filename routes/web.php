<?php

use App\Models\Content;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SeasonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('index');
});

Route::get('index', function () {
    return view('index');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('index', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/content/main', function () {
    $contents = Content::all();
    $categories = Category::all();
    return view('content.content-main', compact('contents', 'categories'));
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

Route::get('season/{season}/show-chapter/{chapter}', [SeasonController::class, 'showChapter'])->name('season.show-chapter');
Route::get('season/{season}/create-chapter', [SeasonController::class, 'createChapter'])->name('season.create-chapter');
Route::resource('season', SeasonController::class);

Route::resource('chapter', ChapterController::class);