@extends('shop.dashboard')
@section('content')
<div class="flex flex-col gap-10">
  <div class="w-full h-max">
    <div class="flex justify-center h-72 relative">
      <div class=" flex flex-col  items-center justify-center text-white">
        <p class="text-4xl  ">Cart</p>
        <p></p>
      </div>

      <div class="absolute top-0 h-72 -z-10 ">
        <img class="w-full h-full object-cover " src="{{asset('images/shop.jpg')}}" alt="">
      </div>
    </div>
  </div>

  <div class="container mx-auto px-10">
    <div class="flex justify-center">
      <table class="text-center">
        <tr class="bg-yellow-500">
          <th>Product</th>
          <th class="px-6">Price</th>
          <th class="px-6">Quantity</th>
          <th class="px-6">Total</th>
          <th class="px-6">Update</th>
          <th class="px-6">Delete</th>
          <th class="px-6">CheckOut</th>
        </tr>
        @foreach($order as $o)
        <tr>
          <td class="text-yellow-400 text-xl">{{$o->product_name}}</td>
          <td>{{$o->price}}</td>
          <td>{{$o->qty}}</td>
          <td>{{$o->price * $o->qty}}</td>
          <td><a href="/cart/edit/{{$o->id}}"><button>Update</button></a></td>
          <td><a href="/cart/delete/{{$o->id}}"><button class="bg-red-500 px-4 py-2 rounded">Delete</button></a></td>
          <td><a href="/payment/{{$o->id}}"><button class="bg-green-500 rounded px-4 py-2">CheckOut</button></a></td>
        </tr>
        @endforeach
      </table>
    </div>

  </div>
</div>
@endsection