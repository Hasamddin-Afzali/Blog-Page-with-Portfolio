@extends('back.layouts.master')
@section('title', 'Dashboard')
@section('content')

<body class="bg-gray-100">
    <!-- Your existing HTML code here -->

    <div class="flex-1 ">
        <!-- Profile Form -->
        <div class="bg-white p-8 rounded-md shadow-md">
            <h2 class="text-lg font-semibold bg-gray-700 p-4 text-gray-300"><i class="fas fa-user text-green-500"></i> @yield('title')</h2>
            <!-- Profile Form Content -->
            <form action="#" method="POST" class="p-4 bg-gray-100">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" class="w-full px-4 py-2  border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection
