@extends('back.layouts.master')
@section('title', 'All Categories')
@section('content')

<div class="bg-gray-100">
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-lg font-semibold mb-4">All Categories</h2>
        <!-- Filter and Search -->
        <div class="flex items-end justify-between flex-row mt-4 bg-gray-200 p-4 my-4">
            <div class="w-3/4 mx-2">
                <label for="search" class="block text-gray-700 font-medium mb-2">Search</label>
                <input type="text" id="search" name="search"
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Search...">
            </div>
            <div class="mb-2 mx-2">
                <!-- Button to trigger the modal -->
                <button id="addCategoryBtn"
                    class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">+ Add Category</button>
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
                    <!-- Replace the content below with dynamic data -->
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Category 1</td>
                        <td class="border px-4 py-2">-</td>
                        <td class="border px-4 py-2">
                            <a href="#" class="text-blue-500">Edit</a> |
                            <a href="#" class="text-red-500">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">2</td>
                        <td class="border px-4 py-2 pl-4">Subcategory 1.1</td>
                        <td class="border px-4 py-2">Category 1</td>
                        <td class="border px-4 py-2">
                            <a href="#" class="text-blue-500">Edit</a> |
                            <a href="#" class="text-red-500">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">3</td>
                        <td class="border px-4 py-2 pl-8">Sub-subcategory 1.1.1</td>
                        <td class="border px-4 py-2">Subcategory 1.1</td>
                        <td class="border px-4 py-2">
                            <a href="#" class="text-blue-500">Edit</a> |
                            <a href="#" class="text-red-500">Delete</a>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-end mt-4">
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                Prev
            </button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">
                1
            </button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">
                2
            </button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">
                3
            </button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">
                Next
            </button>
        </div>
    </div>
</div>

<!-- Modal for adding category -->
<div id="addCategoryModal" class="fixed z-10 inset-0 overflow-y-auto hidden bg-gray-500 bg-opacity-75">
    <!-- Modal content -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-xl w-96">
            <div class="mb-4">
                <label for="categoryName" class="block text-gray-700 font-medium mb-2">Category Name</label>
                <input type="text" id="categoryName" name="categoryName"
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="parentCategory" class="block text-gray-700 font-medium mb-2">Parent Category</label>
                <select id="parentCategory" name="parentCategory"
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select parent category</option>
                    <!-- Populate options dynamically from database -->
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button id="createCategoryBtn"
                    class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Category</button>
                <button id="closeCategoryModalBtn"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ml-4">Close</button>
            </div>
        </div>
    </div>
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

</script>
@endsection
