<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Borrower;
use App\Models\Book;
use App\Models\BorrowedBook;

class BorrowTest extends TestCase
{
    use RefreshDatabase;

    public function test_borrow_a_book()
    {
        // Create test borrower
        $borrower = Borrower::factory()->create();

        // Create test book
        $book = Book::factory()->create();

        // Send borrow request
        $response = $this->postJson('/api/borrow', [
            'borrower_id' => $borrower->id,
            'book_id' => $book->id,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Book borrowed successfully'
            ]);
    }
}
dump(env('DB_DATABASE'));
