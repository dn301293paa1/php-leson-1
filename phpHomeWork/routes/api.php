<?php

use App\Http\Controllers\Book\BookController;
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


Route::get('/books1', function () {
    return 'test';
});


Route::get('/books', [BookController::class, 'index']);
Route::post('/books' ,[BookController::class , 'store']);
Route::get('/books/{books}', [BookController::class, 'show']);
Route::put('/books/{books}', [BookController::class, 'update']);
Route::delete('/books/{books}', [BookController::class, 'destroy']);
