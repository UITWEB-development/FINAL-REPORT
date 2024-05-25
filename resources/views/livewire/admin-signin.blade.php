<div class="flex flex-col justify-center items-center h-[85.8vh]">
    <livewire:toast></livewire:toast>
    <div class="bg-[#FADAA3] w-[80vw] md:w-[60.18vw] lg:w-[46.18vw] aspect-[482/320] py-5 px-12 rounded-xl my-10">
        <h1 class="text-center font-bold text-[6cqmin]">ADMIN PANEL</h1>
        <form wire:submit="signin" class="flex flex-col items-center gap-5" >
            <div class="w-full">
                <label for="email" class="font-extrabold text-[4cqmin]">Email</label>
                <div class="border-solid px-4 flex gap-5 items-center mt-2 relative txt_field">
                    <img src="{{ asset('assets/icon_user.png') }}" alt="User icon" class="block h-[5cqmin]">
                    <input wire:model="email" type="email" name="email" id="email"required class="w-full border-none bg-[#FADAA3] outline-none text-[5cqmin] peer">
                    <span class="absolute bottom-0 left-0 right-0 block before:content-[''] before:absolute before:top-full before:w-0 before:h-1 before:left-0 before:bg-[#CD853F] before:transition-all before:duration-500 peer-focus:before:w-full peer-hover:before:w-full"></span>
                </div>
            </div>
            <div class="w-full">
                <label for="password" class="font-extrabold text-[4cqmin]">Password</label>
                <div class="border-solid px-4 flex gap-5 items-center mt-2 relative txt_field">
                    <img src="{{ asset('assets/icon_key_password.png') }}" alt="Key icon" class="block h-[5cqmin]">
                    <input wire:model="password" type="password" name="password" id="password" required class="w-full border-none bg-[#FADAA3] outline-none text-[5cqmin] peer"> 
                    <span class="absolute bottom-0 left-0 right-0 block before:content-[''] before:absolute before:top-full before:w-0 before:h-1 before:left-0 before:bg-[#CD853F] before:transition-all before:duration-500 peer-focus:before:w-full peer-hover:before:w-full"></span>
                </div>
            </div>
            <div class="w-full flex justify-center ">
                <input type="submit" value="Sign in" class="block bg-[#cd853f] text-white text-center  aspect-[250/85] text-[4cqmin] rounded-lg cursor-pointer px-6 py-2 hover:bg-[#A6A6A6] hover:text-black" >
            </div>
        </form>
    </div>
</div>