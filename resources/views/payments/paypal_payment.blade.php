<x-app-layout>
    <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Payment</title>
                <script src="https://cdn.tailwindcss.com"></script>
            </head>
            <body>
                <div class="h-screen flex items-center justify-center bg-gray-900">
                    <div class="bg-white shadow-lg rounded-lg p-8 max-w-sm w-full">
                        <h2 class="text-2xl font-bold mb-2">Product: <span class="text-blue-600">Laptop</span></h2>
                        <h3 class="text-lg text-gray-700 mb-4">Price: <span class="font-bold text-green-500">$10</span></h3>

                        <form action="{{ route('paypal') }}" method="post" class="space-y-4">
                            @csrf
                            <input type="hidden" name="price" value="10">
                            <input type="hidden" name="product_name" value="Laptop">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit"
                                    class="bg-blue-500 text-white w-full py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                                Pay With Paypal
                            </button>
                        </form>
                    </div>
                </div>
            </body>
        </html>
</x-app-layout>
