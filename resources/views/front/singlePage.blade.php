@extends('front.layouts.master')
@section('title', 'Blog Post')
@section('content')
<style>
.overlay {
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.8); /* Adjust the opacity as needed */
}
.sedan-regular {
    font-family: "Sedan", serif;
    font-weight: 400;
    font-style: normal;
}

.sedan-regular-italic {
    font-family: "Sedan", serif;
    font-weight: 400;
    font-style: italic;
}

</style>
<header class="bg-cover bg-center h-screen d-flex align-items-center text-white bg-no-repeat position-relative" style="width:100%;height:300px;background-image: url('{{$post[0]->img_path}}');">
    <div class="overlay"></div>
    <div class="container mx-auto text-center position-relative z-index-10">
        <h1 class="text-5xl font-bold mb-4"><span class="text-warning">{{$post[0]->title}}</span></h1>
    </div>
</header>


<div class="container mx-auto">
    <div class="py-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-12 col-md-9">
                <!-- Blog Title -->
                <div class="title mb-4 sedan-regular">
                    <h1 class="text-3xl font-bold">{{$post[0]->title}}</h1>
                </div>
                <!-- Blog Date -->
                <div class="date mb-4 text-secondary">
                    {{$post[0]->created_at->format('F d, Y')}} | {{$post[0]->getRelation('category')->title}}
                </div>
                <!-- Blog Description -->
                <div class="description sedan-regular img-fluid">
                    <p>{!! $post[0]->body !!}</p>
                </div>
            </div>
            <!-- Right Column -->
            <div class="col-12 col-md-3 mt-4 mt-md-0">
                <div class="bg-white p-4 shadow-lg">
                    <h3 class="text-xl font-bold mb-4">Related Categories</h3>
                    <hr>
                    <ul class="my-4">
                        {{\App\Http\Controllers\Controller::listBlogLinksByCategory($post[0]->getRelation('category')->id, $post[0]->id)}}
                    </ul>
                </div>
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
