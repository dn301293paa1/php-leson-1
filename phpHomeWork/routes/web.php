<?php

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

Route::get('/books', [BookController::class, 'index']);
Route::post('/books' ,[BookController::class , 'store']);
Route::get('/books/{books}', [BookController::class, 'show']);
//Route::get('/books', [BookController::class, 'index']);
//Route::post('/books', [BookController::class, 'store']);
//Route::get('/books/{books}', [BookController::class, 'show']);
//Route::put('/books/{books}', [BookController::class, 'update']);
//Route::delete('/books/{books}', [BookController::class, 'destroy']);
