<div>
  @extends('shop.dashboard')
  @section('content')
  Thankyou your Order has been received.<br>
  <a href="/shop"><button>Go back </button></a>
  {{$order}}
  @foreach($payment as $p)
  {{$p}}
  @endforeach
  @endsection

</div>