<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Add New QR Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('qr_products.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Name:</label>
                            <input type="text" name="name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 dark:bg-gray-800 dark:text-white" required>
                        </div>

                        <div>
                            <label for="qr_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300">QR Code:</label>
                            <input type="text" name="qr_code" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 dark:bg-gray-800 dark:text-white" required>
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity:</label>
                            <input type="number" name="quantity" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 dark:bg-gray-800 dark:text-white" required>
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price:</label>
                            <input type="text" name="price" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 dark:bg-gray-800 dark:text-white" required>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" 
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg transition-all">
                                Add Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
