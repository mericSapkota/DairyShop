<div class="flex  justify-between px-5 py-3 bg-slate-100">
  <div>
    <img src="{{asset('/images/logo.png')}}" alt="">
  </div>
  <div class="flex gap-10 flex-around items-center   w-2xl">

    <a href="">Home</a>
    <a href="">Products</a>
    <a href="">Contacts</a>

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
        foreach($or as $o)
        $total += $o->price * $o->qty;

        @endphp
        <p>${{$total}}</p>
      </div>
    </a>

    <div class="hidden sm:flex sm:items-center sm:ms-6">
      <x-dropdown align="right" width="48">
        <x-slot name="trigger">
          <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white  hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            <div>{{ Auth::user()->name }}</div>

            <div class="ms-1">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div>
          </button>
        </x-slot>

        <x-slot name="content">
          <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
          </x-dropdown-link>

          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-dropdown-link>
          </form>
        </x-slot>
      </x-dropdown>
    </div>
  </div>






</div>