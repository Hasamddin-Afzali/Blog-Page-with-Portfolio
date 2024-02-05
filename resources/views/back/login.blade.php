<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://images.pexels.com/photos/276452/pexels-photo-276452.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            height: 100vh; /* Set a minimum height for the body */
            margin: 0; /* Remove default margin */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white; /* Set text color to white or another suitable color */
            font-family: 'Arial', sans-serif; /* Set font family as needed */
}

    </style>
    <title>Admin Login Page</title>
</head>
<body class="h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Admin Login Page</h1>

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your email">
        </div>

        <!-- Password Input -->
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter your password">
        </div>

        <!-- Login Button -->
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 w-full">Login</button>
    </div>

</body>
</html>
