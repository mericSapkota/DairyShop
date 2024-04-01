<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\FarmerDetails;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function index()
    {
        $product = FarmerDetails::all();

        return view('shop.products.$product->name', compact('product'));
    }

    public function showProduct($name)
    {
        $products =  FarmerDetails::all();
        $product = FarmerDetails::where('product_name', $name)->get();

        $producto = FarmerDetails::where('category', $product[0]->category)->get();



        if (!(Auth::id())) {
            $order = Order::where('user_id', null)->get();
            $or = Order::where('user_id', Auth::id())->get();

            return view('shop.unregistered.prod', compact('order', 'or', 'product', 'products'));
        } else {
            $order = Order::find(Auth::id());
            $or = Order::where('user_id', Auth::id())->get();
            return view("shop.products.prod", compact('product', 'order', 'or', 'products', 'producto'));
        }
    }



    public function create()
    {
    }


    public function cart()
    {
        if (!(Auth::id())) {
            $order = Order::where('user_id', null)->get();
            $or = Order::where('user_id', Auth::id())->get();
            return view("shop.unregistered.cartIndex", compact('order', 'or'));
        }
        $order = Order::where('user_id', Auth::id())->get();
        $or = Order::where('user_id', Auth::id())->get();

        return view("shop.cart.index", compact('order', 'or'));
    }

    public function store(Request $request, $id)
    {
        $product = FarmerDetails::find($id);

        if (!(Auth::id())) {
            Order::create($request->except('product_name', 'price') +
                [
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'category' => $product->category,
                ]);
        } else {
            $order = Order::create($request->except('user_id', 'product_name', 'price') +
                [
                    'user_id' => Auth::id(),
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'category' => $product->category,
                ]);
            $user = User::where('id', Auth::id())->get();

            Mail::to($user[0]->email)->send(new OrderMail($order));
        }
        return redirect("/shop/product/{$product->product_name}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, $id)
    {
        $o = Order::find($id);
        $or = Order::where('user_id', Auth::id())->get();

        return view('shop.cart.edit', compact('o', 'or'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        $user_id = $order->user_id;
        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, $id)
    {
        $order = Order::find($id);
        $order->delete($id);
        return redirect('/cart');
    }
}
