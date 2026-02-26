<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Loan;
use Database\Factories\LoanFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Symfony\Component\Clock\now;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = Book::first();
        if ($book != null && $book->available_copies > 0) {
            Loan::create([
                'book_id' => $book->id,
                'borrower_name' => 'Pum Pál',
            ]);
            $book->decrement('available_copies');
        }
        Loan::factory()->count(3)->create();
    }
}
