<?php

namespace App\Http\Controllers;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ShippingMethod::query()->get();
        return view(ADMIN.DOT.SHIPPING.DOT.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(ADMIN.DOT.SHIPPING.DOT.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table_name = (new ShippingMethod())->getTable();
        $this->validate($request, [
            'name'=>['required', Rule::unique($table_name)],
            'detail'=>['required'],
            'fee'=>['required']
        ]);
        $shipping = new ShippingMethod();
        $shipping->fill($request->all());
        $shipping->save();
        return redirect()->route('admin.shippings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingMethod $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingMethod $shipping)
    {
        return view(ADMIN.DOT.SHIPPING.DOT.__FUNCTION__, compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingMethod $shipping)
    {
        $table_name = (new ShippingMethod())->getTable();

        $this->validate($request, [
            'name'=>['required', Rule::unique($table_name)->ignore($shipping->id)],
            'detail'=>['required'],
            'fee'=>['required']
        ]);
        $shipping->fill($request->all());
        $shipping->save();
        return redirect()->route('admin.shippings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingMethod $shipping)
    {
        $shipping->delete();
        return redirect()->route('admin.shippings.index');
    }
}
