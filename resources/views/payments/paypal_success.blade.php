<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment Success</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-900 text-white">

    <div class="bg-white text-gray-800 shadow-lg rounded-lg p-8 max-w-md w-full text-center">
        <h2 class="text-3xl font-bold mb-4 text-green-500">Payment Successful!</h2>

        @if(session('success'))
            <p class="text-lg text-green-600 font-semibold mb-6">
                {{ session('success') }}
            </p>
        @endif

        <a href="{{ route('paypal_payment') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
            Back to Home
        </a>
    </div>

</body>
</html>
