<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/blog/create', [BlogPostController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}/upload', [BlogPostController::class, 'upload'])->name('blog.upload');
Route::post('/blog/{id}/upload', [BlogPostController::class, 'saveUpload'])->name('blog.saveUpload');
Route::get('/user/upload/{id}', [BlogPostController::class, 'upload'])->name('user.upload');
Route::get('/home', [BlogPostController::class, 'showAll'])->name('home');

Route::get('/blog/success/{url}', [BlogPostController::class, 'success'])->name('blog.success');

Route::get('/user/view/{identifier}', [BlogPostController::class, 'view'])->name('user.view');
Route::get('/user/view/{identifier}/edit', [BlogPostController::class, 'edit'])->name('user.edit');
// routes/web.php
Route::put('/user/view/{identifier}', 'BlogPostController@update')->name('user.update');

// Route::get('/blog/{id}', [BlogPostController::class, 'viewById'])->name('view.by.id');

Route::get('/blog/success/{url}', [BlogPostController::class, 'success'])->name('user.success');







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->middleware('auth')->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Route::get('/dashboard', Admin\DashboardController::class 'index');

});

Route::middleware('checkUserId')->group(function(){

    Route::resource('/users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('category', CategoryController::class);
//     Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
//     Route::resource('cat', CatController::class);
//     Route::get('/blogs/show', [BlogController::class, 'show'])->name('post.show');
//     Route::get('/blogs', [BlogController::class, 'index'])->name('post.index');


//     Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
// Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
// Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
// Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
// Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
// Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
// Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

// Route::any('/category', [CategoryController::class, 'createCategory'])->name('createCategory');

});






require __DIR__.'/auth.php';
