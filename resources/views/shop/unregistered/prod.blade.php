@vite('resources/css/app.css')

@extends('shop.dashboard')
@section('content')
<div class="flex flex-col gap-16">

  <div class="w-full h-max">
    <div class="flex justify-center h-72 relative">
      <div class=" flex flex-col  items-center justify-center text-white">
        <p class="text-4xl  ">Pecorino Romano</p>
        <p>Home/Shop/Cheese</p>
      </div>

      <div class="absolute top-0 h-72 -z-10 ">
        <img class="w-full h-full object-cover " src="{{asset('images/shop.jpg')}}" alt="">
      </div>
    </div>
  </div>
  <div>
    @if($order)
    @foreach($product as $p)


    <div>Your order has been added to cart. {{$p->product_name}} <a href="/cart"><button>View Cart</button></a></div>





    @endforeach
    @endif

  </div>
  <div class="container mx-auto px-10 flex gap-10">

    <div class="border border-yellow-500 w-[850px] h-[400px] flex justify-center ">
      <img class="w-full h-full boject-cover" src="{{asset('images/product-1.jpg')}}" alt="">
    </div>
    <div class="flex flex-col gap-3">
      @foreach($product as $p)
      <form class="mt-10 flex flex-col gap-4" action="/shop/cart/{{$p->id}}" method="post">
        @csrf
        <p class=" text-3xl font-bold">{{$p->product_name}}</p>
        <p class="text-2xl font-bold">${{$p->price}}</p>
        <p class="text-slate-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel tenetur rem magni quam voluptates eius est mollitia, ab laudantium aut quod autem itaque facere necessitatibus ipsam cupiditate sit quidem dolor?</p>

        <input type="text" name=qty placeholder="Enter Qty">
        <input type="date" name="date">
        <input type="time" name="time">
        <input type="text" name="address" placeholder="Address"><br>
        <input type="submit" class="bg-yellow-500 px-4 py-2 rounded" value="Add to Cart">
      </form>
      <p>Qty available :</p>
      @endforeach
    </div>
  </div>

  <div class="flex flex-col gap-10">
    <div>
      <p class="text-center text-4xl font-bold">Related Products</p>
    </div>


    <div class="container mx-auto  px-10 grid grid-cols-4 w-xl gap-10">

      <div class="border border-yellow-500 flex flex-col justify-center ">
        <div>
          <img class="object-cover" src="{{asset('images/product-1.jpg')}}" alt="">
        </div>
        <div class="text-center flex flex-col gap-3 mb-5">
          <p>Namw</p>
          <p>price</p>
          <a href=""><button class="bg-yellow-400 rounded px-4 py-2">Check Out</button></a>
        </div>
      </div>



    </div>
  </div>

</div>
@endsection