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
        <p class="text-3xl ">Filter</p>

      </div>

      <div class="flex flex-col gap-4">

        <form action="/shop" method="post">
          @csrf
          @method('POST')
          <p>Price</p>
          @if($request->price)
          <input type="text" placeholder="0-200" name="price" value="{{$request->price}}">
          @else
          <input type="text" placeholder="0-200" name="price" value="0-1000">
          @endif
          <p>Categories</p>

          <select name="category" id="">
            @foreach($admins as $a)
            <option value="{{$a->category}}">{{$a->category}}</option>
            @endforeach
          </select>

          <div class="flex justify-center">
            <button type="submit" class="bg-yellow-300 my-5 rounded px-3 py-2">Search</button>
          </div>
        </form>



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