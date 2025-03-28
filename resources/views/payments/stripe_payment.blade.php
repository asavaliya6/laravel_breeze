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
            <div class="h-screen flex items-center justify-center bg-gray-900 text-white">
                <div class="bg-white text-gray-800 shadow-lg rounded-lg p-8 max-w-md w-full text-center">
                    <h2 class="text-3xl font-bold mb-4">
                        Product: <span class="text-blue-600">Phone</span>
                    </h2>
                    <h3 class="text-lg text-gray-700 mb-4">
                        Price: <span class="font-bold text-green-500">$10</span>
                    </h3>

                    <form action="{{ route('stripe') }}" method="post" class="space-y-4">
                        @csrf
                        <input type="hidden" name="price" value="10">
                        <input type="hidden" name="product_name" value="Phone">
                        <input type="hidden" name="quantity" value="1">

                        <button type="submit"
                            class="bg-purple-500 text-white w-full py-2 px-4 rounded-lg hover:bg-purple-600 transition">
                            Pay With Stripe
                        </button>
                    </form>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>
