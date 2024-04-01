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
          <th class="px-6">Confirm</th>
        </tr>

        <tr>
          <form action="/cart/update/{{$o->id}}" method="post">
            @csrf
            <td class="text-yellow-400 text-xl"><input type="text" name="product_name" value="{{$o->product_name}}"></td>
            <td>{{$o->price}}</td>
            <td><input type="text" value="{{$o->qty}}" name="qty"></td>
            <td><input type="submit" class="bg-green-500 rounded px-4 py-2" value="Confirm"></td>
          </form>
        </tr>

      </table>
    </div>

  </div>
</div>
@endsection