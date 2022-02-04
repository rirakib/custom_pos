<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AjaxController::class,'index'])->name('customer.index');
Route::post('create/store',[AjaxController::class,'store'])->name('customer.store');

Route::resource('/product',ProductController::class,['name'=>'product']);
Route::resource('/sale',SaleController::class,['name'=>'sale']);

Route::get('/customer/history/{id}',[HistoryController::class,'show'])->name('history.show');

Route::get('/report',[ReportController::class,'index'])->name('report.index');