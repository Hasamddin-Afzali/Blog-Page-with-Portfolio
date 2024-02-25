@extends('back.layouts.master')
@section('title', 'All Users')
@section('content')
<div>
    <div class="bg-white p-2 rounded-md shadow-md">
        <h3 class="text-lg font-semibold bg-dark p-4 text-light"> <i class="fas fa-users text-warning"></i> @yield('title')</h3>
        <!-- Filter and Search -->
        <div class="d-flex justify-content-between align-items-end flex-row my-4">
            <div class="w-75 mx-2">
                <label for="search" class="form-label text-gray-700 font-medium mb-2"><i class="fas fa-search"></i> Search</label>
                <input type="text" id="search" name="search"class="form-control" placeholder="Search...">
            </div>
            <div>
                <button id="addUserBtn" class="btn btn-warning"><i class="fas fa-plus"></i> Add User</button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <button onclick="openModalWithData('{{$user->id}}', '{{$user->first_name}}', '{{$user->last_name}}', '{{$user->email}}')" class="btn btn-success"><i class="fas fa-edit"></i></button>
                            <form action="{{route('admin.deleteUser')}}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button onclick="return confirm('Are You sure to delete')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{$users->links()}}
    </div>
</div>

<!-- Modal for adding user -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <!-- Modal content -->
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form id="userForm" method="POST">
                    @csrf <!-- CSRF protection token -->
                    <input type="hidden" name="id" id="userId">
                    <div class="mb-4">
                        <label for="first_name" class="form-label text-gray-700 font-medium mb-2">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="form-label text-gray-700 font-medium mb-2">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="auth" class="form-label text-gray-700 font-medium mb-2">Auth</label>
                        <select id="auth" name="auth" class="form-select">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" id="createUserBtn" class="btn btn-success"><i class="fas fa-plus"></i> Create User</button>
                        <button type="button" id="closeModalBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Get modal element
    var modal = document.getElementById('addUserModal');
    // Get button that opens the modal
    var btn = document.getElementById("addUserBtn");
    // Get close button
    var closeBtn = document.getElementById('closeModalBtn');

    // Listen for click on button
    btn.addEventListener('click', openModal);
    // Listen for click on close button
    closeBtn.addEventListener('click', closeModal);
    // Function to open modal
    function openModal() {
        document.getElementById('userForm').action = '{{route('admin.addNewUser')}}';
        document.getElementById('createUserBtn').innerHTML = '<i class="fas fa-plus"></i> Create User';
        document.getElementById('first_name').value = '';
        document.getElementById('last_name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        var myModal = new bootstrap.Modal(modal);
        myModal.show();
    }
    // Function to close modal
    function closeModal() {
        var myModal = new bootstrap.Modal(modal);
        myModal.hide();
    }

    function openModalWithData(id, firstName, lastName, email){
        document.getElementById('userForm').action = '{{route('admin.editUser')}}';
        document.getElementById('createUserBtn').innerHTML = '<i class="fas fa-save"></i> Save';
        document.getElementById('userId').value = id;
        document.getElementById('first_name').value = firstName;
        document.getElementById('last_name').value = lastName;
        document.getElementById('email').value = email;
        document.getElementById('password').value = '';
        var myModal = new bootstrap.Modal(modal);
        myModal.show();
    }
</script>
@endsection
