@extends('front.layouts.master')
@section('title', 'Contact')
@section('content')
<header class="d-flex align-items-center text-white  position-relative py-5" style="background-image: url('/img/message.jpg');">
    <div class="position-absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="container text-center position-relative z-index-10">
        <h1 class="fw-bold mb-4"><span class="text-warning">@yield('title')</span></h1>
    </div>
</header>

<div class="bg-light py-5">
    <div class="container-md mx-auto">
        <section class="py-5 d-flex flex-column flex-md-row align-items-center justify-content-between flex-wrap">

            <div class="col-md-4 mx-5 mb-4 mb-md-0">
                <img src="{{asset('/img/contact.png')}}" class="w-100" alt="">
            </div>

            <div class="col-md-6 col-10 p-4 ">

                <h2 class="text-700 mb-4">Contact Me</h2>

                <form action="{{ route('getContactMessage') }}" method="post" class="space-y-4 flex-grow">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label text-gray-600">Name:<span class="text-danger">{{$errors->first('name') ? '*':''}}</span></label>
                        <input type="text" id="name" name="name" placeholder="Your Name" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label text-gray-600">Email:<span class="text-danger">{{$errors->first('email') ? '*':''}}</span></label>
                        <input type="email" id="email" name="email" placeholder="Your Email" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label text-gray-600">Message:<span class="text-danger">{{$errors->first('message') ? '*':''}}</span></label>
                        <textarea id="message" name="message" rows="4" class="form-control" placeholder="Message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">Send Message</button>
                </form>
            </div>
        </section>

    </div>
</div>

@endsection