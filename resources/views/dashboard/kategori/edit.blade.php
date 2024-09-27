@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 bg-white rounded-3">
        <h3 class="my-5">Edit Kategori</h3>                          
        <form method="POST" action="/dashboard/categories/{{ $categories->slug }}/edit" enctype="multipart/form-data">
           @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ $categories->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug"  value="{{ $categories->slug }}">   
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                @if ($categories->image)
                    <img src="{{ asset('storage/' . $categories->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Kategori</button>
            <a href="/posts" class="btn btn-success"><i class="fas fa-arrow-left"></i> Kembali</a>
        </form>
    </div>
</div>
    
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display ='block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
    

@endsection