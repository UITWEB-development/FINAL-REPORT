<div>
    <p>Hello {{ auth()->user()->name}}</p>
    <livewire:signout signin_route="/user/sign-in"></livewire:signout>
</div>
