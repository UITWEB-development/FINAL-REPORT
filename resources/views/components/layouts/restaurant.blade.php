<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default title' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="icon" href="{{ asset('assets/gouchill.svg') }}">
</head>

<body class="font-roboto-slab">
    {{-- HEADER HERE --}}
    <nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false"
        class=" bg-[#eccc95] flex items-center justify-between gap-4 px-6 py-4 h-[75px]" aria-label="penguin ui menu">
        <!-- Brand Logo -->
        <a href="/" class="text-2xl  font-bold text-black dark:text-white  ">
            @svg('gouchill', 'h-10 w-36')
        </a>
        <!-- Desktop Menu -->
        <ul class="hidden items-center gap-4 flex-shrink-0 sm:flex justify-center">
            <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }" @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
                class="relative flex items-center">
                <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
                    @keydown.space.prevent="openWithKeyboard = true" @keydown.enter.prevent="openWithKeyboard = true"
                    @keydown.down.prevent="openWithKeyboard = true"
                    class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 dark:focus-visible:outline-blue-600"
                    aria-controls="userMenu">
                    @auth
                        @if (auth()->user()->image_path)
                            <img src="{{ asset('storage/' . auth()->user()->image_path) }}" alt="User Profile"
                                class="size-10 rounded-full object-cover" />
                        @else
                            @svg('zondicon-user-solid-circle', 'size-6 rounded-full object-cover')
                        @endif
                    @endauth
                    @guest
                        <p>Sign in</p>
                    @endguest

                </button>


                <!-- User Dropdown -->
                <ul x-cloak x-show="userDropDownIsOpen || openWithKeyboard" x-transition.opacity
                    x-trap="openWithKeyboard" @click.outside="userDropDownIsOpen = false, openWithKeyboard = false"
                    @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()"
                    id="userMenu"
                    class="absolute right-0 top-12 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-xl border border-slate-300 bg-slate-100 py-1.5 dark:border-slate-700 dark:bg-slate-800 z-50">
                    @auth
                        <li class="border-b border-slate-300 dark:border-slate-700">
                            <div class="flex flex-col px-4 py-2">
                                <span
                                    class="text-sm font-medium text-black dark:text-white">{{ auth()->user()->name }}</span>
                                <p class="text-xs text-slate-700 dark:text-slate-300">{{ auth()->user()->email }}</p>
                            </div>
                        </li>
                    @endauth
                    @guest
                        <li><a href="/user/sign-in?redirect_url=/"
                                class="block bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white">User</a>
                        </li>
                        <li><a href="/seller/sign-in?redirect_url=/"
                                class="block bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white">Seller</a>
                        </li>
                    @endguest
                    @auth
                        <li><a href="{{ route(auth()->user()->role->name . '.dashboard') }}"
                                class="block bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white">Account</a>
                        </li>
                        <livewire:nav-signout></livewire:nav-signout>
                    @endauth
                </ul>
            </li>
            <li class="relative flex items-center -top-2">
                <livewire:cart-nav :$restaurant></livewire:cart-nav>
            </li>
        </ul>
        <!-- Mobile Menu Button -->
        <div class="flex items-center justify-center sm:hidden gap-3">
            <button @click="mobileMenuIsOpen = !mobileMenuIsOpen" :aria-expanded="mobileMenuIsOpen"
                :class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button"
                class="flex text-slate-700 dark:text-slate-300 sm:hidden" aria-label="mobile menu"
                aria-controls="mobileMenu">
                <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                    aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                    aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="relative -top-2">
                <livewire:cart-nav :$restaurant></livewire:cart-nav>
            </div>
        </div>
        <!-- Mobile Menu -->
        <ul x-cloak x-show="mobileMenuIsOpen"
            x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
            x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0"
            x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
            x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full"
            class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col rounded-b-xl border-b border-slate-300 bg-slate-100 px-8 pb-6 pt-10 dark:border-slate-700 dark:bg-slate-800 sm:hidden">
            @auth
                <li class="mb-4 border-none">
                    <div class="flex items-center gap-2 py-2">
                        <img src="{{ asset('storage/' . auth()->user()->image_path) }}" alt="User Profile"
                            class="size-12 rounded-full object-cover" />
                        <div>
                            <span class="font-medium text-black dark:text-white">{{ auth()->user()->name }}</span>
                            <p class="text-sm text-slate-700 dark:text-slate-300">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </li>
            @endauth
            <hr role="none" class="my-2 border-outline dark:border-slate-700">
            @guest
                <li class="p-2"><a href="#" class="w-full text-slate-700 focus:underline dark:text-slate-300">User
                        sign in</a></li>
                <li class="p-2"><a href="#"
                        class="w-full text-slate-700 focus:underline dark:text-slate-300">Seller sign in</a></li>
            @endguest

            <!-- CTA Button -->
            @auth
                <li class="p-2"><a href="{{ route(auth()->user()->role->name . '.dashboard') }}"
                        class="w-full text-slate-700 focus:underline dark:text-slate-300">Account</a></li>
                <livewire:home-signout></livewire:home-signout>
            @endauth
        </ul>
    </nav>
    {{ $slot }}
    @livewire('wire-elements-modal')
    <x-toaster-hub />
</body>

</html>
