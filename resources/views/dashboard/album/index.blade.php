@extends('layouts.dashboard')

@section('content')

<div class="row">
    @if (session()->has('success'))
        <div class="alert alert-info text-white alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<div class="row justify-content-center">
    <div class="col-md-12 bg-white text-center rounded-3">
        <button class="btn btn-info my-5" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-images me-1"></i> Tambah Gambar</button>
    </div>
</div>
    <div class="row justify-content-center mt-5">
        @foreach ($albums as $album)
            <div class="col-md-6 rounded-3">
                <div class="card bg-white shadow">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $album->image) }}" alt="Album" class="img-fluid">
                        <form action="/dashboard/album/{{ $album->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger mt-3" onclick="return confirm('Apa Kamu Yakin Akan Menghapus Gambar Ini ?')"><i class="fas fa-trash-alt text-white text-center"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/dashboard/album/tambah" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Gambar</label>
                <br>
                <input type="file" id="image" name="image" required class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection