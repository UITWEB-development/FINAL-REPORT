<div class="flex justify-center items-center h-[85.8vh]">
    <livewire:toast></livewire:toast>
    <div class="w-[80%] md:w-[60%] lg:w-[70%] xl:w-[38.6%]  bg-[#fadaa3] p-[3.5cqmin] rounded-xl flex flex-col gap-[2cqmin] max-h-[90%]">
        <form wire:submit="send">
            <h1 class="text-center font-[1000] text-[5cqmin]">FORGOT PASSWORD</h1>
            <p class="text-center text-[2.5cqmin]">Enter your email address & we’ll send you a link to reset your password</p>

            {{-- Email --}}
            <div class="mt-[3cqmin] mb-[4cqmin]">
                <div>
                    <label for="email" class="block font-bold text-[2.5cqmin]">Email</label>
                    <input wire:model="email" type="email" name="email" id="email" class="flex items-center justify-center w-full rounded-lg border-2 font-bold border-gray-400  h-[5.9cqmin] text-[2.5cqmin] pl-5" required placeholder="Email">
                </div>
            </div>

            {{-- Submit Button  --}}
            <div class ='mb-[4cqmin]'>
                <input type="submit" value="Send email" class="flex items-center justify-center w-full rounded-lg border-2 font-bold bg-[#cd853f] outline-none border-none text-white hover:bg-blue-700 h-[5.9cqmin] text-[2.5cqmin]">
            </div>

            <div class="text-center text-[2.5cqmin]">
                <p>Return to <a wire:click.prevent="returnSignin" href="" class="text-blue-700 font-bold">Sign in</a></p>
            </div>
        </form>
    </div>
</div>