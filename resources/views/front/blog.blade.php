@extends('front.layouts.master')
@section('title', 'Blog')
@section('content')
<header class="bg-cover bg-center h-screen flex items-center text-white bg-no-repeat relative"
    style="width:100%;height:300px;background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/146.webp');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="container mx-auto text-center relative z-10">
        <h1 class="text-5xl font-bold mb-4"><span class="text-red-500">Blog</span></h1>
    </div>
</header>

<div class="bg-gray-100">
    <div class="lg:container lg:mx-auto lg:w-3/4">
        <div class=" p-8 flex justify-between  flex-col md:flex-row">
            <!-- Left Column - Blogs -->
            <div class="flex flex-wrap md:w-3/4 ">
                <!-- Blog Image -->


                <div class="flex items-center justify-between bg-white rounded-3xl p-4 my-4 ">
                    <div class="image">
                        <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/117.jpg" alt="Blog Image"
                            class="w-64 h-44 rounded-3xl">
                    </div>
                    <div class="content mx-4">
                        <!-- Blog Details -->
                        <div class="mb-4">
                            <h2 class="text-2xl font-bold">Blog Title</h2>
                            <p class="text-gray-600">Posted on February 2, 2024</p>
                            <p class="text-gray-600">Category: Web Development</p>
                        </div>

                        <!-- Blog Description -->
                        <p class="text-gray-800">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between bg-white rounded-3xl p-4 my-4 ">
                    <div class="image">
                        <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/117.jpg" alt="Blog Image"
                            class="w-64 h-44 rounded-3xl">
                    </div>
                    <div class="content mx-4">
                        <!-- Blog Details -->
                        <div class="mb-4">
                            <h2 class="text-2xl font-bold">Blog Title</h2>
                            <p class="text-gray-600">Posted on February 2, 2024</p>
                            <p class="text-gray-600">Category: Web Development</p>
                        </div>

                        <!-- Blog Description -->
                        <p class="text-gray-800">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between bg-white rounded-3xl p-4 my-4 ">
                    <div class="image">
                        <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/117.jpg" alt="Blog Image"
                            class="w-64 h-44 rounded-3xl">
                    </div>
                    <div class="content mx-4">
                        <!-- Blog Details -->
                        <div class="mb-4">
                            <h2 class="text-2xl font-bold">Blog Title</h2>
                            <p class="text-gray-600">Posted on February 2, 2024</p>
                            <p class="text-gray-600">Category: Web Development</p>
                        </div>

                        <!-- Blog Description -->
                        <p class="text-gray-800">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore
                            et
                            dolore magna aliqua.
                        </p>
                    </div>
                </div>


            </div>

            <!-- Right Column - Categories and Top Watched Blogs -->
            <div class="md:w-1/3 md:ml-8">
                <!-- Categories -->
                <div class="mb-8 bg-white p-4 my-4">
    <h3 class="text-xl font-bold mb-4">Categories</h3>
    <hr>
    <ul class="my-4">
        <li class="mb-2">
            <div class="flex items-center">
                <span class="toggle text-blue-500 cursor-pointer mr-2"><i class="fas fa-chevron-right text-sm"></i></span>
                <a href="#" class="text-blue-500">Web Development</a>
            </div>
            <ul class="ml-4 hidden">
                <li class="mb-2">
                    <a href="#" class="text-blue-500">Frontend</a>
                </li>
                <li class="mb-2">
                    <div class="flex items-center">
                        <span class="toggle text-blue-500 cursor-pointer mr-2"><i class="fas fa-chevron-right text-sm"></i></span>
                        <a href="#" class="text-blue-500">Backend</a>
                    </div>
                    <ul class="ml-4 hidden">
                        <li class="mb-2">
                            <a href="#" class="text-blue-500">Node.js</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-blue-500">Django</a>
                        </li>
                        <!-- Add more subcategories as needed -->
                    </ul>
                </li>
            </ul>
        </li>
        <li class="mb-2">
            <div class="flex items-center">
                <span class="toggle text-blue-500 cursor-pointer mr-2"><i class="fas fa-chevron-right text-sm"></i></span>
                <a href="#" class="text-blue-500">Mobile App</a>
            </div>
            <ul class="ml-4 hidden">
                <li class="mb-2">
                    <a href="#" class="text-blue-500">Android</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-blue-500">iOS</a>
                </li>
                <!-- Add more subcategories as needed -->
            </ul>
        </li>
        <li class="mb-2">
            <div class="flex items-center">
                <span class="toggle text-blue-500 cursor-pointer mr-2"><i class="fas fa-chevron-right text-sm"></i></span>
                <a href="#" class="text-blue-500">Data Science</a>
            </div>
            <ul class="ml-4 hidden">
                <li class="mb-2">
                    <a href="#" class="text-blue-500">Machine Learning</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-blue-500">Data Analysis</a>
                </li>
                <!-- Add more subcategories as needed -->
            </ul>
        </li>
        <!-- Add more categories as needed -->
    </ul>
</div>

<script>
    document.querySelectorAll('.toggle').forEach(item => {
        item.addEventListener('click', event => {
            let icon = item.querySelector('i');
            let parent = event.target.closest('li');
            let nestedList = parent.querySelector('ul');
            nestedList.classList.toggle('hidden');
            if (nestedList.classList.contains('hidden')) {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-right');
            } else {
                icon.classList.remove('fa-chevron-right');
                icon.classList.add('fa-chevron-down');
            }
        })
    });
</script>




                <!-- Top Watched Blogs -->
                <div class="bg-white p-4 my-4">
                    <h3 class="text-xl font-bold mb-4 ">Top Watched Blogs</h3>
                    <ul class="my-4">
                        <li class="mb-2">
                            <a href="#" class="text-blue-500">Top Blog 1</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-blue-500">Top Blog 2</a>
                        </li>
                        <!-- Add more top watched blogs as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection