<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpParser\Node\Expr\BinaryOp\Equal;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    public function test_index_shows_all(): void
    {
        //Arrange
        Book::factory()->count(3)->create();
        //$this->seed();
        //Act
        $response = $this->getJson('api/books');
        //Assert
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
}
