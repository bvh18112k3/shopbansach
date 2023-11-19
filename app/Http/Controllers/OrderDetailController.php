<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = OrderDetail::query()->get();
        return view(ADMIN.DOT.ORDERDETAIL.DOT.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       dd($request->user);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
    public function orderDetail(Order $order){
        $orderDetail = OrderDetail::query()->where('order_id', $order->id)->get();
        $cartHead = Cart::query()->where('user_id', $order->user_id)->get();
        $countCart = Cart::where('user_id', $order->user_id)->count('id');
        return view('user.order.detail', compact('countCart', 'cartHead', 'order', 'orderDetail'));
    }
}
