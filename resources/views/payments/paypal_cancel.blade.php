<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancelled</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-900 text-white">

    <div class="bg-white text-gray-800 shadow-lg rounded-lg p-8 max-w-md w-full text-center">
        <h2 class="text-3xl font-bold mb-4 text-red-500">Payment Cancelled</h2>

        @if(session('error'))
            <p class="text-lg text-red-600 font-semibold mb-6">
                {{ session('error') }}
            </p>
        @endif

        <a href="{{ route('paypal_payment') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
            Try Again
        </a>
    </div>

</body>
</html>
