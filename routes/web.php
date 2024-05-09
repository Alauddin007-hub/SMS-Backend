<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('signup', function (){
//     return view('dashboard.register');
// });
// Route::get('signin', function (){
//     return view('dashboard.login');
// });

            // ================= Multi Dashboard =================

// Super Admin super-admin
// Route::get('superadmin/dashboard',[DashboardController::class, 'superadmin'])->middleware(['auth', 'verified','super-admin'])->name('superadmin.dashboard');

Route::group(['middleware' => 'super-admin'], function () {

    // Super Admin super-admin
    Route::get('superadmin/dashboard',[DashboardController::class, 'superadmin'])->name('superadmin.dashboard');

    // Writer
    Route::get('writer',[WriterController::class, 'index'])->name('writers');
    Route::get('writer/create',[WriterController::class, 'create'])->name('writer.create');
    Route::post('book/store',[WriterController::class, 'store'])->name('writer.store');
    Route::get('book/edit/{id}',[WriterController::class, 'edit'])->name('writer.edit');
    Route::post('book/update/{id}',[WriterController::class, 'update'])->name('writer.update');
    Route::get('book/delete/{id}',[WriterController::class, 'destroy'])->name('writer.delete');

    // category
    Route::get('category',[CategoryController::class, 'index'])->name('categories');
    Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');

    // Books
    // Route::get('books',[BookController::class, 'index'])->name('books');
    // Route::get('book/create',[BookController::class, 'create'])->name('book.create');
    // Route::post('book/store',[BookController::class, 'store'])->name('book.store');
    // Route::get('book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
    // Route::post('book/update/{id}',[BookController::class, 'update'])->name('book.update');
    // Route::get('book/delete/{id}',[BookController::class, 'destroy'])->name('book.delete');
    });

Route::group(['middleware' => 'admin'], function () {

    // Admin
    Route::get('admin/dashboard',[DashboardController::class, 'admin'])->name('admin.dashboard');

    // Writer
    Route::get('writer',[WriterController::class, 'index'])->name('writers');
    Route::get('writer/create',[WriterController::class, 'create'])->name('writer.create');
    Route::post('writer/store',[WriterController::class, 'store'])->name('writer.store');
    Route::get('writer/edit/{id}',[WriterController::class, 'edit'])->name('writer.edit');
    Route::post('writer/update/{id}',[WriterController::class, 'update'])->name('writer.update');
    Route::get('writer/delete/{id}',[WriterController::class, 'destroy'])->name('writer.delete');

    // category
    Route::get('category',[CategoryController::class, 'index'])->name('category');
    Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');

    // Books
    // Route::get('books',[BookController::class, 'index'])->name('books');
    // Route::get('book/create',[BookController::class, 'create'])->name('book.create');
    // Route::post('book/store',[BookController::class, 'store'])->name('book.store');
    // Route::get('book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
    // Route::post('book/update/{id}',[BookController::class, 'update'])->name('book.update');
    // Route::get('book/delete/{id}',[BookController::class, 'destroy'])->name('book.delete');

    });

Route::group(['middleware' => 'user'], function () {
    
    // Normal User
    Route::get('user/dashboard',[DashboardController::class, 'user'])->name('user.dashboard');

    // Writer
    Route::get('writer',[WriterController::class, 'index'])->name('writers');
    Route::get('writer/create',[WriterController::class, 'create'])->name('writer.create');
    Route::post('book/store',[WriterController::class, 'store'])->name('writer.store');
    Route::get('book/edit/{id}',[WriterController::class, 'edit'])->name('writer.edit');
    Route::post('book/update/{id}',[WriterController::class, 'update'])->name('writer.update');
    Route::get('book/delete/{id}',[WriterController::class, 'destroy'])->name('writer.delete');

    // category
    Route::get('category',[CategoryController::class, 'index'])->name('categories');
    Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');

    // Books
    // Route::get('books',[BookController::class, 'index'])->name('books');
    // Route::get('book/create',[BookController::class, 'create'])->name('book.create');
    // Route::post('book/store',[BookController::class, 'store'])->name('book.store');
    // Route::get('book/edit/{id}',[BookController::class, 'edit'])->name('book.edit');
    // Route::post('book/update/{id}',[BookController::class, 'update'])->name('book.update');
    // Route::get('book/delete/{id}',[BookController::class, 'destroy'])->name('book.delete');

    });



require __DIR__.'/auth.php';
