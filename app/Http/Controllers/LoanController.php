<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
       return response()->json(Loan::with('book')->get(), 200);
    }


    //'book_id', 'boorower_name', 'borrowed_at', 'returned_at'
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
        ]);

        $book = Book::findOrFail($validated['book_id']);
        if ($book->available_copies < 1) {
            return response()->json(['message' => 'nincs elérhető példány'], 400);
        }
        $loan = Loan::create($validated);
        $book->decrement('available_copies');
        return response()->json($loan, 201);
    }

    public function update($id)
    {
        $loan = Loan::findOrFail($id);
        if (($loan -> returned_at) != null) {
            return response()->json(['message' => 'a kölcsönzött könyv már visszalett adva'], 400);
        }
        $loan->update(['returned_at' => now()]);
        $loan->book->increment('available_copies');
        return response()->json(['message' => 'A könyv sikeresen visszavéve'], 200);

    }
}
