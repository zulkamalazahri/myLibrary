<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Borrower;
use App\Models\Book;

class BorrowerTest extends TestCase
{
    use RefreshDatabase;

    public function test_borrow_a_book()
    {
        // ✅ Use the factories to create test records
        $borrower = Borrower::factory()->create();
        $book = Book::factory()->create();

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

