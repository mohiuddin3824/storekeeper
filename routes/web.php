<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [ProductsController::class, 'dashboard']);
Route::get('transaction', [ProductsController::class, 'allTransaction']);
Route::get('product', [ProductsController::class, 'allProduct']);
Route::get('add-product', [ProductsController::class, 'addProduct']);
Route::post('productAdd', [ProductsController::class, 'productAdd']);
Route::get('sell-product/{id}', [ProductsController::class, 'sellProduct']);
Route::get('edit-product/{id}', [ProductsController::class, 'editProduct']);
Route::post('productUpdate/{id}', [ProductsController::class, 'productUpdate']);
Route::get('remove-product/{id}', [ProductsController::class, 'deleteProduct']);
Route::post('productSell/{id}', [ProductsController::class, 'productSell']);