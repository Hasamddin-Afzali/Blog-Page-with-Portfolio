@extends('back.layouts.master')
@section('title', 'All Blogs')
@section('content')

<div class="bg-gray-100">
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-lg font-semibold bg-gray-700 p-4 text-gray-300"><i class="fas fa-th-large text-green-500"></i> @yield('title')</h2>
        <!-- Filter and Search -->
        <div class="flex items-end justify-between flex-row bg-gray-200 p-4">
            <div class="w-2/5 mx-2">
                <label for="category" class="block text-gray-700 font-medium mb-2">Filter by Category</label>
                <select id="category" name="category"
                    class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All</option>
                    <option value="technology">Technology</option>
                    <option value="fashion">Fashion</option>
                    <option value="food">Food</option>
                </select>
            </div>
            <div class="w-2/5 mx-2">
                <label for="search" class="block text-gray-700 font-medium mb-2"><i class="fas fa-search"></i> Search</label>
                <input type="text" id="search" name="search" class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search...">
            </div>
            <div class="mb2 mx-2">
                <a href="{{route('blogs')}}"><button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fas fa-plus"></i> Add Blog</button></a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-300 text-left">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Content</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Sample Title</td>
                        <td class="border px-4 py-2">Sample Category</td>
                        <td class="border px-4 py-2">Sample Content</td>
                        <td class="border px-4 py-2">Sample Image</td>
                        <td class="border px-4 py-2">
                            <a href="#" class="text-blue-500 rounded"><i class="fas fa-edit"></i> </a>  |   
                            <a href="#" class="text-red-500 rounded"><i class="fas fa-trash-alt"></i> </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Sample Title</td>
                        <td class="border px-4 py-2">Sample Category</td>
                        <td class="border px-4 py-2">Sample Content</td>
                        <td class="border px-4 py-2">Sample Image</td>
                        <td class="border px-4 py-2">
                            <a href="#" class="text-blue-500 rounded"><i class="fas fa-edit"></i> </a>  |   
                            <a href="#" class="text-red-500 rounded"><i class="fas fa-trash-alt"></i> </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">Sample Title</td>
                        <td class="border px-4 py-2">Sample Category</td>
                        <td class="border px-4 py-2">Sample Content</td>
                        <td class="border px-4 py-2">Sample Image</td>
                        <td class="border px-4 py-2">
                            <a href="#" class="text-blue-500 rounded"><i class="fas fa-edit"></i> </a>  |   
                            <a href="#" class="text-red-500 rounded"><i class="fas fa-trash-alt"></i> </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-end mt-4">
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Prev</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">1</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">2</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">3</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4"> Next </button>
        </div>
    </div>
</div>

@endsection