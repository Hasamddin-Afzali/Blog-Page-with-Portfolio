<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://images.pexels.com/photos/276452/pexels-photo-276452.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Arial', sans-serif;
        }
    </style>
    <title>Forgotten Password</title>
</head>
<body>

    <div class="bg-white p-4 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Forgot Password</h1>

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="form-label text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
        </div>

        <!-- Login Button -->
        <button class="btn btn-primary w-full">Send Password</button>
    
        <div class="my-6 text-left">
            <a href="{{ route('login') }}" class="text-sm text-blue-500">Login Now?</a>
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
