<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Traits\FileStorage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PaymentController extends Controller
{

    use FileStorage;
    public function index($id)
    {
        $order = Order::find($id);
        $or = Order::where('user_id', Auth::id())->get();

        return view('shop.payments.index', compact("order", 'or'));
    }

    public function urIndex()
    {
        $or = Order::where('user_id', Auth::id())->get();

        return view('shop.payments.unregisteredIndex', compact('or'));
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
    public function store(Request $request, $id)
    {
        $order = Order::find($id);
        $o = explode('/', $order->price);

        Payment::create($request->except('ss', 'order_id', 'amount') + [
            'ss' => $this->storeFile('images/payments', $request->file('ss')),
            'order_id' => $order->id,
            'amount' => $o[0] * $order->qty,

        ]);
        $order->update();
        $payment = Payment::where('order_id', $order->id)->get();
        $or = Order::where('user_id', Auth::id())->get();

        return view('shop.payments.ack', compact('order', 'payment', 'or'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
