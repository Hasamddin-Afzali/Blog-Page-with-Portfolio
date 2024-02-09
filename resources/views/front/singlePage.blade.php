@extends('front.layouts.master')
@section('title', 'Blog Post')
@section('content')
<header class="bg-cover bg-center h-screen flex items-center text-white bg-no-repeat relative" style="width:100%;height:300px;background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/146.webp');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="container mx-auto text-center relative z-10">
        <h1 class="text-5xl font-bold mb-4"><span class="text-red-500">{{$post[0]->title}}</span></h1>
    </div>
</header>
<div class="md:container md:mx-auto md:w-3/4">
    <div class="py-10">
        <div class="image">
            <img src="{{$post[0]->img_path}}" alt="">
        </div>
        <div class="title">
            <h1 class="text-3xl">Hello World !</h1>
        </div>
        <div class="date">
            {{$post[0]->created_at->format('F d, Y')}}
        </div>
        <div class="description">
            {!! $post[0]->body !!}
        </div>
    </div>
</div>
@endsection
