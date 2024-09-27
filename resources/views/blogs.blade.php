@extends('layouts.main')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <h4 class="mb-3 text-dark text-center">{{ $title }}</h4>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/artikel">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Belajar Apa Hari Ini ?" name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search
                </button>
                </div>
            </form>
        </div>
    </div>



    @if ($posts->count())
        <div class="card mb-3 shadow rounded-3">
            @if ($posts[0]->image)
                <div style="max-height: 350px; overflow:hidden;" class="rounded-top">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}" class="img-fluid">
                </div>
            @else      
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <h3><a href="/artikel/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{$posts[0]->title }}</a></h3>
                <p>
                    <small>
                        Oleh : <a href="/artikel?user={{ $posts[0]->user->name }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> di <a href="/artikel?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{!! $posts[0]->excerpt !!}</p>
                <a href="/artikel/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Selengkapnya...</a>           
            </div>
        </div>
    

    

    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4">
            <div class="card mb-3 mt-3 rounded-3 shadow">
                {{-- <div class="position-absolute px-2 py-1 " style="background-color: rgba(0,0,0,0.7) "> <a href="/blogs?category={{ $post->category->slug }}" class="text-white text-decoration-none"> {{ $post->category->name }}</a></div> --}}
                @if ($post->image)
                <div class="" style="max-height: 200px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid" >
                </div>
                @else      
                    <img src="https://source.unsplash.com/300x170?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                <div class="card-body">
                    <h6 class=""><a href="/artikel/{{ $post->slug }}" class="text-decoration-none">{{$post->title }}</a></h6>
                    <a href="/artikel?category={{ $post->category->slug }}" class="text-white text-decoration-none badge bg-danger"> {{ $post->category->name }}</a>
                    <p class="text-dark">
                        <small>
                            Oleh : <a href="/artikel?user={{ $post->user->name }}" class="text-decoration-none">{{ $post->user->name }}</a>
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                    {{-- <a href="/blogs/{{ $post->slug }}" class="btn btn-primary">Read more</a> --}}
                </div>
            </div>
        </div>
            @endforeach
    </div>
    @else
    <p class="text-center fs-4">No post found. </p>
    @endif

    <div class="d-flex justify-content-center">
         {{ $posts->links() }}
    </div>
</div>  

@endsection

