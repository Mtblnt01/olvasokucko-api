<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ● GET /api/books – Listázza az összes könyvet.
Route::get('/books', [BookController::class, 'index']);
// ● GET /api/books/{query} – Listázza a query-nek megfelelő íróval vagy címmel rendelkező könyveket!
Route::get('/books/{query}', [BookController::class, 'search']);

// ● POST /api/loans – Új kölcsönzés rögzítése (csak ha van elérhető példány).
Route::post('/loans', [LoanController::class, 'store']);
// ● PUT /api/loans/{id}/return – Kölcsönzés visszavétele (a könyv példányszámát növeli).
Route::put('/loans/{id}/return', [LoanController::class, 'update']);
// ● GET /api/loans – Listázza az aktív és lezárt kölcsönzéseket.
Route::get('/loans', [LoanController::class, 'index']);


