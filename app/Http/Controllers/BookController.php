<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Get all books
        $books = Book::all();

        return response()->json($books, 200);
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'isbn'   => 'required|string|unique:books',
            'title'  => 'required|string',
            'author' => 'required|string',
        ]);

        // Create a new book
        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Book registered successfully',
            'data' => $book
        ], 201);
    }
}
