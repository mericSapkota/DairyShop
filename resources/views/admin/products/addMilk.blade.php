@extends('layouts.app')
@section('body')
<div class="text-white">
  <form action="/update/qty/{{$milkqty->id}}" method="post">
    @csrf
    @method('patch')
    <input type="text" name="type" placeholder="Milk Category" value="{{$milkqty->type}}">
    <input type="text" name="price" placeholder="Price in Liter" value="{{$milkqty->price}}">
    <input type="text" name="qty" placeholder="Quantity" value="{{$milkqty->qty}}">
    <input type="submit" value="Update">
  </form>
</div>

</div>
@endsection