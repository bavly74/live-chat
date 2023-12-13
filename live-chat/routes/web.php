<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[\App\Http\Controllers\UserController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/delete_chat',[\App\Http\Controllers\UserController::class,'deleteChat'])->middleware(['auth']);
Route::get('chat/{id}',[\App\Http\Controllers\UserController::class,'chat'])->name('chat');

require __DIR__.'/auth.php';
