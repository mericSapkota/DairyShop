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

        $admin = Admin::all();
        $order = Order::where('user_id', Auth::id());
        return view('homepage.homepage', compact('order', 'admin'));
    }



    public function productsView()
    {
        $or = Order::where('user_id', Auth::id())->get();
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
