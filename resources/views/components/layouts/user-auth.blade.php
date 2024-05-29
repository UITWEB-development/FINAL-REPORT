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
</head>

<body class="font-roboto-slab">
    <header class="bg-[#CD853F] flex items-center h-[14.2vh] w-screen">
        <a href="#" class="flex items-center p-2 w-full h-full gap-3">
            <img class="block w-auto h-full" src="{{ asset('assets/GOUCHILL.png') }}" alt="Gouchill website logo">
            <header class="font-bold text-white text-[5cqmin]">GOUCHILL</header>
        </a>
    </header>

    {{ $slot }}
    @livewire('wire-elements-modal')
</body>

</html>
