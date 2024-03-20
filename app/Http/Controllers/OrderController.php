<?php

namespace App\Http\Controllers;

use App\Models\FarmerDetails;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (!(Auth::id())) {
            $order = Order::where('user_id', null)->get();
            $or = $order;
            return view('shop.unregistered.prod', compact('order', 'or', 'product'));
        } else {
            $order = Order::find(Auth::id());
            $or = Order::where('user_id', Auth::id())->get();
            return view("shop.products.prod", compact('product', 'order', 'or', 'products'));
        }
    }

    public function unregisteredUserCart()
    {

        $order = Order::where('user_id', null)->get();
        $or = Order::where('user_id', Auth::id())->get();
        return view("shop.unregistered.cartIndex", compact('order', 'or'));
    }

    public function create()
    {
    }


    public function cart($id)
    {
        $order = Order::where('user_id', $id)->get();
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
            Order::create($request->except('user_id', 'product_name', 'price') +
                [
                    'user_id' => Auth::id(),
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'category' => $product->category,
                ]);
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
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
