<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\MainController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\MainBookController;

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
    Route::prefix('admin')->group(function () {
        /* AUTHOR CONTROLLER ROUTES. */
        Route::controller(AuthorController::class)->group(function () {
            Route::get('author', 'index')->name('author.all');
            Route::get('author/create', 'create')->name('author.create');
            Route::post('author/store', 'store')->name('author.store');
            Route::get('author/{id}/edit', 'edit')->name('author.edit');
            Route::put('author/update/{id}', 'update')->name('author.update');
            Route::get('author/delete/{id}', 'destroy')->name('author.destroy');
            Route::get('author/{id}/status', 'status')->name('author.status');

            Route::get('author/active_all_status', 'active_all_status')->name('author.active.all.status');
            Route::get('author/deactive_all_status', 'deactive_all_status')->name('author.deactive.all.status');
            Route::get('author/delete_all', 'delete_all')->name('author.delete.all');

		
        });

        /* CATEGORY CONTROLLER ROUTES. */
        Route::controller(CategoryController::class)->group(function () {
            Route::get('category', 'index')->name('category.all');
            Route::get('category/create', 'create')->name('category.create');
            Route::post('category/store', 'store')->name('category.store');
            Route::get('category/{id}/edit', 'edit')->name('category.edit');
            Route::put('category/update/{id}', 'update')->name('category.update');
            Route::get('category/delete/{id}', 'destroy')->name('category.destroy');
            Route::get('category/{id}/status', 'status')->name('category.status');
        });
    
        /* BOOK CONTROLLER ROUTES. */
        Route::controller(BookController::class)->group(function () {
            Route::get('book', 'index')->name('book.all');
            Route::get('book/create', 'create')->name('book.create');
            Route::post('book/store', 'store')->name('book.store');
            Route::get('book/{id}/edit', 'edit')->name('book.edit');
            Route::put('book/update/{id}', 'update')->name('book.update');
            Route::get('book/delete/{id}', 'destroy')->name('book.destroy');
            Route::get('book/{id}/status', 'status')->name('book.status');
        });

        /* Media CONTROLLER ROUTES. */
        Route::controller(MediaController::class)->group(function () {
            Route::get('media',  'index')->name('media.all');
            Route::get('media/create',  'create')->name('media.create');
            Route::post('media/store',  'store')->name('media.store');
            Route::get('media/{id}/edit',  'edit')->name('media.edit');
            Route::put('media/update/{id}',  'update')->name('media.update');
            Route::get('media/delete/{id}',  'destroy')->name('media.destroy');
            Route::get('media/{id}/status', 'status')->name('media.status');
        });
        /* Media CONTROLLER ROUTES. */
        Route::controller(TeamController::class)->group(function () {
            Route::get('team',  'index')->name('team.all');
            Route::get('team/create',  'create')->name('team.create');
            Route::post('team/store',  'store')->name('team.store');
            Route::get('team/{id}/edit',  'edit')->name('team.edit');
            Route::put('team/update/{id}',  'update')->name('team.update');
            Route::get('team/delete/{id}',  'destroy')->name('team.destroy');
            Route::get('team/{id}/status', 'status')->name('team.status');
        });
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/admin/profile', [HomeController::class, 'profile'])->name('profile');
        Route::post('/admin/profile/update', [HomeController::class, 'profile_update'])->name('profile_update');
        Route::post('/admin/change_password', [HomeController::class, 'change_password'])->name('change_password');
        
         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
         Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
         Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';

    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');
    Route::get('/author', [MainController::class, 'author'])->name('author');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::get('/', [MainController::class, 'index'])->name('home');

    Route::get('/category/{slug}', [MainCategoryController::class, 'category_detail'])->name('category.detail');
    Route::get('/book/{slug}', [MainBookController::class, 'book_detail'])->name('book.detail');