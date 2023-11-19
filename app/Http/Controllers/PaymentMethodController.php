<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PaymentMethod::query()->get();
        return view(ADMIN.DOT.PAYMENT.DOT.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(ADMIN.DOT.PAYMENT.DOT.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table_name = (new PaymentMethod())->getTable();
        $this->validate($request, [
            'name'=>['required', Rule::unique($table_name)],
            'description'=>['required'],
        ]);
        $payment = new PaymentMethod();
        $payment->fill($request->all());
        $payment->save();
        return redirect()->route('admin.payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $payment)
    {
        return view(ADMIN.DOT.PAYMENT.DOT.__FUNCTION__, compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentMethod $payment)
    {
        $table_name = (new PaymentMethod())->getTable();
        $this->validate($request, [
            'name'=>['required', Rule::unique($table_name)->ignore($payment->id)],
            'description'=>['required'],
        ]);
        $payment->fill($request->all());
        $payment->save();
        return redirect()->route('admin.payments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payments.index');
    }
}
