<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'quantity',
        'sum_money',
        'note',
    ];
    public function Book(){
        return $this->belongsTo(Book::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
