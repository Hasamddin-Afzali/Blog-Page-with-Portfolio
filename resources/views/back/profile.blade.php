@extends('back.layouts.master')
@section('title', 'Dashboard')
@section('content')

<div class="bg-gray-100">
    <!-- Profile Form -->
    <div class="bg-white p-2 rounded-md shadow-md">
        <h3 class="text-lg font-semibold p-4 bg-dark text-light"><i class="fas fa-user text-warning"></i>
            @yield('title')</h3>
        <!-- Profile Form Content -->
        <form action="{{ route('admin.changePassword') }}" method="POST" class="p-4 bg-light">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                    value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" class="form-control" readonly>
            </div>
            <div class="mb-4">
                <label for="currentPassword" class="form-label">
                    Current Password<span class="text-danger">{{ $errors->first('currentPassword') ? '*' : '' }}</span>
                </label>
                <input type="password" id="currentPassword" name="currentPassword"
                    placeholder="Enter your current password" class="form-control">
            </div>
            <div class="mb-4">
                <label for="newPassword" class="form-label">
                    New Password<span class="text-danger">{{ $errors->first('newPassword') ? '*' : '' }}</span>
                </label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Enter your new password"
                    class="form-control">
            </div>
            <div class="mb-4">
                <label for="newPasswordConfirm" class="form-label">
                    Confirm Password<span
                        class="text-danger">{{ $errors->first('newPasswordConfirm') ? '*' : '' }}</span>
                </label>
                <input type="password" id="newPasswordConfirm" name="newPasswordConfirm"
                    placeholder="Enter your new password again" class="form-control">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>

    </div>
</div>

<script>
    var newPassword = document.getElementById('newPassword');
    var confirm = document.getElementById('newPasswordConfirm');
    confirm.addEventListener('change', function() {
        if (newPassword.value != confirm.value) {
            newPassword.classList.remove('border-gray-300');
            newPassword.classList.remove('focus:ring-indigo-500');
            newPassword.classList.add('border-red-400');
            newPassword.classList.add('focus:ring-red-500');
            confirm.classList.remove('border-gray-300');
            confirm.classList.remove('focus:ring-indigo-500');
            confirm.classList.add('border-red-400');
            confirm.classList.add('focus:ring-red-500');
        } else {
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

@endsection