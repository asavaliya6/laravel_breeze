<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('QR Products List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('qr_products.create') }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                    Add New QR Product
                </a>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="py-2 px-4 border">Name</th>
                                <th class="py-2 px-4 border">QR Code</th>
                                <th class="py-2 px-4 border">Quantity</th>
                                <th class="py-2 px-4 border">Price</th>
                                <th class="py-2 px-4 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($qrProducts as $product)
                                <tr class="dark:hover:bg-gray-600 transition-all">
                                    <td class="py-2 px-4 border">{{ $product->name }}</td>
                                    <td class="py-2 px-4 border">{{ $product->qr_code }}</td>
                                    <td class="py-2 px-4 border">{{ $product->quantity }}</td>
                                    <td class="py-2 px-4 border">{{ number_format($product->price, 2) }}</td>
                                    <td class="py-2 px-4 border">
                                        <a href="{{ route('qr_products.show', $product->id) }}" 
                                           class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded">
                                            View QR Code
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
