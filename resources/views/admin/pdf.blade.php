<!-- 
   PDF layout generated
   Very simple and direct
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacation Plan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Vacation Plan</h1>
    </div>
    <div class="details">
        <p><strong>Title:</strong> {{ $plan->title }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($plan->date)->format('Y/m/d') }}</p>
        <p><strong>Description:</strong> {{ $plan->description }}</p>
        <p><strong>Location:</strong> {{ $plan->locale }}</p>
        <p><strong>Created by:</strong> {{ $plan->user->firstName }}</p>
    </div>
</body>
</html>
