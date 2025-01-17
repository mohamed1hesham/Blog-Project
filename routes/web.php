<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'homepage']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/add_post', [AdminController::class, 'post_page']);
Route::get('/show_post', [AdminController::class, 'show_post']);
Route::post('/add_post', [AdminController::class, 'add_post'])->name('add_post');
Route::get('/delete_post/{data:id}', [AdminController::class, 'delete_post'])->name('delete_post');
Route::get('/edit_post/{id}', [AdminController::class, 'edit_post'])->name('edit_post');
Route::post('/update_post/{data:id}', [AdminController::class, 'update_post'])->name('update_post');
Route::get('/post_details/{id}', [HomeController::class, 'post_details'])->name('post_details');
Route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth')->name('create_post');
Route::post('/user_post', [HomeController::class, 'user_post'])->middleware('auth')->name('user_post');
