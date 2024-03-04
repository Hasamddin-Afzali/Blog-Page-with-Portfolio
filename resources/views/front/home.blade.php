@extends('front.layouts.master')
@section('title', 'Home')
@section('content')
<div class="background-image" style="background-image: url('{{ asset('img/bg.jpg') }}');" data-aos-delay="100">
  <div class="container-md mx-auto h-100">
    <div class="row justify-content-between py-5 ">
      <div class="col-md-6 d-md-flex align-items-center">
        <header class="h-auto py-5 d-flex flex-column justify-content-center text-white text-center text-md-start">
          <h5>Hi There!</h5>
          <h1 class="fw-bold"> I'm <span id="typewriter" class="text-warning"></span></h1>
          <hr>
          <p class="">Hello! I'm Hasamuddin Afzali, a passionate computer engineer, full-stack web developer, and graphic designer based in Karabuk, Turkey. With a keen eye for detail and a love for creative problem-solving, I thrive in the dynamic intersection of technology and design.</p>
            
            <div class="social my-4">
              <a href="https://github.com/Hasamddin-Afzali" target="_blank" class="text-decoration-none text-reset"><i class="fab fa-github text-warning fs-2 me-4"></i></a>
              <a href="https://www.linkedin.com/in/hasamuddin-afzali-7224b61b3/" target="_blank" class="text-decoration-none text-reset"><i class="fab fa-linkedin text-warning fs-2 me-4"></i></a>
              <a href="https://www.instagram.com/hasam.afzali/" target="_blank" class="text-decoration-none text-reset"><i class="fab fa-instagram text-warning fs-2 me-4"></i></a>
            </div>

            <div class="button"> <a href="{{asset('/img/cv.pdf')}}" download class="btn btn-warning">Download CV</a> </div>
        </header>
      </div>

      <div class="col-md-4 align-self-center">
        <img src="{{URL::asset('/img/hero-section-img.jpg')}}" class="img-fluid hero-img" alt="" data-aos="fade-right">
      </div>

    </div>
  </div>

</div>

<div class="container py-5">
  <div class="row justify-content-around align-items-center" data-aos="fade-right" data-aos-delay="100">
    <div class="col-md-4" data-aos="fade-right">
      <img src="{{asset('/img/about-me.jpg')}}" alt="Your Image" class="img-fluid rounded-md">
    </div>
    <!-- Left Column -->
    <div class="col-md-6 mb-4 mb-md-0">
      <h1 class=" mb-4 my-2">Who am I?</h1>
      <hr class="mb-4">
      <p class="mb-4">I am currently pursuing my Bachelor's degree in Computer Engineering,
        specializing in cutting-edge
        technologies and software development practices. Prior to this, I earned my Associate Degree in Computer
        Programming, where I honed my skills and laid the groundwork for my journey into the world of technology.
        Alongside my academic pursuits, I have immersed myself in the world of freelance web development and graphic
        design. Leveraging my expertise in HTML, CSS, JavaScript, Bootstrap, jQuery, Tailwind CSS, React, C#, and
        Laravel, I craft bespoke digital solutions that not only meet but exceed my clients' expectations.</p>
        <div class="button">
          <a href="{{route('portfolio')}}" class="btn btn-warning">Portfolio</a>
        </div>
    </div>
  </div>
</div>

<div class="bg-light py-5">
  <div class="container my-4">

    <div class="title my-5">
      <h2 class="text-2xl font-bold mb-4 text-warning">Blogs</h2>
      <hr>
      <h1 class="text-4xl font-bold mb-6 text-yellow">The Latest Blogs</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      
      @if(count($posts) == 0)
      <div class="bg-danger text-white p-4 w-100 my-4">
        There are no posts available. <i class="fas fa-exclamation"></i>
      </div>
      @else
      @foreach($posts as $post)

      <div class="col" data-aos="fade-right" data-aos-delay="100">
          <div class="card h-100">
            <div class="ratio ratio-16x9">
              <img src="{{$post->img_path}}" class="card-img-top" alt="Image">
            </div>
            <div class="card-body">
            <a href="{{ 'blog/'.$post->id }}" class="text-decoration-none "> <h5 class="card-title text-dark">{{$post->title}}</h5></a>
              <p class="card-text text-secondary">{{$post->created_at->format('F d, Y')}} | {{$post->getRelation('category')->title}}</p>
              <p class="card-text text-dark">{!! substr($post->short_description,0,130).'... '!!}</p>
            </div>
            <a href="{{ route('singlePost', $post->id) }}" class="bt btn-warning p-2 text-decoration-none">see more</a>
          </div>
      </div>

      @endforeach
      @endif
    </div>
  </div>
</div>

<script>
  const words = ["Hasamuddin", "Web Developer", "Graphic Designer"];
  let i = 0;
  let j = 0;
  let currentWord = "";
  let isDeleting = false;

  function type() {
    currentWord = words[i];
    if (isDeleting) {
      document.getElementById("typewriter").textContent = currentWord.substring(0, j - 1);
      j--;
      if (j == 0) {
        isDeleting = false;
        i++;
        if (i == words.length) {
          i = 0;
        }
      }
    } else {
      document.getElementById("typewriter").textContent = currentWord.substring(0, j + 1);
      j++;
      if (j == currentWord.length) {
        isDeleting = true;
      }
    }
    setTimeout(type, 100);
  }
  type();
</script>
@endsection