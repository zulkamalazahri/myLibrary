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
        $request->validate([
            'isbn' => 'required|string',
            'title' => 'required|string',
            'author' => 'required|string',
        ]);

        // Check if ISBN already exists
        $existingBook = Book::where('isbn', $request->isbn)->first();

        if ($existingBook) {
            // Ensure the title & author are the same
            if ($existingBook->title !== $request->title || $existingBook->author !== $request->author) {
                return response()->json([
                    'message' => 'Books with the same ISBN must have the same title and author'
                ], 400);
            }
        }

        // Allow multiple copies of the same book
        Book::create($request->all());

        return response()->json(['message' => 'Book registered successfully']);
    }
}
