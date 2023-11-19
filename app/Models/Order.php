<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_status',
        'total_money',
        'gift',
        'loichuc',
        'giamgia',
        'note',
        'user_id',
        'payment_method_id',
        'shipping_method_id',
        'address_id'
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function PaymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
    public function ShippingMethod(){
        return $this->belongsTo(ShippingMethod::class);
    }
    public function Address(){
        return $this->belongsTo(Address::class);
    }
}
