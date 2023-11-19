<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'publishing_company',
        'publishing_year',
        'description',
        'pages',
        'weight',
        'size',
        'price',
        'quantity',
        'status',
        'discount',
        'author_id'
    ];

    public function Author(){
        return $this->belongsTo(Author::class);
    }

}
