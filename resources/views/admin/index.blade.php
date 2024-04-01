@extends('layouts.app')

@section('body')
<div class="text-white">
  <div class="flex flex-col py-10 gap-10 justify-around">
    <div class="flex flex-col justify-center items-center">
      <fieldset class="flex flex-col items-center">
        <legend class="text-center text-3xl">Categories</legend><br>
        <div class=""><a href="admin/products/add"><button class="px-3  bg-yellow-500 rounded">Add category </button> </a> </div>
        <div>
          <table>
            <tr class="gap-6 mx-5">
              <th class="">Name</th>
              <th class="mx-5">Category </th>
              <th class="p-6">Price Per Qty </th>
              <th class="p-6">Quantity in liter </th>
              <th>Image</th>
              <th class="p-6">Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($products as $p)
            <tr class="justify-center text-center">
              <td class="p-10">{{$p->product_name}}</td>
              <td>{{$p->category}}</td>
              <td>{{$p->price}}</td>
              <td>{{$p->qty}}</td>
              <td><img class="w-24 h-24" src="{{$p->photo}}" alt=""></td>
              <td><a href="admin/products/edit/{{$p->id}}"> <button href="">Edit</button></a></td>
              <form action="admin/products/delete/{{$p->id}}" method="post">
                @csrf
                @method('delete')
                <td><button type="submit">Delete</button></td>
              </form>
            </tr>
            @endforeach

          </table>
      </fieldset>
    </div>

    <div class="flex flex-col justify-center items-center">
      <h1 class="text-3xl">Confirm Order</h1>
      <table class="my-5">
        <tr class="p-4">
          <th class="p-6">Id</th>
          <th>Name</th>
          <th>Amount</th>
          <th>Image</th>
          <th class="p-6">TimeStamp</th>
          <th>Status</th>


        </tr>
        @foreach($payment as $p)
        <tr class="text-center">
          <td>{{$p->id}}</td>
          <td>{{$p->name}}</td>
          <td>{{$p->amount}}</td>
          <td> <img class="object-fit" src="{{$p->ss}}" alt=""></td>
          <td>{{$p->created_at}}</td>
          <td>Payment Status
            <select class="text-black  py-0 bg-slate-300 rounded " name="payment_status">
              <option value="">{{$p->status}}</option>
              <option value="only payment compeleted">only Payment Verified</option>
              <option value="payment and order completed">Payment and order both completed</option>
            </select>
          </td>

          <td>
            <a href="/editstatus/{{$p->id}}"><button class="px-3  bg-yellow-500 rounded">Change</button></a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>


</div>
@endsection