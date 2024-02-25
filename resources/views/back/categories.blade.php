@extends('back.layouts.master')
@section('title', 'All Categories')
@section('content')

<div class="bg-light">
    <div class="bg-white p-2 rounded-md shadow-md">
        <h3 class="text-lg font-semibold bg-dark p-4 text-light"><i class="fas fa-th-list text-warning"></i>  @yield('title')</h2>
        <!-- Filter and Search -->
        <div class="d-flex justify-content-between align-items-end my-4">
            <div class="w-75 mx-2">
                <label for="search" class="form-label text-gray-700 mb-2"><i class="fas fa-search"></i> Search</label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
            </div>
            <div class="mx-2">
                <button id="addCategoryBtn" class="btn btn-warning"><i class="fas fa-plus me-1"></i> Add Category</button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Parent Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{!! $category->title !!}</td>
                        <td>{{ is_null($category->getRelation('topCategory')) ? '-' : $category->getRelation('topCategory')->title}}</td>
                        <td>
                            <div class="d-flex">
                            <button type="button" onclick="openModalWithData('{{$category->id}}', '{{trim(str_replace("&nbsp;", "", $category->title))}}', '{{$category->top_category}}')" class="btn btn-success mx-3"><i class="fas fa-edit"></i> </button> 
                            <form action="{{route('admin.deleteCategory')}}" method="post" onsubmit="return confirm('Are you sure you want to delete this category with its sub-categories, if any?')">
                                @csrf
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal for adding category -->
<div id="addCategoryModal" class="modal fade">
    <!-- Modal content -->
    <form id="categoryForm" method="post">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="categoryId" name="id">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name<span class="text-danger">*</span></label>
                        <input type="text" id="categoryName" name="categoryName" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="parentCategory" class="form-label">Parent Category</label>
                        <select id="parentCategory" name="parentCategory" class="form-select">
                            <option value="0">Select parent category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{!! $category->title !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="createCategoryBtn" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Get modal element
    var modal = document.getElementById('addCategoryModal');
    // Get button that opens the modal
    var btn = document.getElementById("addCategoryBtn");
    // Get close button
    var closeBtn = document.querySelector('#addCategoryModal .btn-close');

    // Listen for click on button
    btn.addEventListener('click', openModal);
    // Listen for click on close button
    closeBtn.addEventListener('click', closeModal);
    // Listen for click outside of modal
    window.addEventListener('click', outsideClick);

    // Function to open modal
    function openModal() {
        document.getElementById('categoryForm').action = "{{route('admin.addNewCategory')}}";
        document.getElementById('categoryName').value = '';
        document.getElementById('parentCategory').value = 0;
        var modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        modal.show();
    }
    // Function to close modal
    function closeModal() {
        var modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        modal.hide();
    }
    // Function to close modal if outside click
    function outsideClick(e) {
        if (e.target == modal) {
            var modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
            modal.hide();
        }
    }

    function openModalWithData(id, title, topCategory){
        document.getElementById('categoryForm').action = "{{route('admin.editCategory')}}";
        document.getElementById('categoryId').value = id;
        document.getElementById('categoryName').value = title;
        document.getElementById('parentCategory').value = topCategory;
        var modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        modal.show();
    }

</script>
@endsection
