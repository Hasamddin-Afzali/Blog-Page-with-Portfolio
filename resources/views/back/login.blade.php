<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Admin Login Page</title>
</head>
<body class="h-100 d-flex align-items-center justify-content-center vh-100" >

    <div class="bg-light p-5 rounded shadow-md ">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Admin Login Page</h1>
        <form action="{{route('admin.loginPost')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
            </div>

            <div class="mb-4 text-start">
                <a href="" class="text-sm text-primary">Forgot Password?</a>
            </div>
            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
