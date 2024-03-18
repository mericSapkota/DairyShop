@extends('layouts.app')
@section('content')
<div class="text-white">

  <form class="text-black" action="/admin" method="post">
    @csrf
    <input type="text" name="type" placeholder="Milk Category">
    <input type="text" name="price" placeholder="Price in Liter">
    <input class="bg-green-500 rounded px-3" type="submit" value="Create">
  </form>
</div>
@endsection