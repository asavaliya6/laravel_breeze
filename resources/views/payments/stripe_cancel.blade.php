<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancelled</title>
</head>
<body>
    <h2>Payment Cancelled</h2>
    <p style="color: red;">Payment has been cancelled.</p>
    <a href="{{ route('stripe_payment') }}">Try Again</a>
</body>
</html>
