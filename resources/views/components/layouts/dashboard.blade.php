<!doctype html>
<!-- dir="rtl" for RTL support -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <title>{{ $title ?? 'Page Title' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    
    <style>
        [x-cloak] {
          display: none !important;
        }
    </style> 
</head>

<body class="font-roboto-slab">
    <div x-data="{ mobileSidebarOpen: false }">
        <!-- Page Container -->
        <div id="page-container" class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-white lg:ps-64">
            <!-- Page Sidebar -->
            <nav id="page-sidebar"
                class="fixed bottom-0 start-0 top-0 z-50 flex h-full w-80 flex-col overflow-auto bg-[#ECCC95] transition-transform duration-500 ease-out lg:w-64 ltr:lg:translate-x-0 rtl:lg:translate-x-0"
                x-bind:class="{
          'ltr:-translate-x-full rtl:translate-x-full': !mobileSidebarOpen,
          'translate-x-0': mobileSidebarOpen,
        }" aria-label="Main Sidebar Navigation" x-cloak>
                <!-- Sidebar Header -->
                <div class="flex h-20 w-full flex-none items-center justify-between px-8">
                    <!-- Brand -->
                    <a href=""
                        class="inline-flex items-center gap-2 text-lg font-bold tracking-wide text-slate-800 transition hover:opacity-75 active:opacity-100">
                        @svg('gouchill', 'bi bi-window-sidebar inline-block h-8 w-8')
                        <span>GOUCHILL</span>
                    </a>
                    
                    <!-- END Brand -->

                    <!-- Close Sidebar on Mobile -->
                    <div class="lg:hidden">
                        <button type="button"
                            class="flex h-10 w-10 items-center justify-center text-slate-400 hover:text-slate-600 active:text-slate-400"
                            x-on:click="mobileSidebarOpen = false">
                            <svg class="hi-solid hi-x -mx-1 inline-block h-5 w-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                    </div>
                    <!-- END Close Sidebar on Mobile -->
                </div>
                <!-- END Sidebar Header -->

                <!-- Main Navigation -->
                <div class="w-full grow space-y-3 p-4">
                    @foreach ($menu as $navItem)
                        <x-nav-item :label="$navItem['label']" :route_name="$navItem['route_name']" 
                        :route_active="$navItem['active_route']" :icon="$navItem['icon']"></x-nav-item>
                    @endforeach
                </div>
                <!-- END Main Navigation -->

                <!-- Sub Navigation -->
                <div class="w-full flex-none space-y-3 p-4">
                    <x-nav-item label="Settings" route_name="" route_active="" icon="settings"></x-nav-item>                    
                    <livewire:signout></livewire:signout>
                </div>
                <!-- END Sub Navigation -->
            </nav>
            <!-- Page Sidebar -->

            <!-- Page Header -->
            <header id="page-header"
                class="fixed end-0 start-0 top-0 z-30 flex h-20 flex-none items-center bg-white shadow-sm lg:hidden">
                <div class="container mx-auto flex justify-between px-4 lg:px-8 xl:max-w-7xl">
                    <!-- Left Section -->
                    <div class="flex items-center gap-2">
                        <!-- Toggle Sidebar on Mobile -->
                        <button type="button"
                            class="inline-flex items-center justify-center gap-2 rounded border border-slate-300 bg-white px-2 py-1.5 font-semibold leading-6 text-black shadow-sm hover:border-slate-300 hover:bg-slate-100 hover:text-black hover:shadow focus:outline-none focus:ring focus:ring-black active:border-white active:bg-white active:shadow-none"
                            x-on:click="mobileSidebarOpen = true">
                            <svg class="hi-solid hi-menu-alt-1 inline-block h-5 w-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- END Toggle Sidebar on Mobile -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Middle Section -->
                    <div class="flex items-center gap-2">
                        <!-- Brand -->
                        <a href=""
                            class="inline-flex items-center gap-2 text-lg font-bold tracking-wide text-slate-800 transition hover:opacity-75 active:opacity-100">
                            @svg('gouchill', 'bi bi-window-sidebar inline-block h-10 w-10')
                            <span>GOUCHILL</span>
                        </a>
                        <!-- END Brand -->
                    </div>
                    <!-- END Middle Section -->

                    <!-- Right Section -->
                    <div class="flex items-center gap-2 {{-- invisible --}}">
                        <!-- Settings -->
                        <a href=""
                            class="inline-flex items-center justify-center gap-2 rounded border border-slate-300 bg-white px-2 py-1.5 font-semibold leading-6 text-slate-800 shadow-sm hover:border-slate-300 hover:bg-slate-100 hover:text-slate-800 hover:shadow focus:outline-none focus:ring focus:ring-slate-500/25 active:border-white active:bg-white active:shadow-none">
                            <svg class="hi-solid hi-user-circle inline-block h-5 w-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <!-- END Toggle Sidebar on Mobile -->
                    </div>
                    <!-- END Right Section -->
                </div>
            </header>
            <!-- END Page Header -->

            <!-- Page Content -->
            <main id="page-content" class="flex max-w-full flex-auto flex-col pt-20 lg:pt-0">
                <!-- Page Section -->
                <div class="container mx-auto space-y-10 px-4 py-8 lg:space-y-16 lg:px-8 lg:py-12 xl:max-w-7xl">
                    {{$slot}}
                </div>
                <!-- END Page Section -->
            </main>
            <!-- END Page Content -->

            <!-- Page Footer -->
            <footer id="page-footer" class="flex grow-0 items-center border-t border-slate-100">
                <div
                    class="container mx-auto flex flex-col gap-2 px-4 py-6 text-center text-sm font-medium text-slate-600 md:flex-row md:justify-between md:gap-0 md:text-start lg:px-8 xl:max-w-7xl">
                    <div>© <span class="font-semibold">GOUCHILL</span></div>
                    <div class="inline-flex items-center justify-center">
                        <span>All rights reserved</span>
                    </div>
                </div>
            </footer>
            <!-- END Page Footer -->
        </div>
        <!-- END Page Container -->
    </div>
</body>

</html>