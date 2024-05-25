<div class="flex flex-col justify-center items-center h-[85.8vh] bg-[#f7ebd3]">
    <form wire:submit="signup" class="w-[80%] md:w-[60%] lg:w-[70%] xl:w-[38.46%] max-h-[90%] bg-[#fadaa3] aspect-[1047/997] p-[3.5cqmin] rounded-2xl flex flex-col gap-[2cqmin]">
        <h1 class="text-center font-extrabold text-[5cqmin]">SIGN UP</h1>
        

        <livewire:toast></livewire:toast>

        
        {{-- NAME --}}
        <div>
            <div class="flex flex-col w-full">
                <label for="name" class="block font-bold text-[2.5cqmin]">Name</label>
                <div class="relative flex items-center">
                    <input wire:model="name" type="text" name="name" id="name" required class="block w-full p-2 rounded-md border-gray-400 border-2 focus:outline-none focus:ring-0 focus:border-black pr-10 h-[5.9cqmin] text-[2.3cqmin]" placeholder="Name">
                    <div class="absolute right-2 bg-transparent flex items-center justify-center hover:text-blue-600" tabindex="-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[3cqmin] h-[3cqmin]">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Email --}}
        <div>
            <div>
                <label for="email" class="block font-bold text-[2.5cqmin]">Email</label>
                <input wire:model="email" type="email" name="email" id="email" class="block w-full p-2 rounded-md border-gray-400 border-2 h-[5.9cqmin] text-[2.3cqmin]" required placeholder="Email">
            </div>
        </div>
        

        {{-- PASSWORD --}}
        <div>
            <x-input-password title="Password" name="password" wire:model="password" label_class="block font-bold text-[2.5cqmin]" input_class="block w-full p-2 rounded-md border-gray-400 border-2 h-[5.9cqmin] text-[2.3cqmin]"></x-input-password>
        </div>
    
        {{-- CONFIRM PASSORD --}}
        <div>
            <x-input-password title="Confirm password" name="password_confirmation" wire:model="password_confirmation" label_class="block font-bold text-[2.5cqmin]" input_class="block w-full p-2 rounded-md border-gray-400 border-2 h-[5.9cqmin] text-[2.3cqmin]"></x-input-password>
        </div>
        
        {{-- SIGN UP --}}
        <div>
            <label for="email" class="block font-bold text-[2cqmin] select-none">&nbsp;</label>
            <input type="submit" value="Sign up" class="flex items-center justify-center w-full rounded-md border-2 font-bold bg-[#cd853f] outline-none border-none text-white hover:bg-blue-700 h-[5.9cqmin] text-[2.5cqmin]">
        </div>


        <div class="text-center text-[2.5cqmin] text-nowrap">   
            <p>Already have an account? <a href="sign-in" class="text-blue-700 font-bold">Sign in now</a></p>
        </div>
    </form>
</div>