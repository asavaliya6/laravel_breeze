<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Format</title>
</head>
<body>

    <h2>Original Date: {{ $date }}</h2>
    <h3>Formatted Date (d-m-Y): {{ $date->format('d-m-Y') }}</h3>
    <h3>Formatted Date (m/d/Y): {{ $date->format('m/d/Y') }}</h3>
    <h3>Formatted Date (d M, Y): {{ $date->format('d M, Y') }}</h3>

    @if(isset($user))
        <p>User Registered On: {{ $user->created_at_formatted }}</p>
    @else
        <p>No user found.</p>
    @endif

</body>
</html>
