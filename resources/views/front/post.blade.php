@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-9 mt-5">
            <div class="card rounded-3">
                <div class="card-body">
                    @if ($post->image)
                        <div style="">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img img-fluid rounded-3" alt="{{ $post->category->name }}" class="img-fluid">
                        </div>
                    @else      
                        <img src="https://source.unsplash.com/1200x650?{{ $post->category->name }}" class="card-img img-fluid rounded-3" alt="{{ $post->category->name }}" class="img-fluid">
                    @endif
                    <a href="/artikel?category={{ $post->category->slug }}" class="text-white text-decoration-none badge bg-danger mt-2"> {{ $post->category->name }}</a>
                    <h3 class="fw-bold mt-1">{{ $post->title }}</h3>
                    <p class="mt-3 mb-2">
                        <img src="{{ asset('assets/img/me.png') }}" class="img-profile" alt="" style="width: 40px">
                        <small><a href="/artikel?user={{ $post->user->name }}" class="ms-2 text-dark text-decoration-none">{{ $post->user->name }}</a></small>
                        <i class="ms-4 fas fa-clock me-2"></i><small class="text-secondary ">{{ $post->created_at->isoFormat(' D MMMM Y') }}</small> 
                    </p>
                    <article class="mt-4 mb-2 text-justify">
                        <p>{!! $post->body !!}</p>
                    </article>
                    <div class="input-group mt-5">
                        <input type="text" class="form-control" readonly value="http://127.0.0.1:8000/artikel/{{ $post->slug }}" id="myInput">
                        <button class="btn btn-danger" id="copyButton" data-toggle="popover" data-placement="top" data-content="Teks disalin!" onclick="copyToClipboard()">Share <i class="fa-solid fa-share-from-square"></i></button>
                    </div>
                </div>
            </div>
            
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 text-center mt-2">
                            <img src="{{ asset('assets/img/me.png') }}" class="img-profile rounded-circle" alt="" style="width: 100px">
                        </div>
                        <div class="col">
                            <p>
                                <span class="fw-bold">Emil Maulana</span>
                                <br>
                                <span class="text-secondary">
                                    Halo semuanya, saya Emil seorang junior yang sedang mengejar gelar sarjana komputer di Universitas Singaperbangsa Karawang. 
                                    Memiliki minat besar untuk berkarier di bidang teknologi dan informasi.
                                </span>
                                <br>
                                <a class="text-secondary fs-4 text-center" href="https://www.instagram.com/emilmaul_" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                <a class="ml-3 text-secondary fs-4 text-center" href="https://www.tiktok.com/@emilmaul__" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                <a class="ml-3 text-secondary fs-4 text-center" href="https://emilmaulana.online" target="_blank"><i class="fa-solid fa-globe"></i></a>
                                <a class="ml-3 text-secondary fs-4 text-center" href="mailto:emilmaulana10@gmail.com" target="_blank"><i class="fa-solid fa-envelope"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-5">
            <div class="">
                <div class="card-body">
                    <h5><i class="fa-solid fa-book"></i> Artikel Terbaru</h5>
                    <hr class="">
                    @foreach ($terbaru as $terbaru)
                    <div class="mt-2">
                        <a href="/artikel/{{ $terbaru->slug }}" class="text-decoration-none">
                            @if ($terbaru->image)
                                <div style="max-height: 190px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $terbaru->image) }}" class="rounded-3 card-img img-fluid" alt="{{ $terbaru->category->name }}" >
                                </div>
                            @else      
                                <img src="https://source.unsplash.com/1200x680?{{ $terbaru->category->name }}" class="card-img img-fluid rounded-3 " alt="{{ $terbaru->category->name }}" class="img-fluid">
                            @endif
                            <h6 class="card-text fw-bold text-dark mt-2 mb-n1">{{ $terbaru->title }}</h6>
                            <small class="text-secondary">Oleh : {{ $post->user->name }}</small>
                            <br>
                            <h6 class="badge bg-danger text-white">{{ $terbaru->category->name }}</h6>
                        </a>
                        <br>
                        <hr>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card bg-white rounded-3">
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
        </div>
    </div>
</div>
    <script>
        function copyToClipboard() {
            // Pilih elemen input teks
            var inputElement = document.getElementById("myInput");

            // Pilih teks dalam elemen input
            inputElement.select();
            inputElement.setSelectionRange(0, 99999); // Untuk kompatibilitas seluruh rentang peramban

            // Salin teks ke clipboard
            document.execCommand("copy");

            // Deselect elemen input
            inputElement.setSelectionRange(0, 0);

            // Berikan umpan balik bahwa teks telah disalin
            alert("Teks telah disalin ke clipboard: " + inputElement.value);
        }
    </script>
    
@endsection