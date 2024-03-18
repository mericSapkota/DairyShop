@extends('shop.dashboard')
@section('content')
<div class="flex flex-col gap-10">

  <div class="w-full h-max">
    <div class="flex justify-center h-72 relative">
      <div class=" flex flex-col  items-center justify-center text-white">
        <p class="text-4xl ">Shop</p>
        <p>Home/Shop</p>
      </div>

      <div class="absolute top-0 h-72 -z-10 ">
        <img class="w-full h-full object-cover " src="{{asset('images/shop.jpg')}}" alt="">
      </div>
    </div>
  </div>

  <div class="container mx-auto px-10  flex justify-between">
    <div class="bg-red-100 w-3/12 h-max py-12 px-10 flex gap-10 flex-col">
      <div>
        <p class="text-3xl ">Your Cart</p>
        <p class="text-slate-400 text-sm">No Products in cart</p>
      </div>

      <div>
        <p>Price Filter</p>
        <form action="">
          @csrf
          <label for="vol">Volume (0-50)</label>
          <input type="range" name="vol" min='0' max='50'>
        </form>

        <p>Categories</p>
        <li>Butter</li>
        <li>Cheese</li>
        <li>Icecream</li>
        <li>Milk</li>
      </div>
    </div>


    <div class="w-4/6 flex flex-col gap-5">
      <div class="flex justify-end">
        <Select>
          <option value="">Latest</option>
          <option value="">High to low</option>
          <option value="">Low to High</option>
        </Select>
      </div>

      <div class="grid grid-cols-3 gap-6  ">

        @foreach($admin as $a)
        @php

        $items = [
        [
        'name' => $a->product_name,
        'price' => $a->price,
        'img' => $a->photo,
        ],

        ]

        @endphp

        @each('components.productsOfShop', $items, 'item')

        @endforeach
      </div>
    </div>

  </div>
</div>
@endsection