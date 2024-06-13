<div class="w-full h-[85.8vh] p-7 overflow-y-auto">
    <div class="flex justify-between items-center py-4 border-b border-gray-200 ">
        <span class="text-lg md:text-2xl font-semibold ">#{{$order->code}}</span>
        <div class="flex items-center space-x-2">
            <span class="text-xs md:text-sm text-gray-500">{{$order->created_at->format('l, d/m/Y, H:i')}}</span>
            <button tabindex="-1" wire:click="$dispatch('closeModal')" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div>
        @foreach ($order->order_details as $order_detail)
        <div class="flex flex-row justify-between items-end gap-3 py-4">
            <div class="flex items-center">
                <img src="{{ asset('storage/'.$order_detail->product->image_path) }}" alt="Food Image"
                    class="w-20 h-20 mr-4 block">
                <div class="flex-1">
                    <h2 class="text-xl md:text-lg font-semibold">{{$order_detail->product->name}}</h2>
                    <span class="text-gray-500 text-sm md:text-base">{{ number_format($order_detail->price, 0, ',', '.') }} VND</span>
                    <div class="text-xl md:text-base">SL: {{$order_detail->qty}}</div>
                </div>
            </div>
            <div class="font-semibold text-base md:text-lg text-nowrap">{{ number_format($order_detail->price * $order_detail->qty, 0, ',', '.') }} VND</div>
        </div>
        @endforeach
    </div>

    <div class="border-t-2  border-black"></div>

    <div class="font-bold flex flex-col gap-3 py-3">
        <div class="flex justify-between">
            <div class="lg:text-2xl sm:text-lg text-sm">Shipping</div>
            <div class="lg:text-2xl sm:text-lg text-sm">{{ number_format(30000, 0, ',', '.') }} VND</div>
        </div>
        <div class="text-red-600 flex justify-between">
            <div class="lg:text-2xl sm:text-lg text-sm">Total</div>
            <div class="lg:text-2xl sm:text-lg text-sm">{{ number_format($order->total, 0, ',', '.') }} VND</div>
        </div>
        <div class="flex justify-between">
            <div class="lg:text-2xl sm:text-lg text-sm">Payment method</div>
            <div class="lg:text-2xl sm:text-lg text-sm">{{Str::upper($order->payment_method)}}</div>
        </div>
        <div class="flex justify-between">
            <div class="lg:text-2xl sm:text-lg text-sm">Status</div>
            <div class="lg:text-2xl sm:text-lg text-sm">{{$order->status}}</div>
        </div>
    </div>


    <div class="border-t-2 mt-2 border-black"></div>

    <div class="text-lg flex flex-col gap-3 py-3">
        <div class="flex justify-between">
            <div class="font-bold lg:text-2xl sm:text-lg text-sm">Customer</div>
            <div class="sm:text-lg text-sm break-words">{{$order->user->name}}</div>
        </div>
        <div class="flex justify-between"> 
            <div class="font-bold lg:text-2xl sm:text-lg text-sm">Address</div>
            <div class="sm:text-lg text-sm break-words">{{ $order->order_address->address }},
                {{ $order->order_address->ward->name }},
                {{ $order->order_address->ward->district->name }},
                {{ $order->order_address->ward->district->province->name }}</div>
        </div>
        <div class="flex justify-between">
            <div class="font-bold lg:text-2xl sm:text-lg text-sm">Phone number</div>
            <div class="sm:text-lg text-sm break-words">{{$order->order_address->phone_number}}</div>
        </div>
        <div class="flex justify-between">
            <div class="font-bold lg:text-2xl sm:text-lg text-sm">Email</div>
            <div class="sm:text-lg text-sm break-words">{{$order->user->email}}</div>
        </div>
    </div>
    

</div>
