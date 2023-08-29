<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Backend Controller
use App\Http\Controllers\backend\{DashboardController,CategoryController,BlogPostController};


// Frontend Controller
use App\Http\Controllers\frontend\{HomeController,SinglePostController,CategoriesController};

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

Route::get('/',[HomeController::class,'index']);

Route::get('/search',[HomeController::class,'blogsearch'])->name('search');
Route::get('/category/{id}',[CategoriesController::class,'blogsearch'])->name('search');
Route::get('/category/{id}',[CategoriesController::class,'index'])->name('category.index');
Route::get('/single/{id}',[SinglePostController::class,'index']);


Route::middleware('auth','verified','prevent-back-history')->group(function() {
// Dashboard Controller
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// CategoryController
Route::get('/category',[CategoryController::class,'index']);
Route::post('/category',[CategoryController::class,'store']);
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::put('/category/update_data/{id}',[CategoryController::class,'update']);
Route::get('/category/delete/{id}',[CategoryController::class,'destroy']);

// BlogPostController
Route::get('/blog_post',[BlogPostController::class,'index']);
Route::post('/blog_post',[BlogPostController::class,'store']);
Route::get('/blog_post/edit/{id}',[BlogPostController::class,'edit']);
Route::put('/blog_post/update_data/{id}',[BlogPostController::class,'update']);
Route::get('/blog_post/delete/{id}',[BlogPostController::class,'destroy']);



});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
?>
