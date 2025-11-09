@extends('layouts.app')

@section('title', 'Categories - EduFun')

@section('content')
<div class="container">
    <h1 class="mb-4">Categories</h1>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-6">
            <div class="category-card">
                <h3>{{ $category->name }}</h3>
                <p class="text-muted">{{ $category->description ?? 'Explore articles in this category' }}</p>
                <a href="{{ route('category.show', $category->slug) }}" class="btn btn-primary">View Articles</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

