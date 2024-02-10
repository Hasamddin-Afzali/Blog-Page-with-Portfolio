<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    
    <title>@yield('title', 'Domain.com')</title>
</head>
<body>
<div class="bg-black">
    <nav class="flex items-center justify-between p-4 bg-black lg:container lg:mx-auto lg:w-3/4">
        <div class="text-white font-bold text-lg"><span class="text-red-500 text-2xl">YourName</span>.com.tr</div>
        
        <!-- Desktop Menu -->
        <div class="lg:flex items-center hidden">
            <a href="{{ route('home') }}" class="text-white px-4 py-2 hover:bg-gray-800">Home</a>
            <a href="{{ route('blog') }}" class="text-white px-4 py-2 hover:bg-gray-800">Blog</a>
            <a href="{{ route('portfolio') }}" class="text-white px-4 py-2 hover:bg-gray-800">Portfolio</a>
            <a href="{{ route('contact') }}" class="text-white px-4 py-2 hover:bg-gray-800">Contact</a>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <div class="lg:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden bg-black">
        <a href="{{ route('home') }}" class="block text-white py-2 px-4 hover:bg-gray-800">Home</a>
        <a href="{{ route('blog') }}" class="block text-white py-2 px-4 hover:bg-gray-800">Blog</a>
        <a href="{{ route('portfolio') }}" class="block text-white py-2 px-4 hover:bg-gray-800">Portfolio</a>
        <a href="{{ route('contact') }}" class="block text-white py-2 px-4 hover:bg-gray-800">Contact Us</a>
    </div>
</div>
    

