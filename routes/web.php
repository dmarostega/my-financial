<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DashBoardController;   
use App\Http\Controllers\FinancialAccountController;
use App\Http\Controllers\FinancialEntityController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\TransactionController;
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
    return view('auth.register');
})->middleware(['guest'])->name('register');

Route::get('/dashboard',[DashBoardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('index');

Route::get('/users',[UserController::class,'index'])->middleware(['auth'])->name('users');
Route::prefix('user')->middleware(['auth'])->name('user.')->group(function(){
    Route::get('create',[UserController::class,'create'])->name('create');
    Route::post('store',[UserController::class,'store'])->name('store');  

    Route::get('edit/{id}',[UserController::class,'edit'])->name('edit');
    Route::put('update/{id}',[UserController::class,'update'])->name('update');

    Route::get('delete/{id}',[UserController::class,'delete'])->name('delete');
    Route::delete('destroy/{id}',[UserController::class,'destroy'])->name('destroy');
});

Route::get('/bills', [BillController::class, 'index'])->name('bills');
Route::prefix('bill')->name('bill.')->group(function(){ 
    Route::get('create',[BillController::class,'create'])->name('create');
    Route::post('store',[BillController::class,'store'])->name('store');

    Route::get('{id}', [BillController::class,'edit'])->name('edit');
    Route::put('{id}', [BillController::class,'update'])->name('update');

    Route::get('{id}/delete', [BillController::class,'delete'])->name('delete');
    Route::delete('{id}', [BillController::class,'destroy'])->name('destroy');
});

Route::get('/cards', [CardController::class, 'index'])->middleware(['auth'])->name('cards');
Route::prefix('card')->middleware(['auth'])->name('card.')->group(function(){
    Route::get('create', [CardController::class,'create'])->name('create');
    Route::post('store', [CardController::class,'store'])->name('store');

    Route::get('{id}', [CardController::class, 'edit'])->name('edit');
    Route::put('{id}', [CardController::class,'update'])->name('update');

    Route::get('{id}/delete', [CardController::class,'delete'])->name('delete');
    Route::delete('{id}', [CardController::class,'destroy'])->name('destroy');
});

Route::get('/categories',[CategoryController::class,'index'])->middleware(['auth'])->name('categories');
Route::prefix('category')->middleware(['auth'])->name('category.')->group(function(){
    Route::get('create',[CategoryController::class,'create'])->name('create');
    Route::post('store',[CategoryController::class,'store'])->name('store');

    Route::get('{id}',[CategoryController::class,'edit'])->name('edit');
    Route::put('{id}',[CategoryController::class,'update'])->name('update');

    Route::get('{id}/delete',[CategoryController::class,'delete'])->name('delete');
    Route::delete('{id}',[CategoryController::class,'destroy'])->name('destroy');
});

Route::get('/contracts',[ContractController::class,'index'])->middleware(['auth'])->name('contracts');
Route::prefix('contract')->middleware(['auth'])->name('contract.')->group(function(){
    Route::get('create',[ContractController::class,'create'])->name('create');
    Route::post('store',[ContractController::class,"store"])->name('store');

    Route::get('{id}',[ContractController::class,'edit'])->name('edit');
    Route::put('{id}',[ContractController::class,'update'])->name('update');

    Route::get('{id}/delete',[ContractController::class,'delete'])->name('delete');
    Route::delete('{id}',[ContractController::class,'destroy'])->name('destroy');
});

Route::get('/financial-accounts',[FinancialAccountController::class,'index'])->middleware(['auth'])->name('financial_accounts');
Route::prefix('/financial-account')->middleware(['auth'])->name('financial_account.')->group(function(){
    Route::get('create',[FinancialAccountController::class,'create'])->name('create');
    Route::post('store',[FinancialAccountController::class,'store'])->name('store');

    Route::get('{id}',[FinancialAccountController::class,'edit'])->name('edit');
    Route::put('{id}',[FinancialAccountController::class,'update'])->name('update');

    Route::get('{id}/delete',[FinancialAccountController::class, 'delete'])->name('delete');
    Route::delete('{id}',[FinancialAccountController::class,'destroy'])->name('destroy');
});

Route::get('/financial-entities', [FinancialEntityController::class,'index'])->middleware(['auth'])->name('financial_entities');
Route::prefix('/financial-entity')->middleware(['auth'])->name('financial_entity.')->group(function(){
    Route::get('create',[FinancialEntityController::class,'create'])->name('create');
    Route::post('store',[FinancialEntityController::class,'store'])->name('store');

    Route::get('{id}',[FInancialEntityController::class,'edit'])->name('edit');
    Route::put('{id}',[FinancialEntityController::class,'update'])->name('update');

    Route::get('{id}/delete',[FinancialEntityController::class,'delete'])->name('delete');
    Route::delete('{id}', [FinancialEntityController::class,'destroy'])->name('destroy');
});

Route::get('/payment-types',[PaymentTypeController::class,'index'])->middleware(['auth'])->name('payment_types');
Route::prefix('/payment-type')->middleware(['auth'])->name('payment_type.')->group(function(){
    Route::get('create',[PaymentTypeController::class,'create'])->name('create');
    Route::post('store',[PaymentTypeController::class,'store'])->name('store');
    
    Route::get('{id}',[PaymentTypeController::class,'edit'])->name('edit');
    Route::put('{id}',[PaymentTypeController::class,'update'])->name('update');

    Route::get('{id}/delete',[PaymentTypeController::class,'delete'])->name('delete');
    Route::delete('{id}',[PaymentTypeController::class,'destroy'])->name('destroy');
});

Route::get('/transactions', [TransactionController::class,'index'])->name('transactions');
Route::prefix('transaction')->name('transaction.')->group(function(){
    Route::get('create',[TransactionController::class, 'create'])->name('create');
    Route::post('store',[TransactionController::class, 'store'])->name('store');

    Route::get('{id}',[TransactionController::class, 'edit'])->name('edit');
    Route::put('{id}',[TransactionController::class, 'update'])->name('update');

    Route::get('{id}/delete', [TransactionController::class, 'delete'])->name('delete');
    Route::delete('{id}',[TransactionController::class,'destroy'])->name('destroy');
});

Route::get('/check-transactions',[TransactionController::class,'checkTransactions'])->name('check_transactions');
Route::get('/check-bills',[TransactionController::class,'checkBills'])->name('check_bills');

require __DIR__.'/auth.php';
