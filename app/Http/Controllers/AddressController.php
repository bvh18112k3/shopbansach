<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.address.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        $address = new Address();
        $order_address = $request->sonha . '-' . $request->ward . '-' . $request->district . '-' . $request->city;
        $address->fill([
            'order_name' => $request->order_name,
            'order_email' => $request->order_email,
            'order_phone' => $request->order_phone,
            'order_address' => $order_address,
            'user_id' => $request->user_id,
        ]);
        $address->save();
        $add = Address::query()->where('user_id', $request->user_id)->get();
        return redirect()->route('getAddress');


    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }

    public function address()
    {
        $user_id = Auth()->user()->id;
        $address = Address::query()->where('user_id', $user_id)->get();
        return view('user.address.index', compact('address'));


    }
}
