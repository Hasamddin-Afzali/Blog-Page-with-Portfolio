@extends('front.layouts.master')
@section('title', 'Blog')
@section('content')

<header class="d-flex justify-content-center align-items-center text-black bg-light py-5">
    <div class="container text-center">
        <h1 class="text-5xl font-bold">My<span class="text-warning"> Blog </span> </h1>
        <hr>
    </div>
</header>

<div class="bg-light">
    <div class="container-lg">
        <div class="row justify-content-between align-items-start flex-md-row-reverse">
            <!-- Right Column -->
            <div class="col-md-4"  data-aos="fade-right" data-aos-delay="100">
                <!-- Categories -->
                <div class="bg-white p-4 my-4">
                    <h3 class="">Categories</h3> <hr>
                    <ul class="my-4">
                    @if (!\App\Http\Controllers\Controller::listCategories())
                        <div class="bg-danger text-white p-2 w-100" role="alert"><i class="fas fa-exclamation-circle"></i> No Categories Found</div>
                    @endif
                    </ul>
                </div>

                <!-- Top Watched Blogs -->

                <!-- <div class="bg-white p-4 my-4">
                    <h3 class="text-xl font-bold mb-4">Top Watched Blogs</h3>
                    <hr>
                    <ul class="my-4">
                        <li class="mb-2 list-unstyled"> <a href="#" class="text-primary">Top Blog 1</a> </li>
                    </ul>
                </div> -->
            </div>

            <!-- Left Column - Blogs -->
            <div class="col-md-8">
                @if($posts->isEmpty())
                <div class="bg-danger text-white p-4 w-100 my-4"> <i class="fas fa-exclamation-circle"></i> No Blog Found <i class="fas fa-exclamation"></i> </div>
                @else
                @foreach($posts as $post)
                <div class="row bg-white my-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="col-md-6"> <img src="{{$post->img_path}}" alt="Blog Image" class="img-fluid w-100 h-100" style="object-fit: cover;"> </div>
                    <div class="col-md-6 p-4">

                        <div>
                            <a href="{{ route('singlePost', $post->id) }}" class=" text-decoration-none text-dark"> <h2 class="text-2xl font-bold">{!! substr($post->title, 0, 50) !!}</h2> </a>
                            <p class="text-gray-600">Posted on {{$post->created_at->format('F d, Y')}} | <span class="fw-bold text-danger"> {{$post->getRelation('category')->title}} </span></p>
                        </div>

                        <p class="text-dark">{!! substr($post->short_description, 0, 100) !!}... </p>
                        <a href="{{ route('singlePost', $post->id) }}" class="bt btn-warning p-2 text-decoration-none">see more</a>
                    </div>
                </div>
                @endforeach
                @endif
                {{count($posts) != 0 ? $posts->links() : null}}

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
            nestedList.classList.toggle('d-none'); // Use d-none to hide and d-block to show
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