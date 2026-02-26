<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /*GET /api/books – Listázza az összes könyvet.*/

    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    /*● GET /api/books/{query} – Listázza a query-nek megfelelő íróval vagy címmel
rendelkező könyveket!*/
    /**
     * Store a newly created resource in storage.
     */
    public function search($query)
    {
        $books = Book::where('title', 'like', "%$query%")->orWhere('author', 'like', "%$query%")->get();
        return response()->json($books, 200);
    }
}