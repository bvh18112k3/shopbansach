<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'star',
        'book_id',
        'user_id',
        'order_id',
    ];
    public function Book(){
        return $this->belongsTo(Book::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Order(){
        return $this->belongsTo(Order::class);
    }
}
