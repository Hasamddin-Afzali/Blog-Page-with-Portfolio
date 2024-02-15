@extends('back.layouts.master')
@section('title', 'Contacts')
@section('content')

<div class="bg-gray-100">
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-lg font-semibold bg-gray-700 p-4 text-gray-300"> <i class="fas fa-envelope text-green-500"></i> @yield('title')</h2>
        <!-- Filter and Search -->
        <div class="flex items-end justify-between flex-row bg-gray-200 p-4">
            <div class="w-full mx-2">
                <label for="search" class="block text-gray-700 font-medium mb-2"><i class="fas fa-search"></i> Search</label>
                <input type="text" id="search" name="search" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"placeholder="Search...">
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-300 text-left">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Message</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td class="border px-4 py-2">{{$message->id}}</td>
                        <td class="border px-4 py-2">{{$message->email}}</td>
                        <td class="border px-4 py-2">{{$message->message}}</td>
                        <td class="border px-4 py-2">
                            <button type="button" onclick="openModal('{{addslashes($message->message)}}')" class="text-blue-500 rounded"><i class="fas fa-edit"></i> </button>  |
                            <form action="{{route('admin.deleteMessage')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$message->id}}">
                                <button onclick="return confirm('Are you sure to delete this message?')" class="text-red-500 rounded"><i class="fas fa-trash-alt"></i> </button>
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

<!-- Modal for adding user -->
<div id="addUserModal" class="fixed z-10 inset-0 overflow-y-auto hidden bg-gray-500 bg-opacity-75">
    <!-- Modal content -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-xl w-96" >
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="flex justify-end">
                <button id="createUserBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fas fa-plus"></i> CreateUser</button>
                <button id="closeModalBtn" onclick="closeModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ml-4">Close</button>
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
        modal.style.display = 'block';
    }
    // Function to close modal
    function closeModal() {
        modal.style.display = 'none';
    }


</script>
@endsection
