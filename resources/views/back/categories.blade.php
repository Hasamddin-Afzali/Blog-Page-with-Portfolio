@extends('back.layouts.master')
@section('title', 'All Categories')
@section('content')

<div class="bg-gray-100">
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-lg font-semibold bg-gray-700 p-4 text-gray-300"><i class="fas fa-th-list text-green-500"></i>  @yield('title')</h2>
        <!-- Filter and Search -->
        <div class="flex items-end justify-between flex-row bg-gray-200 p-4">
            <div class="w-3/4 mx-2">
                <label for="search" class="block text-gray-700 font-medium mb-2"><i class="fas fa-search"></i> Search</label>
                <input type="text" id="search" name="search" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search...">
            </div>
            <div class="mx-2">
                <button id="addCategoryBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fas fa-plus"></i> Add Category</button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-300 text-left">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Category Name</th>
                        <th class="px-4 py-2">Parent Category</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        @csrf
                        <td class="border px-4 py-2">{{$category->id}}</td>
                        <td class="border px-4 py-2">{!! $category->title !!}</td>
                        <td class="border px-4 py-2">{{ is_null($category->getRelation('topCategory')) ? '-' : $category->getRelation('topCategory')->title}}</td>
                        <td class="border px-4 py-2">
                            <button type="button" onclick="openModalWithData('{{$category->id}}', '{{trim(str_replace("&nbsp;", "", $category->title))}}', '{{$category->top_category}}')" class="text-blue-500 rounded"><i class="fas fa-edit"></i> </button>  |
                        <form action="{{route('admin.deleteCategory')}}" method="post">
                           @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this category with its sub-categories, if any?')" class="text-red-500 rounded"><i class="fas fa-trash-alt"></i> </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal for adding category -->
<div id="addCategoryModal" class="fixed z-10 inset-0 overflow-y-auto hidden bg-gray-500 bg-opacity-75">
    <!-- Modal content -->
    <form id="categoryForm" method="post">
        @csrf
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-xl w-96">
                <input type="hidden" id="categoryId" name="id">
                <div class="mb-4">
                    <label for="categoryName" class="block text-gray-700 font-medium mb-2">
                        Category Name<span class="text-red-600">{{$errors->first('categoryName') ? '*':''}}</span>
                    </label>
                    <input type="text" id="categoryName" name="categoryName" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="parentCategory" class="block text-gray-700 font-medium mb-2">Parent Category</label>
                    <select id="parentCategory" name="parentCategory" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="0">Select parent category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{!! $category->title !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" id="createCategoryBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    <button type="button" id="closeCategoryModalBtn" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ml-4">Close</button>
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
    var closeBtn = document.getElementById('closeCategoryModalBtn');

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

    function openModalWithData(id, title, topCategory){
        document.getElementById('categoryForm').action = "{{route('admin.editCategory')}}";
        document.getElementById('categoryId').value = id;
        document.getElementById('categoryName').value = title;
        document.getElementById('parentCategory').value = topCategory;
        modal.style.display = 'block';
    }

</script>
@endsection
