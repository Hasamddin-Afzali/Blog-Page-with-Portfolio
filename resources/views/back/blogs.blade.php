@extends('back.layouts.master')
@section('title', $edit ? 'Edit Blog' : 'Add Blog')
@section('content')
<div class="flex-1 ">
    <script>
        @if(Session::has('addPostSuccess'))
            alert("{{'Post added successfully.'}}");
            {{Session::forget('addPostSuccess')}}
        @endif
    </script>
    <!-- Add Blog Form -->
    <div class="bg-white p-4 rounded-md shadow-md">
        <h2 class="text-lg font-semibold bg-gray-700 p-4 text-gray-300"><i class="fas fa-file-alt text-green-500"></i>
            @yield('title')</h2>
        <!-- Blog Form Content -->
        {{$edit}}
        <form action="{{$edit ? route('admin.editPost') : route('admin.addNewPost')}}" method="POST" class="bg-gray-100 p-4" enctype="multipart/form-data">
            @csrf
            @if($edit)
                <input type="hidden" name="id" value="{{$id}}"/>
                <input type="hidden" name="imagePath" value="{{$imagePath}}"/>
            @endif
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <p class="text-red-600">{{$errors->first('title') ?: ''}}</p>
                    <input type="text" id="title" name="title" value="{{$edit ? $title : ''}}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
                <p class="text-red-600">{{$errors->first('category') ?: ''}}</p>
                <select id="category" name="category"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" selected disabled>Select category</option>
                    @foreach($categories as $category)
                    <option
                        {{$edit && $categoryId == $category->id ? ' selected ': ' '}}
                        value="{{$category->id}}">{{$category->title}}
                    </option>
                    @endforeach
                    <option value="technology">Technology</option>
                    <option value="fashion">Fashion</option>
                    <option value="food">Food</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="mb-4">
                <label for="images" class="block text-gray-700 font-medium mb-2">Upload Images</label>
                <p class="text-red-600">{{$errors->first('image') ?: ''}}</p>
                <input type="file" id="images" name="image"
                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="textarea" class="block text-gray-700 font-medium mb-2">Short Description</label>
                <p class="text-red-600">{{$errors->first('shortDescription') ?: ''}}</p>
                <textarea id="shortDescription" name="shortDescription" rows="4"
                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none">
                    {{$edit ? $description : ''}}
                </textarea>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                <p class="text-red-600">{{$errors->first('postContent') ?: ''}}</p>
                <!-- Replace the textarea with CKEditor -->
                <textarea id="id_content" name="postContent"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    {{$edit ? $postContent : ''}}
                </textarea>
            </div>
            <div class="flex justify-between">
                <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i
                        class="fas fa-plus"></i> Save</button>
                <a href="{{ route('admin.blog') }}"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Show
                    All Blogs</a>
            </div>
        </form>

        <script>
        CKEDITOR.replace('id_content', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: "form"
        });
        </script>
    </div>
</div>
@endsection
