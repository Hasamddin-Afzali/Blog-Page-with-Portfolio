<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="/ckeditor/ckeditor.js"></script>
    <title>@yield('title')</title>
</head>

<body class="bg-gray-100">

    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-48 p-4">
            <p class="text-xl bg-gray-700 p-4 font-semibold mb-4">Admin Panel</p>
            <ul class="space-y-2">
                <li><a href="{{ route('admin.dashboard') }}" class="flex items-center hover:bg-gray-700 p-2"><i class="fas fa-home text-sm mr-2"></i>Dashboard</a></li>
                <li><a href="{{ route('admin.blog') }}" class="flex items-center hover:bg-gray-700 p-2"><i class="fas fa-file-alt text-sm mr-2"></i>Blog</a></li>
                <li><a href="{{ route('admin.category') }}" class="flex items-center hover:bg-gray-700 p-2"><i class="fas fa-tags text-sm mr-2"></i>Categories</a></li>
                <li><a href="{{ route('admin.projects') }}" class="flex items-center hover:bg-gray-700 p-2"><i class="fas fa-project-diagram text-sm mr-2"></i>Projects</a></li>
                <li><a href="{{ route('admin.allUsers') }}" class="flex items-center hover:bg-gray-700 p-2"><i class="fas fa-users text-sm mr-2"></i>Users</a></li>
                <li><a href="{{ route('admin.contacts') }}" class="flex items-center hover:bg-gray-700 p-2"><i class="fas fa-envelope text-sm mr-2"></i>Contact</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <div class="flex justify-between items-center bg-gray-700 p-2 h-16">
                <div>
                    <span class="text-xl font-semibold text-gray-300">CMS | Welcome !</span>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Profile dropdown -->
                    <div class="relative inline-block text-left">
                        <button type="button" class="inline-flex items-center justify-center w-10 h-10 rounded-full focus:outline-none focus:ring focus:border-blue-300" id="user-menu-button">
                            <span class="sr-only">Open user menu</span>
                            <img src="/img/gamer.png" alt="Avatar" class="rounded-full w-8 h-8">
                        </button>

                        <!-- Dropdown content -->
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Dropdown items go here -->
                            <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item1">Profile</a>
                            <a href="{{route('admin.logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item3">Logout</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Main content goes here -->
            <div class="content">
                @yield('content')
            </div>

        </div>
    </div>
    <script>
        // JavaScript to handle the profile dropdown
        document.getElementById('user-menu-button').addEventListener('click', function() {
            var dropdown = document.getElementById('user-menu-button').nextElementSibling;
            dropdown.classList.toggle('hidden');
        });
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById('user-menu-button').nextElementSibling;
            if (!event.target.closest('.relative')) {
                dropdown.classList.add('hidden');
            };
        });
    </script>

</body>
</html>
