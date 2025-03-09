<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|unique:borrowers',
        ]);

        // Create a new borrower
        $borrower = Borrower::create($request->all());

        return response()->json([
            'message' => 'Borrower registered successfully',
            'data' => $borrower
        ], 201);
    }
}
