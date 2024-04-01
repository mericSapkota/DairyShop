@extends('layouts.app')
@section('body')
<div class="text-black bg-white p-10 flex flex-col items-center gap-10">
  <p class="text-center text-3xl ">Add Products</p>
  <form class="flex flex-col w-80  " action="/admin" method="post" enctype="multipart/form-data">
    @csrf
    <input class="w-full" type="text" name="product_name" placeholder="Enter Product Name"><br>
    <label for="photo">Add photo</label>
    <input type="file" name="photo" accept="image/jpg, image/jpeg, image/png"><br>
    <input type="text" name="category" placeholder="Enter Category"><br>
    <input type="text" name="price" placeholder="Per Price"><br>
    <input type="text" name="qty" placeholder="Enter available Qty"><br>
    <div class="flex justify-center">
      <input class="bg-green-500 rounded px-3 py-2 w-1/4" type="submit" value="Create">
    </div>
  </form>
</div>
@endsection