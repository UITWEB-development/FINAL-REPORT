@props(['label', 'icon', 'route_name', 'route_active' => ''])

<a href="{{ Route::has($route_name) ? route($route_name) : '' }}"    
    class="flex items-center gap-3 rounded-lg px-4 py-2.5 font-semibold {{Route::is($route_active) ? 'bg-white shadow-sm shadow-slate-300/50' : 'hover:bg-white hover:shadow-sm hover:shadow-slate-300/50  active:bg-white/75 active:text-slate-800 active:shadow-slate-300/10'}}" {{ $attributes }}>
    @svg($icon, 'bi bi-people-fill inline-block h-4 w-4')
    <span>{{ $label }}</span>
</a>

