<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, "Home"]);
Route::get('/categorys/{id}', [HomeController::class, 'categoryDetails'])->name('category.details');
Route::get('/news_details/{id}', [HomeController::class, 'newsDetails'])->name('news.details');
//contact stor
Route::get('/contact', [HomeController::class, 'showForm'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/search', [HomeController::class, 'searchNews'])->name('news.search');






// backend
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::middleware(['auth'])->group(function () {
    Route::get('backend',[BackendController::class, 'Backend']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::resource('category',CategoryController::class);
Route::resource('news', NewsController::class);
//contact stor
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');



