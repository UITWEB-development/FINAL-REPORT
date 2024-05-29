<div class="flex justify-center items-center h-[85.8vh] bg-[#f7ebd3]">
    <livewire:toast></livewire:toast>
    <form wire:submit="resetPassword" class="max-h-[80%] w-[80%] md:w-[50%] lg:w-[50%] xl:w-[38.46%] bg-[#fadaa3] aspect-[1000/900] px-[4.5cqmin] py-[3cqmin] rounded-2xl flex flex-col justify-center gap-[2.5cqmin] ">
        <h1 class="text-center font-extrabold text-[4cqmin]">RESET PASSWORD</h1>

        {{-- Email --}}
        <div>
            <div>
                <label for="email" class="block font-bold text-[2.6cqmin]">Email</label>
                <input wire:model="email" type="email" name="email" id="email" class="block w-full p-2 rounded-md border-gray-400 border-2 h-[5.9cqmin] text-[2.3cqmin]" required placeholder="Email">
            </div>
        </div>
        
        {{-- PASSWORD --}}
        <div>
            <x-input-password title="Password" name="password" wire:model="password" label_class="block font-bold text-[2.6cqmin]" input_class="block w-full p-2 rounded-md border-gray-400 border-2 h-[5.9cqmin] text-[2.3cqmin]" pattern=".{8,}" oninvalid="this.setCustomValidity('Password must be at least 8 characters long')" oninput="this.setCustomValidity('')"></x-input-password>
        </div>
    
        {{-- CONFIRM PASSWORD --}}
        <div>
            <x-input-password title="Confirm password" name="password_confirmation" wire:model="password_confirmation" label_class="block font-bold text-[2.6cqmin]" input_class="block w-full p-2 rounded-md border-gray-400 border-2 h-[5.9cqmin] text-[2.3cqmin]" pattern=".{8,}" oninvalid="this.setCustomValidity('Password must be at least 8 characters long')" oninput="this.setCustomValidity('')"></x-input-password>
        </div>
        
        <div class="mt-[3cqmin]">
            <input type="submit" value="Reset password" class="block w-full p-2 rounded-md border-2 text-[2.6cqmin] font-bold bg-[#cd853f] outline-none border-none text-white hover:bg-blue-700">
        </div>

    </form>
</div>
