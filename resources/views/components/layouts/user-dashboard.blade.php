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
    <link href="https://unpkg.com/flowbite@2.0.1/css/flowbite.min.css" rel="stylesheet">
<script src="https://unpkg.com/flowbite@2.0.1/dist/flowbite.bundle.min.js"></script>

</head>

<body class="font-roboto-slab">
    <header class="bg-[#ECCC95] flex items-center justify-between md:h-20 lg:h-20 sm:h-20 px-4 md:px-4 lg:px-6 h-20">
        <div class="flex items-center">
            @svg('gouchill', 'bi bi-window-sidebar inline-block h-auto w-[150px] ')
        </div>
        <div class="flex items-center">
            <livewire:user-sign-out></livewire:user-sign-out>
        </div>
    </header>
        
    {{ $slot }}
    @livewire('wire-elements-modal')
    <x-toaster-hub />
</body>

</html>
