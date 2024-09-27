@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-12 bg-white rounded-3">
            <h3 class="mt-3">{{ $post->title }}</h3>

            <a href="/dashboard/artikel-saya" class="btn btn-success"><i class="fas fa-arrow-left"></i> Kembali Ke Semua Artikel</a>
            <a href="/dashboard/artikel-saya/{{ $post->slug }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
            <form action="/dashboard/artikel-saya/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Apa Kamu Yakin Akan Menghapus Artikel Ini ?')"><i class="fas fa-trash-alt text-white text-center"></i>Delete</button>
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

@endsection