@extends('back.layouts.master')
@section('title', 'All Projects')
@section('content')
<script>

    @if(Session::has('addProjectSuccess'))
        alert('Project added successfully');
        {{Session::forget('addProjectSuccess')}}
    @elseif(Session::has('editProjectSuccess'))
        alert('Project edited successfully');
        {{Session::forget('editProjectSuccess')}}
    @elseif(Session::has('deleteProjectSuccess'))
        alert('Project deleted successfully');
        {{Session::forget('deleteProjectSuccess')}}
    @endif
</script>
<div class="bg-gray-100">
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-lg font-semibold bg-gray-700 p-4 text-gray-300"> <i class="fas fa-project-diagram text-green-500"></i> @yield('title') </h2>
        <!-- Filter and Search -->
        <div class="flex items-end justify-between flex-row bg-gray-200 p-4">
            
            <div class="w-3/4 mx-2">
                <label for="search" class="block text-gray-700 font-medium mb-2"><i class="fas fa-search"></i> Search</label>
                <input type="text" id="search" name="search"class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search...">
            </div>
            <div class="mb2 mx-2">
                <!-- Button to trigger the modal -->
                <button id="addProjectBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Project</button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-300 text-left">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Link</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($projects as $project)
                        <?php
                        $id = $project->id;
                        $title = $project->title;
                        $description = $project->description;
                        $link = $project->link;
                        ?>
                    <tr>
                        <td class="border px-4 py-2">{{$id}}</td>
                        <td class="border px-4 py-2">{{$title}}</td>
                        <td class="border px-4 py-2">{{$description}}</td>
                        <td class="border px-4 py-2"><a href="{{$project->link}}">{{$link}}</a> </td>
                        <td class="border px-4 py-2">
                            <!-- <button id="editProjectBtn" onclick="openModelWithData(1, 'başlık', 'açıklama', 'link')" class="text-blue-500 rounded"><i class="fas fa-edit"></i> </button> -->
                            <button id="editProjectBtn"
                                    onclick="openModelWithData('{{$id}}', '{{addslashes($title)}}', '{{addslashes($description)}}', '{{$link}}')"
                                    class="text-blue-500 rounded"><i class="fas fa-edit"></i>
                            </button>  |
                            <form action="{{route('admin.deleteProject')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}"/>
                                <button onclick="return confirm('Are you sure to delete the project?')" class="text-red-500 rounded"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-end mt-4">
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Prev</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">1</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">2</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">3</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">Next</button>
        </div>
    </div>
</div>
@if(Session::has('addProjectSuccess'))
    {{'var'}}
@else
    {{'yok'}}
@endif
<!-- Modal for adding project -->
<form id="projectModal" method="post">
    @csrf
<div id="addProjectModal" class="fixed z-10 inset-0 overflow-y-auto hidden bg-gray-500 bg-opacity-75">
    <!-- Modal content -->
    <input type="hidden" id="hiddenIdInput" name="id" />
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-xl w-96">
            <div class="mb-4">
                <label for="projectTitle" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" id="projectTitle" name="projectTitle" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="projectDesc" class="block text-gray-700 font-medium mb-2">Description</label>
                <input type="text" id="projectDesc" name="projectDesc" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="projectLink" class="block text-gray-700 font-medium mb-2">Link</label>
                <input type="text" id="projectLink" name="projectLink" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="flex justify-end">
                <button id="createProjectBtn" type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    <button id="closeProjectModalBtn" type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ml-4">Close</button>
                </div>
        </div>
    </div>
</div>
    </form>

<script>
    // Get modal element
    var modal = document.getElementById('addProjectModal');
    // Get button that opens the modal
    var btn = document.getElementById("addProjectBtn");
    // Get close button
    var closeBtn = document.getElementById('closeProjectModalBtn');

    // Listen for click on button
    btn.addEventListener('click', openModal);
    // Listen for click on close button
    closeBtn.addEventListener('click', closeModal);
    // Listen for click outside of modal
    window.addEventListener('click', outsideClick);

    // Function to open modal
    function openModal() {
        document.getElementById('projectModal').action = "{{route('admin.addNewProject')}}";
        document.getElementById('hiddenIdInput').value = '';
        document.getElementById('projectTitle').value = '';
        document.getElementById('projectDesc').value = '';
        document.getElementById('projectLink').value = '';
        modal.style.display = 'block';
    }
    // Function to close modal
    function closeModal() {
        modal.style.display = 'none';
    }
    // Function to close modal if outside click
    function outsideClick(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    }
    // Function to open modal with project data
    function openModelWithData(id, title, desc, link){
        document.getElementById('projectModal').action = "{{route('admin.editProject')}}";
        document.getElementById('hiddenIdInput').value = id;
        document.getElementById('projectTitle').value = title;
        document.getElementById('projectDesc').value = desc;
        document.getElementById('projectLink').value = link;
        modal.style.display = 'block';
    }

</script>
@endsection
