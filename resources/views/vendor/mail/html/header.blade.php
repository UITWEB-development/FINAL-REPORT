@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Gouchill')
<img src="https://gouchill.sgp1.cdn.digitaloceanspaces.com/GOUCHILL.png" class="logo" alt="Gouchill Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
