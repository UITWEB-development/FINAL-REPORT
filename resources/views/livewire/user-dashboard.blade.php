<div>
    <livewire:toast></livewire:toast>
    @if(session()->has('success'))
        <script>
            window.onload = function() {
                window.toast('{{session()->get("success")}}', {type: "success", position: "top-right"})
            }
        </script>
    @endif
    <p>Hello {{ auth()->user()->name}}</p>
    <livewire:signout signin_route="/user/sign-in"></livewire:signout>
</div>
