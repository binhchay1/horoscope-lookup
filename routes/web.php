<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Page\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/401', [ErrorController::class, 'view401'])->name('error.401');
Route::get('/402', [ErrorController::class, 'view402'])->name('error.402');
Route::get('/403', [ErrorController::class, 'view403'])->name('error.403');
Route::get('/404', [ErrorController::class, 'view404'])->name('error.404');
Route::get('/419', [ErrorController::class, 'view419'])->name('error.419');
Route::get('/429', [ErrorController::class, 'view429'])->name('error.429');
Route::get('/500', [ErrorController::class, 'view500'])->name('error.500');
Route::get('/503', [ErrorController::class, 'view503'])->name('error.503');
Route::get('/', [HomeController::class, 'viewHome'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'viewDashBoard'])->name('admin.dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/list', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/add', [UserController::class, 'createUser'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'storeUser'])->name('admin.user.store');
        Route::get('/update/{user}', [UserController::class, 'editUser'])->name('admin.user.edit');
        Route::post('/update/{user}', [UserController::class, 'updateUser'])->name('admin.user.update');
        Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('admin.user.delete');
        Route::get('/lock-user/{id}', [UserController::class, 'lockUser'])->name('admin.user.lockUser');
        Route::get('/export-user', [UserController::class, 'exportUser'])->name('admin.user.export');

    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/update/{id}', [ProfileController::class, 'editProfile'])->name('admin.profile.edit');
        Route::post('/update/{id}', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
    });
});
