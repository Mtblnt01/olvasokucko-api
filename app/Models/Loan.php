<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;

    protected $fillable = ['book_id', 'boorower_name', 'borrowed_at', 'returned_at'];
    protected $dates = ['borrowed_at', 'returned_at'];

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
