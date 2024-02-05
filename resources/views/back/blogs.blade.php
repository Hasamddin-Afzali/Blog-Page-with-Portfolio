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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <title>Your Admin Panel</title>
</head>

<body class="bg-gray-100">
    <!-- Your existing HTML code here -->

    <div class="flex-1 p-4">
        <!-- Add Blog Form -->
        <div class="bg-white p-4 rounded-md shadow-md">
            <h2 class="text-lg font-semibold mb-4">Add Blog</h2>
            <!-- Blog Form Content -->
            <form id="blog-form">
                <div class="mb-4">
                    <label for="blogTitle" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="blogTitle" name="blogTitle"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="blogCategory" class="block text-sm font-medium text-gray-700">Category</label>
                    <!-- Replace the options with your actual categories -->
                    <select id="blogCategory" name="blogCategory"
                        class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        <option value="1">Technology</option>
                        <option value="2">Lifestyle</option>
                        <option value="3">Travel</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="blogContent" class="block text-sm font-medium text-gray-700">Content</label>
                    <div id="blogContent" style="min-height: 200px;"></div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="button" onclick="submitBlog()" class="bg-blue-500 text-white p-2 rounded-md">Add
                        Blog</button>
                    <button type="button" onclick="showAllBlogs()"
                        class="text-blue-500 underline">Show All Blogs</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var quill = new Quill('#blogContent', {
            theme: 'snow',
            placeholder: 'Write something...',
        });

        // Function to handle blog submission (replace with actual submission logic)
        function submitBlog() {
            var blogTitle = document.getElementById('blogTitle').value;
            var blogCategory = document.getElementById('blogCategory').value;
            var blogContent = quill.root.innerHTML;

            // Perform your submission logic here (e.g., API request, form submission)
            console.log('Title:', blogTitle);
            console.log('Category:', blogCategory);
            console.log('Content:', blogContent);
        }

        // Function to show all blogs (replace with actual logic to display blogs in a table)
        function showAllBlogs() {
            // Perform logic to show all blogs (e.g., retrieve data from API, display in a table)
            console.log('Show All Blogs');
        }
    </script>
</body>

</html>

@endsection