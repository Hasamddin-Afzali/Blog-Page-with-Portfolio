<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="/ckeditor/ckeditor.js"></script>
    
    <!-- <title>@yield('title')</title> -->
</head>

<body class="bg-gray-100 body">

<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-4 vh-100 sticky-top" style="width: 250px;">
        <a href=""><img src="{{asset('/img/logo.png')}}" alt="" class="w-100"></a><hr>
        <ul class="list-unstyled">
            <li> <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none d-flex align-items-center py-2"> <i class="fas fa-home w-25"></i> Dashboard </a> </li>
            <li> <a href="{{ route('admin.blog') }}"     class="text-white text-decoration-none d-flex align-items-center py-2"> <i class="fas fa-file-alt w-25"></i> Blog </a> </li>
            <li> <a href="{{ route('admin.category') }}" class="text-white text-decoration-none d-flex align-items-center py-2"> <i class="fas fa-tags w-25"></i> Categories</a></li>
            <li> <a href="{{ route('admin.projects') }}" class="text-white text-decoration-none d-flex align-items-center py-2"> <i class="fas fa-project-diagram w-25"></i> Projects</a> </li>
            <li> <a href="{{ route('admin.allUsers') }}" class="text-white text-decoration-none d-flex align-items-center py-2"> <i class="fas fa-users w-25"></i> Users</a> </li>
            <li> <a href="{{ route('admin.contacts') }}" class="text-white text-decoration-none d-flex align-items-center py-2"> <i class="fas fa-envelope w-25"></i> Contact</a> </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">
        <div class="d-flex justify-content-between align-items-center bg-dark p-2">
            <div>
                <span class="font-weight-bold text-secondary fw-bold">Welcom to the Hasamuddin.com CMS</span>
            </div>
            <div class="dropdown">
                <button class="btn btn-outline-warning dropdown-toggle" type="button" id="user-menu-button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/img/gamer.png" alt="Avatar" class="rounded-circle me-2" style="width: 32px; height: 32px;">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="user-menu-button">
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                </ul>
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
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
