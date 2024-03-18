<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FarmerDetails;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $admin = User::find(Auth::id());

        $admin = $admin->name;
        $a = Admin::where('name', $admin)->get();
        foreach ($a as $b) {

            $payment = Payment::where('name', $b);
            $products = FarmerDetails::all();
        }
        return view('admin.index', compact('products', 'payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FarmerDetails::create($request->all() +
            [
                'qty' => 0,

            ]);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerDetails $farmerDetails)
    {
        //
    }

    public function changeStatus($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerDetails $farmerDetails, $id)
    {
        $milkqty = FarmerDetails::find($id);
        return view("admin.products.addMilk", compact('milkqty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerDetails $farmerDetails, $id)
    {
        $farmerDetails = FarmerDetails::find($id);
        $farmerDetails->update($request->all());
        return redirect("/admin");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerDetails $farmerDetails)
    {
        //
    }
}
