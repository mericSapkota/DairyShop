@extends('layouts.app')
@section('body')
<div class="text-black bg-white p-10">

  <form class="flex" action="/admin" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="product_name" placeholder="Enter Product Name">
    <label for="photo">Add photo</label>
    <input type="file" name="photo" accept="image/jpg, image/png"><br>
    <input type="text" name="category" placeholder="Enter Category">
    <input type="text" name="price" placeholder="Price in Liter">
    <input type="text" name="qty" placeholder="Enter available Qty">
    <input class="bg-green-500 rounded px-3" type="submit" value="Create">
  </form>
</div>
@endsection