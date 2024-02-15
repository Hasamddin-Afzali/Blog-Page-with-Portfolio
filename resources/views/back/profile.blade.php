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
            <form action="{{route('admin.changePassword')}}" method="POST" class="p-4 bg-gray-100">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" readonly>
                </div>
                <div class="mb-4">
                    <label for="currentPassword" class="block text-gray-700 font-medium mb-2">
                        Current Password<span class="text-red-600">{{$errors->first('currentPassword') ? '*':''}}</span>
                    </label>
                    <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter your current password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="newPassword" class="block text-gray-700 font-medium mb-2">
                        New Password<span class="text-red-600">{{$errors->first('newPassword') ? '*':''}}</span>
                    </label>
                    <input type="password" id="newPassword" name="newPassword" placeholder="Enter your new password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="newPasswordConfirm" class="block text-gray-700 font-medium mb-2">
                        Confirm Password<span class="text-red-600">{{$errors->first('newPasswordConfirm') ? '*':''}}</span>
                    </label>
                    <input type="password" id="newPasswordConfirm"  name="newPasswordConfirm" placeholder="Enter your new password again" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
            </form>
        </div>
    </div>
<script>
    var newPassword = document.getElementById('newPassword');
    var confirm = document.getElementById('newPasswordConfirm');
    confirm.addEventListener('change',function (){
        if(newPassword.value != confirm.value){
            newPassword.classList.remove('border-gray-300');
            newPassword.classList.remove('focus:ring-indigo-500');
            newPassword.classList.add('border-red-400');
            newPassword.classList.add('focus:ring-red-500');

            confirm.classList.remove('border-gray-300');
            confirm.classList.remove('focus:ring-indigo-500');
            confirm.classList.add('border-red-400');
            confirm.classList.add('focus:ring-red-500');
        }
        else {
            newPassword.classList.remove('border-red-400');
            newPassword.classList.remove('focus:ring-red-500');
            newPassword.classList.add('border-gray-300');
            newPassword.classList.add('focus:ring-indigo-500');

            confirm.classList.remove('border-red-400');
            confirm.classList.remove('focus:ring-red-500');
            confirm.classList.add('border-gray-300');
            confirm.classList.add('focus:ring-indigo-500');
        }

    });
</script>
</body>

@endsection
