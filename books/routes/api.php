<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::group(['prefix' => 'books'], function () {
   Route::apiResource('books', BooksController::class);
});  // не работает
*/

Route::get('/books', [BooksController::class, 'index']);
Route::get('/books/{id}', [BooksController::class, 'show']);
Route::patch('/books/{id}', [BooksController::class, 'update']);
Route::post('/books', [BooksController::class, 'store']);
Route::delete('/books/{id}', [BooksController::class, 'destroy']);





