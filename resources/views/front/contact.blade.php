@extends('front.layouts.master')
@section('title', 'Contact')
@section('content')
<header class="bg-cover bg-center h-screen flex items-center text-white bg-no-repeat relative" style="width:100%;height:300px;background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/146.webp');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="container mx-auto text-center relative z-10">
        <h1 class="text-5xl font-bold mb-4"><span class="text-red-500">@yield('title')</span></h1>
    </div>
</header>
<div class="bg-gray-100">
    <div class="lg:container lg:mx-auto lg:w-3/4 ">
        <section class=" pt-20 flex flex-col md:flex-row ">
            <!-- Left Column - Contact Form -->
            <div class=" md:w-full p-8">
                <h2 class="text-xl text-gray-700 mb-7">Contact Us</h2>
                <!-- Contact Form -->
                <form action="#" method="post" class="space-y-4">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-600">Name:</label>
                        <input type="text" id="name" name="name" placeholder="Your Name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-600">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Your Email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-600">Message:</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline"> Submit </button>
                </form>
            </div>

            <!-- Right Column - Social Media Icons -->
            <div class=" md:w-full flex-row p-8">
                <h2 class="text-xl text-gray-700 mb-7">Connect With Us</h2>
                <div class="flex justify-center lg:justify-end space-x-4">
                    <!-- Replace the placeholder icons and links with your own -->
                    <a href="#" class="text-blue-500 hover:text-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <!-- Your social media icon goes here -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-blue-500 hover:text-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <!-- Your social media icon goes here -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 6v2m0-8l-3 3m6 0l3-3"></path>
                        </svg>
                    </a>
                    <!-- Add more social media icons as needed -->
                </div>
            </div>

        </section>
    </div>
</div>

@endsection