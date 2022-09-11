<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users',[UserController::class,'index'])->name('users');
Route::prefix('user')->name('user.')->group(function(){
    Route::get('create',[UserController::class,'create'])->name('create');
    Route::post('store',[UserController::class,'store'])->name('store');  

    Route::get('edit/{id}',[UserController::class,'edit'])->name('edit');
    Route::put('update/{id}',[UserController::class,'update'])->name('update');

    Route::delete('delete',[UserController::class,'delete'])->name('delete');
});

require __DIR__.'/auth.php';
