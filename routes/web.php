<?php

use App\Http\Controllers\AboutCOntroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiztroxController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SejarahController;
use App\Models\SejarahModels;

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


// Route::get('/blog-category', [BiztroxController::class,'category'])->name('blog-category');
// Route::get('/blog-detail', [BiztroxController::class,'detail'])->name('blog-detail');
// Route::get('/blog-contact', [BiztroxController::class,'contact'])->name('blog-contact');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', [AdminDashboardController::class,'index'])->name('home');
    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class,'index'])->name('category.add');
    Route::post('/new-category', [CategoryController::class,'create'])->name('category.new');
    Route::get('/manage-category', [CategoryController::class,'manage'])->name('category.manage');
    Route::get('/edit-category/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::get('/delete-category/{id}', [CategoryController::class,'delete'])->name('category.delete');

    Route::get('/add-blog', [BlogController::class,'index'])->name('blog.add');
    Route::post('/new-blog', [BlogController::class,'create'])->name('blog.new');
    Route::get('/blog-manage', [BlogController::class,'manage'])->name('blog.manage');
    Route::get('/edit-blog/{id}', [BlogController::class,'edit'])->name('blog.edit');
    Route::post('/update-blog/{id}', [BlogController::class,'update'])->name('blog.update');
    Route::get('/dalete-blog/{id}', [BlogController::class,'delete'])->name('blog.delete');

    Route::get('/manage-sejarah', [SejarahController::class,'manage'])->name('sejarah.manage');
    Route::get('/edit-sejarah/{id}', [SejarahController::class,'edit'])->name('sejarah.edit');
    Route::post('/update-sejarah/{id}', [SejarahController::class,'update'])->name('sejarah.update');

    Route::get('/manage-about', [AboutCOntroller::class,'manage'])->name('about.manage');
    Route::get('/edit-about/{id}', [AboutCOntroller::class,'edit'])->name('about.edit');
    Route::post('/update-about/{id}', [AboutCOntroller::class,'update'])->name('about.update');
});
