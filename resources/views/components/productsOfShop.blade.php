<div class="border border-yellow-500 flex flex-col items-center  h-max py-6">
  <div class="w-36 h-32">
    <img src="{{asset($item['img'])}}" alt="">
  </div>
  <div class="flex items-center flex-col ">
    <p class="text-slate-500 ">{{$item['name']}}</p>
    <p class="text-2xl ">${{$item['price']}}</p>
    <a href="/shop/product/{{$item['name']}}"><button class="mt-5 bg-yellow-400 text-white font-bold px-4 py-2 rounded">Select Option</button></a>
  </div>
</div>