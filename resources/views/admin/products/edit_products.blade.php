@extends('layouts.app')
@section('body')
<div class="bg-white container mx-auto p-10 h-1wh">
  <h1 class="text-center text-3xl">Edit Products</h1>
  <div class="text-white flex justify-center">
    <form class=" flex flex-col  py-10  w-80 text-black" action="/update/qty/{{$farmer->id}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('patch')

      <label for="product_name">Product Name</label>
      <input type="text" name="product_name" value="{{$farmer->product_name}}"><br>


      <label for="category">Category</label>
      <input type="text" name="category" placeholder="Category" value="{{$farmer->category}}"><br>


      <label for="price">Price</label>
      <input type="text" name="price" placeholder="Price in Liter" value="{{$farmer->price}}"><br>

      <label for="qty">Available Quantity</label>
      <input type="text" name="qty" placeholder="Quantity" value="{{$farmer->qty}}">
      <br>
      <label for="photo">Product Picture</label>
      <input type="file" name="photo">
      <br>
      <input type="submit" class="bg-yellow-500 rounded px-3 py-2" value="Update">

    </form>
  </div>

</div>
@endsection