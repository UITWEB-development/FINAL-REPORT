@props(['name'])

<div class="text-red-600" {{ $attributes }}>@error($name) {{ $message }} @enderror</div>