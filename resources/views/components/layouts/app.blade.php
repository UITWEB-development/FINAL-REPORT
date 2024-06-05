<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="font-roboto-slab ">
    {{-- Header here --}}
    <nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false" class="flex items-center justify-between gap-4 px-6 py-4" aria-label="penguin ui menu">
      <!-- Brand Logo -->
      <a href="#" class="text-2xl font-bold text-black dark:text-white ">
        @svg('gouchill', 'h-10 w-36')
      </a>
      <!-- Search -->
      <div class="relative flex mr-auto w-full max-w-64 flex-col gap-1 text-slate-700 dark:text-slate-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-slate-700/50 dark:text-slate-300/50"> 
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
        <input type="search" name="search" placeholder="Search" aria-label="search" class="w-full rounded-xl border border-slate-300 bg-slate-100 py-2.5 pl-10 pr-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-orange-500" />
      </div>
      <!-- Desktop Menu -->
      <ul class="hidden items-center gap-4 flex-shrink-0 sm:flex">
        <li><a href="/" class="font-bold text-orange-600 underline-offset-2 hover:text-orange-600 focus:outline-none focus:underline dark:text-orange-600 dark:hover:text-orange-600" aria-current="page">Home</a></li>
        <li><a href="/about-us" class="font-medium text-slate-700 underline-offset-2 hover:text-blue-700 focus:outline-none focus:underline dark:text-slate-300 dark:hover:text-blue-600">About Us</a></li>
        <li><a href="/contact" class="font-medium text-slate-700 underline-offset-2 hover:text-blue-700 focus:outline-none focus:underline dark:text-slate-300 dark:hover:text-blue-600">Contact</a></li>
        <!-- User Pic -->
        <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }" @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false" class="relative flex items-center">
          <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen" @keydown.space.prevent="openWithKeyboard = true" @keydown.enter.prevent="openWithKeyboard = true" @keydown.down.prevent="openWithKeyboard = true" class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 dark:focus-visible:outline-blue-600" aria-controls="userMenu">
            @auth
              <img src="{{ asset('storage/'.auth()->user()->image_path) }}" alt="User Profile" class="size-10 rounded-full object-cover" />
            @endauth
            @guest
              <p>Sign in</p>
            @endguest
          </button>
          <!-- User Dropdown -->
          <ul x-cloak x-show="userDropDownIsOpen || openWithKeyboard" x-transition.opacity x-trap="openWithKeyboard" @click.outside="userDropDownIsOpen = false, openWithKeyboard = false" @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()" id="userMenu" class="absolute right-0 top-12 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-xl border border-slate-300 bg-slate-100 py-1.5 dark:border-slate-700 dark:bg-slate-800 z-50">
            @auth
              <li class="border-b border-slate-300 dark:border-slate-700">
                <div class="flex flex-col px-4 py-2">	
                  <span class="text-sm font-medium text-black dark:text-white">{{auth()->user()->name}}</span>
                  <p class="text-xs text-slate-700 dark:text-slate-300">{{auth()->user()->email}}</p>
                </div>
              </li>
            @endauth
            @guest
              <li><a href="/user/sign-in?redirect_url=/" class="block bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white">User</a></li>
              <li><a href="/seller/sign-in?redirect_url=/" class="block bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white">Seller</a></li>
            @endguest
            @auth
              <li><a href="#" class="block bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white">Account</a></li>
              <li><a href="#" class="block bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white">Sign Out</a></li>
            @endauth
          </ul>
        </li>
      </ul>
      <!-- Mobile Menu Button -->
      <button @click="mobileMenuIsOpen = !mobileMenuIsOpen" :aria-expanded="mobileMenuIsOpen" :class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-slate-700 dark:text-slate-300 sm:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
        <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
      <!-- Mobile Menu -->
      <ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col rounded-b-xl border-b border-slate-300 bg-slate-100 px-8 pb-6 pt-10 dark:border-slate-700 dark:bg-slate-800 sm:hidden">
        @auth
          <li class="mb-4 border-none">
            <div class="flex items-center gap-2 py-2">
              <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="User Profile" class="size-12 rounded-full object-cover"  />
              <div>
                <span class="font-medium text-black dark:text-white">Alice Brown</span>
                <p class="text-sm text-slate-700 dark:text-slate-300">alice.brown@gmail.com</p>
              </div>	
            </div>
          </li>
        @endauth
        <li class="p-2"><a href="#" class="w-full text-lg font-bold text-blue-700 focus:underline dark:text-blue-600" aria-current="page">Home</a></li>
        <li class="p-2"><a href="#" class="w-full text-lg font-medium text-slate-700 focus:underline dark:text-slate-300">About Us</a></li>
        <li class="p-2"><a href="#" class="w-full text-lg font-medium text-slate-700 focus:underline dark:text-slate-300">Contact</a></li>
        <hr role="none" class="my-2 border-outline dark:border-slate-700">
        @guest
        <li class="p-2"><a href="#" class="w-full text-slate-700 focus:underline dark:text-slate-300">User sign in</a></li>
        <li class="p-2"><a href="#" class="w-full text-slate-700 focus:underline dark:text-slate-300">Seller sign in</a></li>
        @endguest
        <li class="p-2"><a href="#" class="w-full text-slate-700 focus:underline dark:text-slate-300">Profile</a></li>
        <!-- CTA Button -->
        @auth
        <li class="mt-4 w-full border-none"><a href="#" class="rounded-xl bg-blue-700 px-4 py-2 block text-center font-medium tracking-wide text-slate-100 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0 dark:bg-blue-600 dark:text-slate-100 dark:focus-visible:outline-blue-600">Sign Out</a></li>
        @endauth
      </ul>
    </nav>
    {{ $slot }}
    @livewire('wire-elements-modal')
    <x-toaster-hub />
</body>

</html>
