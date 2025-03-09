<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;

// Register borrower
Route::post('/borrowers', [BorrowerController::class, 'store']);

// Register a new book
Route::post('/books', [BookController::class, 'store']);

// Get all books
Route::get('/books', [BookController::class, 'index']);

// Borrow a book
Route::post('/borrow', [BorrowController::class, 'borrow']);

// Return a book
Route::post('/return', [BorrowController::class, 'returnBook']);
