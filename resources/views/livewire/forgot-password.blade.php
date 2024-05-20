<div class="flex justify-center items-center h-[85.8vh]">
    <div class="w-[80%] md:w-[60%] lg:w-[70%] xl:w-[38.6%]  bg-[#fadaa3] aspect-[1000/705] p-[3.5cqmin] rounded-2xl flex flex-col">
        <form wire:submit="signin">
            <h1 class="text-center font-[1000] text-[5cqmin]">RESET PASSWORD</h1>
            <p class="text-center text-[2.5cqmin]">Enter your email address & we’ll send you a link to reset your password</p>
            @if (session('error'))
                <p class="text-red-600 text-center font-bold">{{ session('error') }}</p>
            @endif

        

            {{-- Email --}}
            <div class="mt-[3cqmin] mb-[6cqmin]">
                <div>
                    <label for="email" class="block font-extrabold text-[3cqmin]">Email</label>
                    <input wire:model="email" type="email" name="email" id="email" class="block w-full h-full p-3 rounded-lg border-gray-400 border-2 text-[2.5cqmin]" required placeholder="Email">
                </div>
                <x-input-error name="email"></x-input-error>
            </div>
            
            <div class="mb-[4cqmin]">
                <input type="submit" value="Send email" class="block w-full p-3 rounded-lg border-2 font-bold bg-[#cd853f] outline-none border-none text-white hover:bg-blue-700 text-[2.5cqmin]">
            </div>
        </form>


        <div>
            <div class="text-center">
                <p>Return to <a href="" class="text-blue-700 font-bold">Sign in</a></p>
            </div>
        </div>
    </div>
</div>