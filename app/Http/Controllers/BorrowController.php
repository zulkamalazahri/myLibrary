<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Book;

class BorrowController extends Controller
{
    public function borrow(Request $request)
    {
        $request->validate([
            'borrower_id' => 'required|exists:borrowers,id',
            'book_id' => 'required|exists:books,id',
        ]);

        // Check if book is already borrowed
        if (BorrowedBook::where('book_id', $request->book_id)->whereNull('returned_at')->exists()) {
            return response()->json(['message' => 'Book is already borrowed'], 400);
        }

        // Borrow the book
        $borrow = BorrowedBook::create([
            'borrower_id' => $request->borrower_id,
            'book_id' => $request->book_id,
            'borrowed_at' => now(),
        ]);

        return response()->json(['message' => 'Book borrowed successfully', 'data' => $borrow], 200);
    }

    public function returnBook(Request $request)
    {
        $request->validate([
            'borrower_id' => 'required|exists:borrowers,id',
            'book_id' => 'required|exists:books,id',
        ]);

        // Find the borrowed book record
        $borrow = BorrowedBook::where('borrower_id', $request->borrower_id)
            ->where('book_id', $request->book_id)
            ->whereNull('returned_at')
            ->first();

        if (!$borrow) {
            return response()->json(['message' => 'No active borrowing record found'], 404);
        }

        // Update the return date
        $borrow->update(['returned_at' => now()]);

        return response()->json(['message' => 'Book returned successfully', 'data' => $borrow], 200);
    }
}
