<div>
    <!-- component -->
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <section class="relative">
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
            <div class="absolute top-0 w-full h-full bg-center bg-cover group" style="background-image: url('https://th.bing.com/th/id/OIP.ZJ1xzTKdVbk6dH-iN3kFOgHaE8?w=720&h=480&rs=1&pid=ImgDetMain');">
                <div class="absolute inset-0 h-full w-full bg-black/65 flex flex-col justify-center items-center">
                    <div class="relative text-center">
                        <h2 class="block antialiased tracking-normal font-sans font-bold leading-[1.3] text-white mb-4 text-[5cqmin]">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        </h2>
                    </div>
                </div>
                <div class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-white transition group-hover:scale-110 group-hover:bg-[#da9858] group-hover:text-white group-active:scale-100 absolute top-4 right-4">
                    @svg('edit', 'hi-mini hi-play h-5 w-5')                      
                </div>
            </div>
        </div>
        <section class="-mt-24">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="pt-6 w-full md:w-4/12 px-4 text-center group">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg transition-transform transform group-hover:scale-105">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                    @svg('fas-phone-volume')
                                </div>
                                <h6 class="text-xl font-semibold">Phone number</h6>
                                <p class="mt-2 mb-4 text-blueGray-500">
                                    0987654321
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 px-4 text-center group">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg transition-transform transform group-hover:scale-105">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-lightBlue-400">
                                    @svg('fas-map-location-dot')
                                </div>
                                <h6 class="text-xl font-semibold">Address</h6>
                                <p class="mt-2 mb-4 text-blueGray-500">74b Hai Ba Trung, Ho Chi Minh, Viet Nam
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-6 w-full md:w-4/12 px-4 text-center group">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg transition-transform transform group-hover:scale-105">
                            <div class="px-4 py-5 flex-auto">
                                <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-400">
                                    @svg('gmdi-timer')
                                </div>
                                <h6 class="text-xl font-semibold">Time</h6>
                                <p class="mt-2 mb-4 text-blueGray-500">
                                    09h00 - 23h00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <livewire:google-map></livewire:google-map>
    </section>
</div>
