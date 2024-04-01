@extends('shop.dashboard')
@section('content')
<div class="flex flex-col gap-4">
  <div class="w-full h-max">
    <div class="flex justify-center h-72 relative">
      <div class=" flex flex-col  items-center justify-center text-white">
        <p class="text-4xl">Cart</p>
        <p></p>
      </div>

      <div class="absolute top-0 h-72 -z-10 ">
        <img class="w-full h-full object-cover " src="{{asset('images/shop.jpg')}}" alt="">
      </div>
    </div>
  </div>

  <div class="container px-10 mx-auto w-max">
    <div class="flex flex-col w-80 gap-4">
      <p class="text-2xl font-bold">Billing Details </p>
      @foreach($or as $o)
      @php
      $p = explode('/',$o->price);
      @endphp
      <p>Address: {{$o->address}}</p>
      <p>Price: {{$p[0] * $o->qty}}</p>

      <div>
        <form class="flex flex-col gap-4" action="/payment/{{$o->id}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('post')
          <label for="name">Name</label>
          <input type="text" name="name" placeholder="Enter your Name">

          <input type="radio" id="cash" name="payment_method" value="Cash On Delivery">
          <label for="cash">Cash On Delivery</label>

          <input type="radio" id="online" name="payment_method" value="Online Payment">
          <label for="online">Online Payment</label>


          <input type="file" name="ss" accept="image/jpg, image/png">
          <input type="text" name="remarks" placeholder="remarks">

          <input type="submit" class="bg-green-500 px-4 py-2 rounded" value="Place Order">

        </form>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection