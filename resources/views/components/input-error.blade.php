@props(['name'])

<div class="text-red-600 text-[2cqmin]" {{ $attributes }}>@error($name) {{ $message }} @enderror</div>