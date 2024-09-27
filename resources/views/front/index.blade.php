@extends('layouts.main')

@section('content')
        
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8"> 
            <form action="/artikel" class="d-flex mb-3 mt-5">
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
            {{-- <form class="d-flex mb-3 mt-5">
                <input class="form-control me-2" type="search" placeholder="Pencarian" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}

            <div class="judul">
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">Posts Terbaru</h5>
                        <span class="divider mt-2 mb-2"></span>
                    </div>
                </div>
            </div>
            @if ($posts->count())
                <a href="/artikel/{{ $posts[0]->slug }}" class="text-decoration-none">
                    <div class="card shadow rounded-3">
                        <div style="max-height: 400px; overflow:hidden;" class="mt-n3">
                            @if ($posts[0]->image)
                                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top mt-3" alt="{{ $posts[0]->category->name }}" class="img-fluid">
                            @else      
                                <img src="https://source.unsplash.com/1200x600?{{ $posts[0]->category->name }}" class="card-img-top mt-3" alt="{{ $posts[0]->category->name }}" class="img-fluid">
                            @endif
                        </div>
                        <div class="card-body">
                            <h6 class="card-text fw-bold text-dark">{{ $posts[0]->title }}</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="badge bg-danger text-white">{{ $posts[0]->category->name }}</h6>
                                </div>
                                <div class="col ms-auto">
                                    <small class="text-secondary">{{ $posts[0]->created_at->isoFormat('D MMMM Y') }} | </small>
                                    <small class="text-secondary"><i class="fa-solid fa-eye"></i>  {{ $posts[0]->views }} views</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                {{-- pemisah card --}}
                <div class="row">
                    @foreach ($posts->skip(1) as $post)
                    <div class="col-md-6">
                        <a href="/artikel/{{ $post->slug }}" class="text-decoration-none">
                            <div class="card mt-2 shadow rounded-3">
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img img-fluid" alt="{{ $post->category->name }}" class="img-fluid">
                                    <h6 class="card-text fw-bold text-dark mt-2">{{ $post->title }}</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="badge bg-danger text-white">{{ $post->category->name }}</h6>
                                            <small class="text-secondary">{{ $post->created_at->isoFormat('D MMMM Y') }} | </small>
                                            <small class="text-secondary"><i class="fa-solid fa-eye"></i>  {{ $post->views }} views</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            @else
            <div class="row justify-content-center mb-5">
                <div class="col-md-5 mb-5">
                    <div class="img-fluid text-center">
                        <img src="{{ asset('assets/svg/cari.svg') }}" alt="" width="200px">
                    </div>
                    <h5 class="text-center fw-bold fs-4 ">Ups!... tidak ada hasil yang ditemukan</h5>
                    <p class="text-center fs-5">Silakan coba pencarian lain</p>
                </div>
            </div>
            @endif
            {{-- <div class="d-flex justify-content-center mt-5 mb-1">
             {{ $posts->links() }}
            </div> --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-md-4 mt-5 mb-3 position-fixed-left">
            <div class="card bg-white shadow rounded-3">
                <div class="card-body">
                    <h5><i class="fas fa-rss-square text-dark"></i> Newsletter</h5>
                    <p>Mau dapat info dan tips belajar coding ke emailmu?</p>
                    <form action="/kirim-email" method="POST">
                        @csrf
                        <label for="name">Nama :</label>
                        <input type="text" class="form-control mb-2" name="nama" required placeholder="Nama Kamu..">
                        <label for="email">Email :</label>
                        {{-- <input type="text" class="form-control rounded-3" name="email" required placeholder="Alamat Email.."> --}}
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Alamat Email.." required>
                        @error('email')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                        
                        <button type="submit" class="btn btn-success btn-block mt-2">Ya, Saya Mau</button>
                    </form>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- <div class="mt-5">
                <h5><i class="fa-solid fa-book"></i> Kategori </h5>
                <hr>
                @foreach ( $categories as $categories )
                    <a href="/artikel?category={{ $categories->slug }}" class="text-decoration-none ">
                        <h6 class="card-text fw-bold text-dark mt-3 mb-n1">{{ $categories->name }}</h6>
                    </a>
                @endforeach
            </div> --}}
        </div>
    </div>
</div>

@endsection