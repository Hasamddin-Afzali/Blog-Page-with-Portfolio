@extends('back.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <!-- Dashboard Content -->
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <title>Your Admin Panel</title>
</head>

<body class="bg-gray-100">
    <!-- Your existing HTML code here -->

    <div class="flex-1 p-4">
        <!-- Add Blog Form -->
        <div class="bg-white p-4 rounded-md shadow-md">
            <h2 class="text-lg font-semibold mb-4">Add Blog</h2>
            <!-- Blog Form Content -->
            <form action="#" method="POST">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" id="title" name="title" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
            <select id="category" name="category" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" selected disabled>Select category</option>
                <option value="technology">Technology</option>
                <option value="fashion">Fashion</option>
                <option value="food">Food</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
            <!-- Replace the textarea with CKEditor -->
            <textarea id="id_content" name="content" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>
        <div class="flex justify-between">
            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Blog</button>
            <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Show All Blogs</button>
        </div>
    </form>

    <!-- Initialize CKEditor on the content textarea -->
    <script>
        console.log(CKEDITOR);

        try {
            CKEDITOR.replace('id_content');
            } catch (error) {
                // Code to handle the error
                // You can log the error or perform any other action
                console.error("An error occurred:", error.message);
}

    </script>
</body>

</html>

@endsection