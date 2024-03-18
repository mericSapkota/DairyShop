@extends('layouts.app')
@section('content')
<div class="text-white">
  <div class="flex  justify-around">
    <div>
      <fieldset>
        <legend>Categories</legend>
        <div><a href="admin/products/add"><button class="px-3  bg-yellow-500 rounded">Add category </button> </a> </div>
        <div>
          <table>
            <tr class="gap-6 mx-5">
              <th class="mx-5">Milk Category </th>
              <th class="p-6">Price in Liter </th>
              <th>Qunatity in liter </th>
              <th class="p-6">Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($products as $p)
            <tr class="justify-center text-center ">
              <td>{{$p->type}}</td>
              <td>{{$p->price}}</td>
              <td>{{$p->qty}}</td>
              <td><a href="admin/products/edit/{{$p->id}}"> <button href="">Edit</button></a></td>
              <form action="admin/products/delete/{{$p->id}}" method="post">
                @csrf
                @method('delete')
                <td><button type="submit">Delete</button></td>
              </form>
            </tr>
            @endforeach

          </table>
      </fieldset>
    </div>

    <div>
      @php
      dd($products)
      @endphp
      @include('components.payment', ['show' => false, 'payment' => $payment])

      <h1>Confirm Order</h1>
      <table class="my-5">
        <tr class="p-4">
          <th class="p-6">Id</th>
          <th>Name</th>
          <th>Amount</th>
          <th class="p-6">TimeStamp</th>
          <th>Status</th>


        </tr>
        @foreach($payment as $p)
        <tr class="text-center">
          <td>{{$p->id}}</td>
          <td>{{$p->user->name}}</td>
          <td>{{$p->amount}}</td>
          <td>{{$p->created_at}}</td>
          <td>
            <select class="text-black  py-0 bg-slate-300 rounded " name="mode" id="">
              <option value="{{$p->id}}">{{$p->mode}} </option>
            </select>
            <a href="/editstatus/{{$p->id}}"><button class="px-3  bg-yellow-500 rounded">Change</button></a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>


</div>
@endsection