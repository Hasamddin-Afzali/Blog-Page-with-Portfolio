@extends('front.layouts.master')
@section('title', 'Blog Post')
@section('content')

<header class="bg-cover bg-center h-screen d-flex align-items-center text-white bg-no-repeat position-relative"
    style="width:100%;height:300px;background-image: url('{{$post[0]->img_path}}');">
    <div class="position-absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="container mx-auto text-center position-relative z-index-10">
        <h1 class="text-5xl font-bold mb-4"><span class="text-white">{{$post[0]->title}}</span></h1>
    </div>
</header>
<div class="container mx-auto">
    <div class="py-5 d-flex justify-content-center align-items-start">
        <!-- Left Column -->
        <div class="w-75 me-5">
            <!-- Blog Title -->
            <div class="title mb-4">
                <h1 class="text-3xl font-bold">{{$post[0]->title}}</h1>
            </div>
            <!-- Blog Date -->
            <div class="date mb-4 text-gray-500">
                {{$post[0]->created_at->format('F d, Y')}} | {{$post[0]->getRelation('category')->title}}
            </div>
            <!-- Blog Description -->
            <div class="description">
                <p>{!! $post[0]->body !!}</p>
            </div>
        </div>
        <!-- Right Column -->
        <div class="w-25">
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
            nestedList.classList.toggle('d-none');
            if (nestedList.classList.contains('d-none')) {
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
