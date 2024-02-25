@extends('back.layouts.master')
@section('title', 'Dashboard')
@section('content')
<!-- Dashboard Content -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center bg-danger text-white">
                <div class="card-body">
                    <i class="fas fa-blog fa-3x mb-3"></i>
                    <h5 class="card-title">Total Blogs</h5>
                    <h1 class="card-text">100</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <i class="fas fa-list-alt fa-3x mb-3"></i>
                    <h5 class="card-title">Total Categories</h5>
                    <h1 class="card-text">100</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center bg-info text-white">
                <div class="card-body">
                    <i class="fas fa-user fa-3x mb-3"></i>
                    <h5 class="card-title">Total Users</h5>
                    <h1 class="card-text">100</h1>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection