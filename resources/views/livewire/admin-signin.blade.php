<div class="flex justify-center items-center h-[85.8vh]">
    <div class="bg-[#FADAA3] w-[80vw] md:w-[60.18vw] lg:w-[46.18vw] aspect-[482/320] py-5 px-12 rounded-xl">
        <h1 class="text-center font-bold text-[6cqmin]">ADMIN PANEL</h1>
        <x-input-error name="error"></x-input-error>
        <form wire:submit="signin" class="flex flex-col items-center gap-5" >
            <div class="w-full">
                <label for="email" class="font-extrabold text-[4cqmin]">Email</label>
                <div class="border-solid border-b-2 border-black px-4 flex gap-5 items-center mt-2">
                    <img src="{{ asset('assets/icon_user.png') }}" alt="User icon" class="block h-[5cqmin]">
                    <input wire:model="email" type="email" name="email" id="email"required class="w-full border-none bg-[#FADAA3] outline-none text-[5cqmin]">
                </div>
            </div>
            <div class="w-full">
                <label for="password" class="font-extrabold text-[4cqmin]">Password</label>
                <div class="border-solid border-b-2 border-black px-4 flex gap-5 items-center mt-2">
                    <img src="{{ asset('assets/icon_key_password.png') }}" alt="Key icon" class="block h-[5cqmin]">
                    <input wire:model="password" type="password" name="password" id="password" required class="w-full border-none bg-[#FADAA3] outline-none text-[5cqmin]"> 
                </div>
            </div>
            <div class="w-full flex justify-center">
                <input type="submit" value="Sign in" class="block bg-[#cd853f] text-white text-center w-[34.72%] aspect-[250/85] text-[4cqmin] rounded-lg cursor-pointer hover:bg-[#e39a50] active:bg-[#e39a50]" >
            </div>
        </form>
    </div>
</div>