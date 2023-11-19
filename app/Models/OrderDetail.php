<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'order_id',
        'sum_quantity',
        'sum_money',
    ];
    public function Book(){
        return $this->belongsTo(Book::class);
    }
    public function Order(){
        return $this->belongsTo(Order::class);
    }
}
