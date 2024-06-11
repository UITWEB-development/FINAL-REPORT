<div class="font-sans bg-gray-100">
    <div class="flex max-sm:flex-col gap-4 h-full">
        <div class="bg-white sm:h-screen sm:sticky sm:top-0 lg:min-w-[350px] sm:min-w-[300px]">
            <div class="relative h-full">
                <div class="p-4 pb-16 sm:overflow-auto sm:h-[calc(100vh-60px)]">
                    <div class="space-y-4">
                        @foreach ($cart as $row)
                            <div class="flex items-start gap-4">
                                <div class="w-32 h-28 max-lg:w-24 max-lg:h-24 flex p-2 shrink-0 bg-gray-300 rounded-md">
                                    <img src="{{ asset('storage/' . $row->model->image_path) }}"
                                        class="w-full object-contain" />
                                </div>
                                <div class="w-full">
                                    <h3 class="text-base ">{{ $row->model->name }}</h3>
                                    <ul class="text-xs space-y-1 mt-2">
                                        <li>Category <span class="float-right">{{$row->model->category->name}}</span></li>
                                        <li>Quantity <span class="float-right">{{ $row->qty }}</span></li>
                                        <li>Total Price <span
                                                class="float-right">{{ number_format($row->price * $row->qty, 0, ',', '.') }}
                                                VND</span></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="md:absolute md:left-0 md:bottom-0 bg-gray-800 w-full p-4">
                    <h4 class="flex flex-wrap gap-4 text-base text-white">Subtotal <span
                            class="ml-auto">{{ Cart::total(0, ',', '.') }} VND</span></h4>
                    <h4 class="flex flex-wrap gap-4 text-base text-white">Shipping <span
                            class="ml-auto">{{ number_format(30000, 0, ',', '.') }} VND</span>
                    </h4>
                    <hr>
                    <h4 class="flex flex-wrap gap-4 text-base text-white">Grand total <span
                            class="ml-auto">{{ number_format(Cart::total(0, '', '') + 30000, 0, ',', '.') }} VND</span>
                    </h4>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto w-full h-max rounded-md p-4 sticky top-0">
            <h2 class="text-xl font-bold text-gray-800">Complete your order</h2>
            <form wire:submit="order" class="mt-8">
                <div>
                    <h3 class="text-base font-semibold text-gray-800 mb-4">Personal Details</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="relative flex items-center">
                       {{--      <input type="text" placeholder="Name"
                                class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none" /> --}}
                            <p class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none">{{$user->name}}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                <path
                                    d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>



                        <div class="relative flex items-center">
                            {{-- <input type="email" placeholder="Email"
                                class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none" /> --}}
                            <p class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none">{{$user->email}}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 682.667 682.667">
                                <defs>
                                    <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                        <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                    <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                        d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                        data-original="#000000"></path>
                                    <path
                                        d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                        data-original="#000000"></path>
                                </g>
                            </svg>
                        </div>

                        <div class="relative flex items-center">
                            <input wire:model="phone_number" type="tel" placeholder="Phone Number"
                                class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none" required/>
                            <svg fill="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 64 64">
                                <path
                                    d="m52.148 42.678-6.479-4.527a5 5 0 0 0-6.963 1.238l-1.504 2.156c-2.52-1.69-5.333-4.05-8.014-6.732-2.68-2.68-5.04-5.493-6.73-8.013l2.154-1.504a4.96 4.96 0 0 0 2.064-3.225 4.98 4.98 0 0 0-.826-3.739l-4.525-6.478C20.378 10.5 18.85 9.69 17.24 9.69a4.69 4.69 0 0 0-1.628.291 8.97 8.97 0 0 0-1.685.828l-.895.63a6.782 6.782 0 0 0-.63.563c-1.092 1.09-1.866 2.472-2.303 4.104-1.865 6.99 2.754 17.561 11.495 26.301 7.34 7.34 16.157 11.9 23.011 11.9 1.175 0 2.281-.136 3.29-.406 1.633-.436 3.014-1.21 4.105-2.302.199-.199.388-.407.591-.67l.63-.899a9.007 9.007 0 0 0 .798-1.64c.763-2.06-.007-4.41-1.871-5.713z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>
                    </div>
                </div>


                <div class="mt-8">
                    <h3 class="text-base font-semibold text-gray-800 mb-4">Shipping Address</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <input wire:model="address" type="text" placeholder="Address"
                            class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none" required/>

                        {{-- Provinces select menu --}}
                        <select wire:model.live="selectedProvince"
                            class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none">
                            <option value="-1">Select a province...</option>
                            @foreach (\App\Models\Province::all() as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>

                        {{-- Districts dependent select menu --}}
                        <select wire:model.live="selectedDistrict" wire:key="{{ $selectedProvince }}"
                            class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none">
                            <option value="-1">Select a district...</option>
                            @foreach (\App\Models\District::whereProvinceId($selectedProvince)->get() as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>

                        {{-- Wards dependent select menu --}}
                        <select wire:model.live="selectedWard" wire:key="{{ $selectedDistrict }}"
                            class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border-b focus:border-gray-800 outline-none"
                            >
                            <option value="-1">Select a ward...</option>
                            @foreach (\App\Models\Ward::whereDistrictId($selectedDistrict)->get() as $ward)
                              <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-base font-semibold text-gray-800 mb-4">Payment method</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <input type="radio" value="cod" class="w-5 h-5 cursor-pointer" wire:model="payment_method"/>
                            <label for="card" class="ml-4 flex gap-2 cursor-pointer justify-center">
                                <img class="block" src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=6" alt="Cash on delivery">
                                <p class="flex items-center">Cash on delivery (COD)</p>
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input type="radio" value="payos" class="w-5 h-5 cursor-pointer" wire:model="payment_method"/>
                            <label for="card" class="ml-4 flex gap-2 cursor-pointer justify-center">
                                <img class="block w-14 h-12" src="https://payos.vn/docs/img/logo.svg" alt="Cash on delivery">
                                <p class="flex items-center">VietQR</p>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex gap-4 max-md:flex-col mt-8">
                        <a href="cart"
                            class="rounded-md px-4 py-3 w-full text-sm font-semibold bg-transparent hover:bg-gray-100 border-2 text-gray-800 max-md:order-1 text-center">Return
                            to cart</a>
                        <button type="submit"
                            class="rounded-md px-4 py-3 w-full text-sm font-semibold bg-gray-800 text-white hover:bg-gray-900">Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
