<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FarmerDetails;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::id()) {
            return view('layouts.guest');
        }
        $admin = Admin::all();
        $order = Order::where('user_id', Auth::id());

        return view('homepage.homepage', compact('order', 'admin'));
    }



    public function productsView(Request $request)
    {
        $or = Order::where('user_id', Auth::id())->get();
        if ($request->query('category')) {
            $admin = FarmerDetails::where('category', $request->query('category'))->get();
            return view('shop.bodyshop', compact('admin', 'or'));
        }
        $admin = FarmerDetails::all();

        return view('shop.bodyshop', compact('admin', 'or'));
    }
    public function view($name)
    {

        return view("shop.products.$name", compact("productDetails"));
    }

    public function store(Request $request, $id)
    {

        Order::create($request->all() + []);
        return view('shop.products.Pecorino Romano');
    }
}
