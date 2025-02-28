<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancelled</title>
</head>
<body>
    <h2>Payment Cancelled</h2>
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <a href="{{ route('paypal_payment') }}">Try Again</a>
</body>
</html>
