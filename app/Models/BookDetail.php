<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'book_type_id',
    ];
    public function Book(){
        return $this->belongsTo(Book::class);
    }
    public function BookType(){
        return $this->belongsTo(BookType::class);
    }

}
