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
        $or = Order::where('user_id', Auth::id())->get();

        if (!Auth::id()) {
            $order = Order::where('user_id', Auth::id());
            return view('shop.unregistered.homepage');
        }
        $admin = Admin::all();
        $order = Order::where('user_id', Auth::id());

        return view('homepage.homepage', compact('order', 'or', 'admin'));
    }



    public function productsView(Request $request)
    {
        $or = Order::where('user_id', Auth::id())->get();
        $total = 0;

        foreach ($or as $o) {
            $ot = explode('/', $o);
        }

        if ($request->price) {
            $p = explode('-', $request->price);
            $pr = FarmerDetails::all();
            foreach ($pr as $ep) {
                $ep = FarmerDetails::where('id', $ep->id)->get();
                $exploded = explode('/', $ep[0]->price);
                $category = $ep[0]->category;

                if (($exploded[0] >= $p[0] && $exploded[0] <= $p[1]) && $category == $request->category) {
                    $admin = $ep;
                    $admins = FarmerDetails::all();
                    return view('shop.bodyshop', compact('admin', 'admins', 'or', 'request'));
                } else {
                    continue;
                }
            }
            // $admin = FarmerDetails::where('price', ">=", $p[0])->where('exploded[0]', '<=', $p[1])->where('category', $request->category)->get();

        } else {
            $admin = FarmerDetails::all();
            $admins = FarmerDetails::all();
            return view('shop.bodyshop', compact('admin', 'admins', 'or', 'request'));
        }
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
