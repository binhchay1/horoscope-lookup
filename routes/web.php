<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\Page\ErrorController;
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
Route::get('/purchase', [HomeController::class, 'viewPurchase'])->name('purchase');
Route::get('/lich-su', [HomeController::class, 'viewHistory'])->name('history');
Route::post('/lookup', [HomeController::class, 'processLookup'])->name('lookup');
Route::post('/chinh-sach-su-dung', [HomeController::class, 'viewPolicy'])->name('policy');
