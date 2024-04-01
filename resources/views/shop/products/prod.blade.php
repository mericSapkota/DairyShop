@vite('resources/css/app.css')

@extends('shop.dashboard')
@section('content')
<div class="flex flex-col gap-16">
  @foreach($product as $p)
  <div class="w-full h-max">
    <div class="flex justify-center h-72 relative">
      <div class=" flex flex-col  items-center justify-center text-white">
        <p class="text-4xl  ">{{$p->product_name}}</p>
        <p>Home/Shop/Cheese</p>
      </div>
      @endforeach
      <div class="absolute top-0 h-72 -z-10 ">
        <img class="w-full h-full object-cover " src="{{asset('images/shop.jpg')}}" alt="">
      </div>
    </div>
  </div>
  <div>
    @if($order)
    @foreach($product as $p)
    <div class="flex justify-center">Your order has been added to cart. {{$p->product_name}} <br> <a href="/cart/"><button>View Cart</button></a></div>
    @endforeach
    @endif

  </div>
  <div class="container mx-auto px-10 flex gap-10">
    @foreach($product as $p)
    <div class="border border-yellow-500 w-[850px] h-[400px] flex justify-center ">
      <img class="w-full h-full boject-cover" src="{{$p->photo}}" alt="">
    </div>
    <div class="flex flex-col gap-3">

      <form class=" flex flex-col gap-4" action="/shop/cart/{{$p->id}}" method="post">
        @csrf
        <p class=" text-3xl font-bold">{{$p->product_name}}</p>
        <p class="text-2xl font-bold">${{$p->price}}</p>
        <p class="text-slate-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel tenetur rem magni quam voluptates eius est mollitia, ab laudantium aut quod autem itaque facere necessitatibus ipsam cupiditate sit quidem dolor?</p>
        <p>Qty available :{{$p->qty}}</p>
        <input type="number" name="qty" placeholder="Enter Qty">
        <input type="date" name="date">
        <input type="time" name="time">
        <input type="text" name="address" placeholder="Address"><br>
        <input type="submit" class="bg-yellow-500 px-4 py-2 rounded" value="Add to Cart">
      </form>
      @endforeach
    </div>
  </div>

  <div class="flex flex-col gap-10">
    <div>
      <p class="text-center text-4xl font-bold">Related Products</p>
    </div>


    <div class="container mx-auto  px-10 grid grid-cols-4 w-xl gap-10">

      @foreach($products as $a)

      @php
      $items = [
      [
      'name' => $a->product_name,
      'price' => $a->price,
      'img' => $a->photo,
      ],
      ]
      @endphp

      @each('components.relatedProducts', $items, 'item')

      @endforeach



    </div>
  </div>

</div>
@endsection