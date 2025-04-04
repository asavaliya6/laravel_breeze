<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-900 text-white">

    <div class="bg-white text-gray-800 shadow-lg rounded-lg p-8 max-w-md w-full text-center">
        <h2 class="text-3xl font-bold text-green-500 mb-4">Payment Successful!</h2>
        <p class="text-lg text-gray-700 mb-6">
            Your payment has been processed successfully.
        </p>

        <a href="{{ route('stripe_payment') }}"
           class="bg-blue-500 text-white w-full py-2 px-4 rounded-lg hover:bg-blue-600 transition">
            Back to Home
        </a>
    </div>

</body>
</html>
