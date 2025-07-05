<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoReactionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WatchHistoryController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/upload', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/upload', [VideoController::class, 'store'])->name('videos.store');
});

Route::get('/', [VideoController::class, 'index'])->name('videos.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/history', [WatchHistoryController::class, 'index'])->name('watch.history');
});
Route::get('/history', [WatchHistoryController::class, 'index'])->name('history.index');

Route::post('/videos/{video}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::get('/home', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/{slug}', [VideoController::class, 'show'])->name('videos.show');

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/videos/{video}/like', [VideoReactionController::class, 'like'])->name('videos.like');
    Route::post('/videos/{video}/dislike', [VideoReactionController::class, 'dislike'])->name('videos.dislike');
});

Route::view('/hall-of-fame', 'hall-of-fame')->name('hall.of.fame');

    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
});


require __DIR__.'/auth.php';
