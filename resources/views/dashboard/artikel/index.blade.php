@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-md-12 bg-white rounded-3">
        @if (session()->has('success'))
            <div class="alert alert-info text-white alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive my-5">
            <table class="table text-center table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-dark">No</th>
                        <th class="text-dark">Judul</th>
                        <th class="text-dark">Kategori</th>
                        <th class="text-dark">Dibuat</th>
                        <th class="text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="text-dark my-auto">{{ $loop->iteration }}</td>
                        <td class="text-dark my-auto">{{ $post->title }}</td>
                        <td class="text-dark my-auto">{{ $post->category->name }}</td>
                        <td class="text-dark my-auto">{{ $post->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="/dashboard/artikel-saya/{{ $post->slug  }}" class="btn btn-primary my-2"><i class="fas fa-eye text-white"></i></a>
                            <a href="/dashboard/artikel-saya/{{ $post->slug }}/edit" class="btn btn-success my-2"><i class="fas fa-pen-square text-white"></i></a>
                            <form action="/dashboard/artikel-saya/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger my-2" onclick="return confirm('Apa Kamu Yakin Akan Menghapus Artikel Ini ?')"><i class="fas fa-trash-alt text-white text-center"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection