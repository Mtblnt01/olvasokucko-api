<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    public function run(): void
    {
        Book::create([
            'title' => 'Egri Csillagok',
            'author' => 'Gárdonyi Géza',
            'available_copies' => 5
        ]);
        Book::create([
            'title' => 'Vuk',
            'author' => 'Fekete István',
            'available_copies' => 4
        ]);

        Book::factory()->count(3)->create();
    }
}
