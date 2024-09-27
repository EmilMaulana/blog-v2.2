@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 bg-white rounded-3">
            <h3 class="mt-4">Edit Post</h3>                          
            <form method="POST" action="/dashboard/artikel-saya/{{ $post->slug }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" readonly value="{{ old('slug', $post->slug) }}">   
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="" class="form-control" placeholder="Category">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>        
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Post Image</label>
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-8 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-8">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                        <textarea name="body" id="body" cols="30" rows="7" class="form-control" value="{{ old('body') }}">{{ $post->body }}</textarea>
                        @error('body')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Update Artikel</button>
            </form>
        </div>
    </div>
    
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/author/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

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