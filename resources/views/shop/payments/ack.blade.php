<div class="flex justify-center mx-10 container">
  @extends('shop.dashboard')
  @section('content')
  <div class="flex justify-center">
    Thankyou your Order has been received.<br>
    <a href="/shop"><button class="bg-yellow-500 px-4 py-2 rounded">Go back </button></a>

    {{$order->product_name}}
    @foreach($payment as $p)
    {{$p->amount}}
    @endforeach
    @endsection
  </div>
</div>