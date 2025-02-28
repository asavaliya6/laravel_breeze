<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment</title>
</head>
<body>
    <h2>Product: Laptop</h2>
    <h3>Price: $10</h3>

    <form action="{{route('paypal')}}" method="post">
        @csrf
        <input type="hidden" name="price" value="10">
        <input type="hidden" name="product_name" value="Laptop">
        <input type="hidden" name="quantity" value="1">
        <button type="submit">Pay With Paypal</button>
    </form>
</body>
</html>
