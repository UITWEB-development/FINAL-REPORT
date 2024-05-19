<div>
    <p>Hello {{ auth()->user()->name}}</p>
    <livewire:signout signin_route="/admin/sign-in"></livewire:signout>
</div>
