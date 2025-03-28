<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('QR Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p><strong>Name:</strong> {{ $qrProduct->name }}</p>
                <p><strong>QR Code Data:</strong> {{ $qrProduct->qr_code }}</p>
                <p><strong>Quantity:</strong> {{ $qrProduct->quantity }}</p>
                <p><strong>Price:</strong> {{ $qrProduct->price }}</p>

                <h4 class="mt-4">QR Code:</h4>
                {!! $qrCode !!}

                <br/>
                <button onclick="window.print()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg transition-all">Print QR Code</button>

                <a href="{{ route('qr_products.index') }}" class="bg-blue-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg transition-all">Back to Products</a>
            </div>
        </div>
    </div>
</x-app-layout>
