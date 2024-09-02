<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\TransactionController as TransactionController;
use App\Http\Controllers\CategoryController as CategoryController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::resource("home",HomeController::class);

Route::middleware('auth')->group(function(){
    Route::resource("transactions",TransactionController::class);
    Route::resource("categories",CategoryController::class);
});
Route::get('/transactions/{type}/{value}/{year}', [TransactionController::class, 'getTransactions']);
