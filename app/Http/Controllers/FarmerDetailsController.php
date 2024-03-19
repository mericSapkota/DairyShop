<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FarmerDetails;
use App\Models\Payment;
use App\Models\User;
use App\Traits\FileStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerDetailsController extends Controller
{
    use FileStorage;
    public function index()
    {

        $admin = User::find(Auth::id());
        $admin = $admin->name;

        $a = Admin::where('name', $admin)->get();
        foreach ($a as $b) {
            if ($b) {
                $payment = Payment::all();
                $products = FarmerDetails::all();
                return view('admin.index', compact('products', 'payment'));
            }
        }

        echo ('you are not admin');
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
        FarmerDetails::create($request->except('photo') + [
            'photo' => $this->storeFile('images/products', $request->file('photo'))
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
