<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function SendMail(){

        $order_detail = OrderDetail::query()->where('order_id', 9)->get();

        $user = User::query()->findOrFail(1);
        $order = Order::query()->findOrFail(9);
        $mail = new HelloMail($user, $order, $order_detail);
        Mail::to($user->email)->send($mail);
        return true;

    }
}
