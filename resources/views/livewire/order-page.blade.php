<section class="py-5 relative">
    <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">


        <div class="my-5 flex justify-between">
            <h2 class="font-manrope font-bold text-3xl sm:text-4xl leading-10 text-black">
                Order status
            </h2>
            <a href="{{ route('restaurant.page', ['id' => $restaurant->id]) }}"
                class="font-manrope font-bold text-3xl sm:text-4xl leading-10 text-black hover:text-orange-500 active:text-orange-500">
                {{ $restaurant->restaurant_description->restaurant_name }}
            </a>
        </div>
        <h6 class="font-manrope text-2xl leading-9 text-black mb-3s">Order #{{ $order->code }}</h6>
        <h6 class="font-medium text-xl leading-8  mb-10">{{$order_messages[$order->status]}}</h6>

        <div>
            @foreach ($order->order_details as $order_detail)
                <div class="grid grid-cols-7 w-full pb-6 border-b border-gray-100">
                    <div class="col-span-7 min-[500px]:col-span-2 md:col-span-1">
                        <img src="{{ asset('storage/' . $order_detail->product->image_path) }}"
                            alt="Skin Care Kit image" class="w-full">
                    </div>
                    <div
                        class="col-span-7 min-[500px]:col-span-5 md:col-span-6 min-[500px]:pl-5 max-sm:mt-5 flex flex-col justify-center">
                        <div class="flex flex-col min-[500px]:flex-row min-[500px]:items-center justify-between">
                            <div class="">
                                <h5 class="font-manrope font-semibold text-2xl leading-9 text-black mb-6">
                                    {{ $order_detail->product->name }}
                                </h5>
                                <p class="font-normal text-xl leading-8 text-gray-500">Quantity : <span
                                        class="text-black font-semibold">{{ $order_detail->qty }}</span></p>
                            </div>

                            <h5 class="font-manrope font-semibold text-3xl leading-10 text-black sm:text-right mt-3">
                                {{ number_format($order_detail->price * $order_detail->qty, 0, ',', '.') }} VND
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="flex items-center justify-center sm:justify-end w-full my-6">
            <div class=" w-full">
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Subtotal</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">
                        {{ number_format($order->total - 30000, 0, ',', '.') }} VND</p>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Shipping</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">30.000 VND</p>
                </div>

                <div class="flex items-center justify-between py-6 border-y border-gray-100">
                    <p class="font-manrope font-semibold text-2xl leading-9 text-gray-900">Total</p>
                    <p class="font-manrope font-bold text-2xl leading-9 text-orange-600">
                        {{ number_format($order->total, 0, ',', '.') }} VND</p>
                </div>
            </div>
        </div>


        <div>
            <p class="font-manrope font-semibold text-2xl leading-9 text-gray-900 my-5">Order information</p>
            <div class=" w-full">
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Status</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">{{$order->status}}</p>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Customer name</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">{{$order->user->name}}</p>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Phone number</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">{{$order->order_address->phone_number}}</p>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Email</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">{{$order->user->email}}</p>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Address</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">{{$order->order_address->address}}, {{$order->order_address->ward->name}}, {{$order->order_address->ward->district->name}}, {{$order->order_address->ward->district->province->name}}</p>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Date</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">{{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y H:i:s')}}</p>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-500">Payment method</p>
                    <p class="font-semibold text-xl leading-8 text-gray-900">{{Str::upper($order->payment_method)}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
