<div class="flex justify-center items-center h-[85.8vh] bg-[#f7ebd3]">
    <livewire:toast></livewire:toast>
    <form wire:submit="resetPassword" class="w-[80%] md:w-[60%] lg:w-[70%] xl:w-[38.46%]  bg-[#fadaa3] aspect-[1000/900] p-[3.5cqmin] rounded-2xl flex flex-col gap-[2cqmin]">
        <h1 class="text-center font-extrabold text-[4cqmin]">RESET PASSWORD</h1>

        {{-- Email --}}
        <div>
            <div>
                <label for="email" class="block font-bold text-10xl">Email</label>
                <input wire:model="email" type="email" name="email" id="email" class="block w-full p-2 rounded-md border-gray-400 border-2" required placeholder="Email">
            </div>
        </div>
        
        {{-- PASSWORD --}}
        <div>
            <x-input-password 
            title="Password" name="password" wire:model="password"
            pattern=".{8,}"
            oninvalid="this.setCustomValidity('Password must be at least 8 characters long')" oninput="this.setCustomValidity('')"></x-input-password>
        </div>
    
        {{-- CONFIRM PASSORD --}}
        <div>
            <x-input-password 
            title="Confirm password" name="password_confirmation" wire:model="password_confirmation"
            pattern=".{8,}"
            oninvalid="this.setCustomValidity('Password must be at least 8 characters long')"
            oninput="this.setCustomValidity('')"
            ></x-input-password>
        </div>
        
        <div class="mt-[3cqmin]">
            <input type="submit" value="Reset password" class="block w-full p-2 rounded-md border-2 font-bold bg-[#cd853f] outline-none border-none text-white hover:bg-blue-700">
        </div>

    </form>
</div>