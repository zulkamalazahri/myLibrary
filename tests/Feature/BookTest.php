<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_book_can_be_registered()
    {
        $response = $this->postJson('/api/books', [
            'isbn' => '978-3-16-148410-0',
            'title' => 'Laravel Testing',
            'author' => 'Jane Doe',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'data' => ['id', 'isbn', 'title', 'author', 'created_at', 'updated_at']
            ]);
    }
}
dump(env('DB_DATABASE'));
