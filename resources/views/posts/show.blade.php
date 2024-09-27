@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>

            <a href="/posts" class="btn btn-success"><i class="fas fa-arrow-left"></i> Back to all my posts</a>
            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
            <form action="/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post? ?')"><i class="fas fa-trash-alt text-white text-center"></i>Delete</button>
            </form>

            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid">
                </div>
            @else      
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid">
            @endif

            <article class="my-3">
                <p>{!! $post->body !!}</p>
            </article>

            
        </div>
    </div>
</div>

@endsection