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

<body class="font-roboto-slab">
    {{-- Header here --}}
    
    {{ $slot }}
    @livewire('wire-elements-modal')
    <x-toaster-hub />
</body>

</html>
