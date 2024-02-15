@extends('front.layouts.master')
@section('title', 'Blog Post')
@section('content')

<header class="bg-cover bg-center h-screen flex items-center text-white bg-no-repeat relative"
    style="width:100%;height:300px;background-image: url('{{$post[0]->img_path}}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="container mx-auto text-center relative z-10">
        <h1 class="text-5xl font-bold mb-4"><span class="text-white">{{$post[0]->title}}</span></h1>
    </div>
</header>
<div class="md:container md:mx-auto md:w-3/4">
    <div class="py-10 flex justify-center items-start">
        <!-- Left Column -->
        <div class="w-3/4 mr-8">
            <!-- Blog Title -->
            <div class="title mb-4">
                <h1 class="text-3xl font-bold">{{$post[0]->title}}</h1>
            </div>
            <!-- Blog Date -->
            <div class="date mb-4 text-gray-500">
                {{$post[0]->created_at->format('F d, Y')}}
            </div>
            <!-- Blog Category -->
            <div class="date mb-4 text-blue-500 font-bold">
            {{$post[0]->getRelation('category')->title}}
            </div>
            <!-- Blog Description -->
            <div class="description text-gray-800">
                {!! $post[0]->body !!}
            </div>
        </div>
        <!-- Right Column -->
        <div class="w-1/4">
            <div class="bg-white p-4 shadow-lg">
                <h3 class="text-xl font-bold mb-4">Related Blogs</h3>
                <hr>
                <ul class="my-4">
                    {{\App\Http\Controllers\Controller::listBlogLinksByCategory($post[0]->getRelation('category')->id, $post[0]->id)}}
                </ul>
            </div>
        </div>
    </div>
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
@endsection
