@extends('back.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <!-- Dashboard Content -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-4">
                <!-- All Posts Card -->
                <div class="bg-white p-4 rounded-md shadow-md">
                    <h2 class="text-lg font-semibold mb-4">All Posts</h2>
                    <!-- Placeholder content, replace with actual data -->
                    <p class="text-gray-600">Total Posts: 100</p>
                    <p class="text-gray-600">Published: 80</p>
                    <p class="text-gray-600">Drafts: 20</p>
                </div>

                <!-- All Categories Card -->
                <div class="bg-white p-4 rounded-md shadow-md">
                    <h2 class="text-lg font-semibold mb-4">All Categories</h2>
                    <!-- Placeholder content, replace with actual data -->
                    <p class="text-gray-600">Categories: 10</p>
                    <p class="text-gray-600">Most Popular: Technology</p>
                    <p class="text-gray-600">Least Popular: Lifestyle</p>
                </div>

                <!-- Graphs Card -->
                <div class="bg-white p-4 rounded-md shadow-md col-span-2">
                    <h2 class="text-lg font-semibold mb-4">Graphs</h2>
                    <!-- Placeholder content, replace with actual graphs using a library like Chart.js -->
                    <div class="w-full h-40 bg-gray-300 rounded-md mb-4"></div>
                    <div class="w-full h-40 bg-gray-300 rounded-md"></div>
                </div>
            </div>
@endsection