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
<div class="">
    <div class="bg-light p-2 rounded-md shadow-md">
        <h2 class="text-lg font-semibold bg-dark p-4 text-light"> <i class="fas fa-project-diagram text-warning"></i> @yield('title') </h2>
        <!-- Filter and Search -->
        <div class="d-flex justify-content-between align-items-end flex-row bg-gray-200 my-4">

            <div class="w-75 mx-2">
                <label for="search" class="form-label text-gray-700 font-medium mb-2"><i class="fas fa-search"></i> Search</label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
            </div>
            <div>
                <!-- Button to trigger the modal -->
                <button id="addProjectBtn" class="btn btn-warning"><i class="fas fa-plus me-1"></i> Add Project</button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr class="bg-gray-300 text-left">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Actions</th>
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
                        <td>{{$id}}</td>
                        <td>{{$title}}</td>
                        <td>{{$description}}</td>
                        <td><a href="{{$project->link}}">{{$link}}</a> </td>
                        <td>
                            <button id="editProjectBtn" onclick="openModelWithData('{{$id}}', '{{addslashes($title)}}', '{{addslashes($description)}}', '{{$link}}')" class="btn btn-success"><i class="fas fa-edit"></i></button>
                            <form action="{{route('admin.deleteProject')}}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}"/>
                                <button onclick="return confirm('Are you sure to delete the project?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{count($projects) != 0 ? $projects->links() : null}}
    </div>
</div>
<!-- Modal for adding project -->
<form id="projectModal" method="post">
    @csrf
<div id="addProjectModal" class="modal fade" tabindex="-1">
    <!-- Modal content -->
    <input type="hidden" id="hiddenIdInput" name="id" />
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-4">
                    <label for="projectTitle" class="form-label text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" id="projectTitle" name="projectTitle" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="projectDesc" class="form-label text-gray-700 font-medium mb-2">Description</label>
                    <input type="text" id="projectDesc" name="projectDesc" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="projectLink" class="form-label text-gray-700 font-medium mb-2">Link</label>
                    <input type="text" id="projectLink" name="projectLink" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button id="createProjectBtn" type="submit" class="btn btn-success">Save</button>
                <button id="closeProjectModalBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        var myModal = new bootstrap.Modal(modal);
        myModal.show();
    }
    // Function to close modal
    function closeModal() {
        var myModal = new bootstrap.Modal(modal);
        myModal.hide();
    }
    // Function to close modal if outside click
    function outsideClick(e) {
        if (e.target == modal) {
            var myModal = new bootstrap.Modal(modal);
            myModal.hide();
        }
    }
    // Function to open modal with project data
    function openModelWithData(id, title, desc, link){
        document.getElementById('projectModal').action = "{{route('admin.editProject')}}";
        document.getElementById('hiddenIdInput').value = id;
        document.getElementById('projectTitle').value = title;
        document.getElementById('projectDesc').value = desc;
        document.getElementById('projectLink').value = link;
        var myModal = new bootstrap.Modal(modal);
        myModal.show();
    }

</script>
@endsection
