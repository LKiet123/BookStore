<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VoucherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('crud_user:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/index/add-cart/', [IndexController::class, 'addCartAPI'])
    ->name('index-add-cart-api');

Route::get('/index/search/{keyword}', [IndexController::class, 'searchAPI'])->name('index-search-api');

Route::get('/categories/all', [IndexController::class, 'categories'])->name('categories-api');

Route::get('/index/category/{id}', [IndexController::class, 'categoryAPI'])
    ->name('index-category-api');

Route::get('/index/all-books', [IndexController::class, 'allBooksAPI'])
    ->name('index-all-books-api');

Route::get('/index/books-by-date', [IndexController::class, 'booksByDateAPI'])
    ->name('index-books-by-date');

Route::get('/index/books-by-sold', [IndexController::class, 'booksBySoldAPI'])
    ->name('index-books-by-sold');

Route::get('/vouchers', [VoucherController::class, 'all']);

Route::get('/index/books-by-review', [IndexController::class, 'booksByReviewAPI'])
    ->name('index-books-by-review');

    