@extends('front.layouts.master')
@section('title', 'Home')
@section('content')
<!-- header starts here  -->
<header class="bg-cover bg-center h-screen d-flex align-items-center text-white bg-no-repeat position-"
    style="background-image: url('/img/programming-skills.png');">
    <div class="position-absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto text-center position-relative z-index-10">
        <h1 class="py-5"><span class="text-warning">Portfolio</span></h1>
    </div>
</header>

<!-- header ends here -->
<div class="container-md mx-auto py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="about p-4 shadow-md" data-aos="fade-right" data-aos-delay="200">
                <h1 class="text-3xl font-bold mb-4">About Me</h1>
                <hr>
                <p class="py-4">About Me Hello! I'm Hasamuddin Afzali, a passionate computer engineer, full-stack web
                    developer, and graphic designer based in Karabuk, Turkey. With a keen eye for detail and a love for
                    creative problem-solving, I thrive in the dynamic intersection of technology and design.</p>
                <h2 class="text-3xl">Education & Experience</h2>
                <p class="py-4">I am currently pursuing my Bachelor's degree in Computer Engineering, specializing in
                    cutting-edge
                    technologies and software development practices. Prior to this, I earned my Associate Degree in Computer
                    Programming, where I honed my skills and laid the groundwork for my journey into the world of
                    technology.

                    Alongside my academic pursuits, I have immersed myself in the world of freelance web development and
                    graphic design. Leveraging my expertise in HTML, CSS, JavaScript, Bootstrap, jQuery, Tailwind CSS,
                    React, C#, and Laravel, I craft bespoke digital solutions that not only meet but exceed my clients'
                    expectations.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="about p-4 shadow-md">
                <h2 class="text-3xl font-bold mb-4">Skills</h2>
                <hr>
                <div class="my-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="d-flex justify-content-between py-1">
                        <span class="text-base text-muted font-semibold">Photoshop & Illustrator</span>
                        <span class="text-base font-semibold">80%</span>
                    </div>
                    <div class="progress my-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="my-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="d-flex justify-content-between py-1">
                        <span class="text-base text-muted font-semibold">HTML & CSS</span>
                        <span class="text-base font-semibold">90%</span>
                    </div>
                    <div class="progress my-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="my-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="d-flex justify-content-between py-1">
                        <span class="text-base text-muted font-semibold">JavaScript</span>
                        <span class="text-base font-semibold">60%</span>
                    </div>
                    <div class="progress my-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="my-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="d-flex justify-content-between py-1">
                        <span class="text-base text-muted font-semibold">PHP & Laravel</span>
                        <span class="text-base font-semibold">75%</span>
                    </div>
                    <div class="progress my-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="my-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="d-flex justify-content-between py-1">
                        <span class="text-base text-muted font-semibold">MySQL</span>
                        <span class="text-base font-semibold">60%</span>
                    </div>
                    <div class="progress my-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-md mx-auto py-5" data-aos="fade-right" data-aos-delay="200">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col mb-4 d-flex">
            <div class="about-me p-5 bg-light shadow-md d-flex flex-column justify-content-between">
                <div class="title">
                    <h1 class="text-3xl my-4">Creative Passion</h1>
                    <p>Graphic design isn't just a skill set for me; it's a passion. I'm proficient in Adobe Photoshop
                        and Illustrator, allowing me to bring concepts to life with stunning visuals and captivating
                        designs. Whether it's designing sleek logos, eye-catching branding materials, or engaging user
                        interfaces, I thrive on transforming ideas into visually compelling realities.</p>
                </div>
                <div class="footer mt-auto">
                </div>
            </div>
        </div>
        <div class="col mb-4 d-flex">
            <div class="about-me p-5 bg-light shadow-md d-flex flex-column justify-content-between">
                <div class="title">
                    <h1 class="text-3xl my-4">Why Work With Me?</h1>
                    <p>I approach every project with enthusiasm, professionalism, and a commitment to excellence. My
                        goal is not only to deliver high-quality solutions but also to establish lasting relationships
                        built on trust, communication, and mutual respect. From concept to execution, I collaborate
                        closely with my clients to ensure that their vision is brought to life in a way that resonates
                        with their audience and achieves their goals.</p>
                </div>
                <div class="footer mt-auto">
                </div>
            </div>
        </div>
        <div class="col mb-4 d-flex">
            <div class="about-me p-5 bg-light shadow-md d-flex flex-column justify-content-between">
                <div class="title">
                    <h1 class="text-3xl my-4">Let's Connect</h1>
                    <p>If you're looking for a dedicated and versatile professional to help bring your digital projects
                        to fruition, I'd love to hear from you! Feel free to reach out and let's discuss how we can
                        collaborate to turn your ideas into reality.</p>
                </div>
                <div class="footer mt-auto">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container py-5">
    <h2 class="text-center text-3xl font-bold mb-4">My Projects</h2>
    <hr>
    <div class="row justify-content-around">
        @foreach($projects as $project)
        <div class="col-md-5 mb-4 bg-light p-4 mx-2 shadow-sm" data-aos="fade-left" data-aos-delay="200">
            <h3 class="text-2xl">{{$project->title}}</h3>
            <p class="text-muted mb-4">{{$project->description}}</p>
            <a href="{{$project->link}}" class="btn btn-warning text-white">Learn More</a>
        </div>
        @endforeach
    </div>
</div>

@endsection