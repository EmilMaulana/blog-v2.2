@extends('layouts.main')


@section('content')


<div class="row justify-content-center">
    <div class="col-md-5 mt-4">
        <h4 class="mt-5 mb-2 text-center">Semua Kategori</h4>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        @foreach ( $categories as $category )
            <div class="col-md-3 my-3">
                <a href="/artikel?category={{ $category->slug }}" class="text-decoration-none">
                    <div class="card shadow rounded-3">
                        <div class="" style="" >
                            <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top img-fluid" alt="{{ $category->name }}" >
                        </div>
                        <div class="card-body">
                                <h6 class="card-text fw-bold text-dark mt-2 mb-n1">{{ $category->name }}</h6>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

    {{-- @foreach ($categories as $category)

    <ul>
        <li>
            <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a> </h2>
        </li>
    </ul>

        
    @endforeach --}}

@endsection

