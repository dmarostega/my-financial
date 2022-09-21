<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\FinancialAccountController;
use App\Http\Controllers\FinancialEntityController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\UserController;
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
    return view('index');
})/*->middleware(['guest'])*/->name('index');

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

Route::get('/payment-types',[PaymentTypeController::class,'index'])->name('payment_types');
Route::prefix('/payment-type')->name('payment_type.')->group(function(){
    Route::get('create',[PaymentTypeController::class,'create'])->name('create');
    Route::post('store',[PaymentTypeController::class,'store'])->name('store');
    
    Route::get('{id}',[PaymentTypeController::class,'edit'])->name('edit');
    Route::put('{id}',[PaymentTypeController::class,'update'])->name('update');

    Route::get('{id}/delete',[PaymentTypeController::class,'delete'])->name('delete');
    Route::delete('{id}',[PaymentTypeController::class,'destroy'])->name('destroy');
});

Route::get('/contracts',[ContractController::class,'index'])->name('contracts');
Route::prefix('contract')->name('contract.')->group(function(){
    Route::get('create',[ContractController::class,'create'])->name('create');
    Route::post('store',[ContractController::class,"store"])->name('store');

    Route::get('{id}',[ContractController::class,'edit'])->name('edit');
    Route::put('{id}',[ContractController::class,'update'])->name('update');

    Route::get('{id}/delete',[ContractController::class,'delete'])->name('delete');
    Route::delete('{id}',[ContractController::class,'destroy'])->name('destroy');
});

Route::get('/financial-accounts',[FinancialAccountController::class,'index'])->name('financial_accounts');
Route::prefix('/financial-account')->name('financial_account.')->group(function(){
    Route::get('create',[FinancialAccountController::class,'create'])->name('create');
    Route::post('store',[FinancialAccountController::class,'store'])->name('store');

    Route::get('{id}',[FinancialAccountController::class,'edit'])->name('edit');
    Route::put('{id}',[FinancialAccountController::class,'update'])->name('update');

    Route::get('{id}/delete',[FinancialAccountController::class, 'delete'])->name('delete');
    Route::delete('{id}',[FinancialAccountController::class,'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
