@extends('front.layouts.master')
@section('title', 'Home')
@section('content')

<header class="bg-cover bg-center h-screen flex items-center text-white bg-no-repeat relative"
  style="width:100%;height:500px;background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/146.webp');">
  <div class="absolute inset-0 bg-black bg-opacity-50"></div>
  <div class="container mx-auto text-center relative z-10">
    <h1 class="text-5xl font-bold mb-4">Hello I'am <span class="text-red-500">YourName</span></h1>
    <p class="text-lg mb-8">A short description or call to action.</p>
    <a href="#"
      class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:shadow-outline">Dowload
      CV</a>
  </div>
</header>

<!-- containr starts -->
<div class="container mx-auto w-3/4">
  <div class="flex flex-col md:flex-row items-center justify-between py-8 md:py-32">
    <!-- Left Column -->
    <div class="max-w-md mb-8 md:mb-0 md:mr-4">
      <h2 class="text-3xl font-bold mb-4">About Me</h2>
      <hr class="mb-4">
      <h1 class="text-4xl font-bold mb-6">Biography</h1>
      <p class="mb-4">Hi, I'm [Your Name]. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus felis
        vel metus sollicitudin, eget consequat turpis efficitur.</p>
      <p class="mb-4">I have a passion for [your interests] and a strong background in [your expertise]. With [number]
        years of experience, I have [achievement 1, achievement 2, etc.].</p>
      <p>Feel free to explore my journey and connect with me on [social media links].</p>
    </div>
    <!-- Right Column (Image) -->
    <div class="flex-shrink-0">
        <img src="https://mdbcdn.b-cdn.net/img/new/ecommerce/vertical/117.jpg" alt="Your Image"
        class="w-full md:w-96 h-64 md:h-96 rounded-full object-cover">
    </div>
  </div>
</div>

<div class="bg-gray-100 py-10">
  <div class="container mx-auto my-8 w-3/4">
    <!-- title of blog starts here  -->
    <div class="title my-10">
      <h2 class="text-3xl font-bold mb-4">Blogs</h2>
      <hr>
      <h1 class="text-4xl font-bold mb-6">The Latest Blogs</h1>
    </div>
    <!-- title of blogs ends here -->
    <!-- all blogs starts here -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Column 1 -->
        @foreach($posts as $post)
        <a href="{{ 'blog/'.$post->id }}" class="text-blue-500 flex">
            <div class="bg-white p-4 rounded-3xl shadow-md hover:shadow-lg">
                <img src="{{$post->img_path}}" alt="Image" class="w-full h-72 rounded-3xl mb-4">
                <div class="text-xl font-bold mb-2 text-black">{{$post->title}}</div>
                <div class="text-gray-500 text-sm mb-2">{{$post->created_at->format('F d, Y')}}</div>
                <div class="text-blue-500 mb-2">{{$post->getRelation('category')->title}}</div>
                <p class="text-gray-800">{!! substr($post->short_description,0,100).'... '!!} </p>
            </div>
          </a>
        @endforeach
    </div>
    <!-- all blogs ends here  -->
  </div>
</div>
@endsection
