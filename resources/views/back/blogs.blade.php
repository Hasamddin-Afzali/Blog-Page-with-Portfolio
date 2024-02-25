@extends('back.layouts.master')
@section('title', $edit ? 'Edit Blog' : 'Add Blog')
@section('content')
<div class="flex-1">
    <!-- Add Blog Form -->
    <div class="bg-white p-2 rounded-md shadow-md">
        <h3 class="text-lg font-semibold bg-dark p-4 text-light"><i class="fas fa-file-alt text-warning"></i>
            @yield('title')</h3>
        <!-- Blog Form Content -->
        <form action="{{$edit ? route('admin.editPost') : route('admin.addNewPost')}}" method="POST"
            class="bg-light p-4" enctype="multipart/form-data">
            @csrf
            @if($edit)
            <input type="hidden" name="id" value="{{$id}}" />
            <input type="hidden" name="imagePath" value="{{$imagePath}}" />
            @endif
            <div class="mb-3">
                <label for="title" class="form-label text-gray-700">Title</label>
                <p class="text-danger">{{$errors->first('title') ?: ''}}</p>
                <input type="text" id="title" name="title" value="{{$edit ? $title : ''}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label text-gray-700">Category</label>
                <p class="text-danger">{{$errors->first('category') ?: ''}}</p>
                <select id="category" name="category" class="form-select">
                    <option value="" selected disabled>Select category</option>
                    @foreach($categories as $category)
                    <option {{$edit && $categoryId == $category->id ? ' selected ': ' '}} value="{{$category->id}}">
                        {{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="images" class="form-label text-gray-700">Upload Images</label>
                <p class="text-danger">{{$errors->first('image') ?: ''}}</p>
                <input type="file" id="images" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="shortDescription" class="form-label text-gray-700">Short Description</label>
                <p class="text-danger">{{$errors->first('shortDescription') ?: ''}}</p>
                <textarea id="shortDescription" name="shortDescription" rows="4"
                    class="form-control">{{$edit ? $description : ''}}</textarea>
            </div>

            <div class="mb-3">
                <label for="postContent" class="form-label text-gray-700">Content</label>
                <p class="text-danger">{{$errors->first('postContent') ?: ''}}</p>
                <!-- Replace the textarea with CKEditor -->
                <textarea id="postContent" name="postContent"
                    class="form-control">{{$edit ? $postContent : ''}}</textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success"><i class="fas fa-plus me-1"></i> Save</button>
                <a href="{{ route('admin.blog') }}" class="btn btn-secondary">Show All Blogs</a>
            </div>
        </form>

        <script>
            CKEDITOR.replace('postContent', {
                filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token() ]) }}",
                filebrowserUploadMethod: "form"
            });
        </script>
    </div>
</div>
@endsection