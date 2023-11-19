<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'order_name',
        'order_email',
        'order_phone',
        'order_address',
        'user_id'
    ];
    use HasFactory;
}
