<div>
    <livewire:toast></livewire:toast>
    @if(session()->has('success'))
        <script>
            window.onload = function() {
                window.toast('{{session()->get("success")}}', {type: "success", position: "top-right"})
            }
        </script>
    @endif
    {{-- <h2 class="mb-2 text-3xl font-semibold">Dashboard</h2>
    <h3 class="mb-8 text-sm font-medium text-slate-500">
        Welcome {{auth()->user()->name}}, everything looks great!
    </h3> --}}
    

    {{-- test display profile_seller --}}
    <div class=""><livewire:seller-profile></livewire:seller-profile></div>
</div>
