@extends('back.layouts.master')
@section('title', 'Contacts')
@section('content')

<div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title bg-dark p-4 text-light"><i class="fas fa-envelope text-warning"></i> @yield('title')</h3>
            <!-- Filter and Search -->
            <div class="row bg-gray-200 my-4">
                <div class="col">
                    <label for="search" class="form-label"><i class="fas fa-search"></i> Search</label>
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="bg-gray-300 text-left">
                            <th>ID</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{$message->id}}</td>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->message}}</td>
                            <td>
                                <button type="button" onclick="openModal('{{addslashes($message->message)}}')" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                <form action="{{route('admin.deleteMessage')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$message->id}}">
                                    <button onclick="return confirm('Are you sure to delete this message?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            {{$messages->links()}}
        </div>
    </div>
</div>

<!-- Modal for adding user -->
<div id="addUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button id="createUserBtn" class="btn btn-success"><i class="fas fa-plus"></i> Create User</button>
                <button id="closeModalBtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Get modal element
    var modal = document.getElementById('addUserModal');

    // Function to open modal
    function openModal(messageBody) {
        document.getElementById('username').value = messageBody;
        var bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
    }

    // Function to close modal
    function closeModal() {
        var bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.hide();
    }
</script>
@endsection
