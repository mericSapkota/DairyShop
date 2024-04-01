<div class="flex flex-col gap-10">
  <div>
    <div class="flex container mx-auto px-4 justify-between px-10 py-3">
      <div>
        <img src="{{asset('/images/logo.png')}}" alt="">
      </div>

      <div class="flex items-center gap-4">
        <div class="bg-yellow-300 rounded-full w-10 h-10 flex items-center justify-center">
          <i class="fa-solid fa-cart-shopping fa-lg"></i>
        </div>

        <a href="/cart">
          <div>

            @if($or)
            <p>Cart: {{count($or)}} Items</p>
            @endif

            @php
            $total = 0;
            foreach($or as $op){
            $e = explode('/',$op->price);
            $total += $e[0] * $op->qty;
            }


            @endphp
            <p>${{$total}}</p>
          </div>
        </a>

      </div>
    </div>