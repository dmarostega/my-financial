<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FinancialEntityController;

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
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users',[UserController::class,'index'])->name('users');
Route::prefix('user')->name('user.')->group(function(){
    Route::get('create',[UserController::class,'create'])->name('create');
    Route::post('store',[UserController::class,'store'])->name('store');  

    Route::get('edit/{id}',[UserController::class,'edit'])->name('edit');
    Route::put('update/{id}',[UserController::class,'update'])->name('update');

    Route::get('delete/{id}',[UserController::class,'delete'])->name('delete');
    Route::delete('destroy/{id}',[UserController::class,'destroy'])->name('destroy');
});

Route::get('/categories',[CategoryController::class,'index'])->name('categories');
Route::prefix('category')->name('category.')->group(function(){
    Route::get('create',[CategoryController::class,'create'])->name('create');
    Route::post('store',[CategoryController::class,'store'])->name('store');

    Route::get('{id}',[CategoryController::class,'edit'])->name('edit');
    Route::put('{id}',[CategoryController::class,'update'])->name('update');

    Route::get('{id}/delete',[CategoryController::class,'delete'])->name('delete');
    Route::delete('{id}',[CategoryController::class,'destroy'])->name('destroy');
});

Route::get('/financial-entities', [FinancialEntityController::class,'index'])->name('financial_entities');
Route::prefix('/financial-entity')->name('financial_entity.')->group(function(){
    Route::get('create',[FinancialEntityController::class,'create'])->name('create');
    Route::post('store',[FinancialEntityController::class,'store'])->name('store');

    Route::get('{id}',[FInancialEntityController::class,'edit'])->name('edit');
    Route::put('{id}',[FinancialEntityController::class,'update'])->name('update');

    Route::get('{id}/delete',[FinancialEntityController::class,'delete'])->name('delete');
    Route::delete('{id}', [FinancialEntityController::class,'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
