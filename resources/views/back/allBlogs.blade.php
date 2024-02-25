@extends('back.layouts.master')
@section('title', 'All Blogs')
@section('content')
<div class="bg-light">
    <div class="bg-light p-2 rounded-md shadow-md">
        <h3 class="bg-dark p-4 text-light"><i class="fas fa-th-large text-warning"></i> @yield('title')</h2>
        <!-- Filter and Search -->
        <div class="d-flex justify-content-between align-items-end bg-light my-4">
            <div class="w-25 mx-2">
                <label for="category" class="form-label">Filter by Category</label>
                <select id="category" name="category" class="form-select">
                    <option value="">All</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                    <option value="technology">Technology</option>
                    <option value="fashion">Fashion</option>
                    <option value="food">Food</option>
                </select>
            </div>
            <div class="w-50 mx-2">
                <label for="search" class="form-label text-gray-700 mb-2"><i class="fas fa-search"></i> Search</label>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
            </div>
            <div class="mb2 mx-2">
                <a href="{{route('admin.newPost')}}" class="btn btn-warning"><i class="fas fa-plus me-1"></i> Add Blog</a>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr class="bg-gray-300 text-left">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->getRelation('category')->title}}</td>
                        <td>{{($post->getRelation('createdBy')->first_name).' '.($post->getRelation('createdBy')->last_name)}}</td>
                        <td>{{$post->created_at->format('d F Y')}}</td>
                        <td>
                            <form action="{{route('admin.editPostPage')}}" method="get">
                                @csrf
                                <input type="hidden" name="post" value="{{$post}}"/>
                                <button type="submit" name="action" value="Update" class="btn btn-success"><i class="fas fa-edit"></i> </button>
                                <button type="submit" name="action" value="Delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-4">
            {{$posts->links()}}
        </div>
    </div>
</div>

@endsection