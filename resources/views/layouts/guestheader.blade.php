<div class="flex  justify-between px-5 py-3 bg-slate-100">
  <div>
    <img src="{{asset('/images/logo.png')}}" alt="">
  </div>
  <div class="flex gap-10 flex-around items-center   w-2xl">

    <a href="/home">Home</a>
    <a href="/shop">Products</a>
    <a href="">Contacts</a>

  </div>
  <div class="flex items-center gap-4">
    <div class="bg-yellow-300 rounded-full w-10 h-10 flex items-center justify-center">
      <i class="fa-solid fa-cart-shopping fa-lg"></i>
    </div>
    <div>
      <p>Cart: 0 Items</p>
      <p>$0.00</p>
    </div>
    <div class="antialiased flex justify-end">
      <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
      <a href="/register" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
    </div>
  </div>






</div>