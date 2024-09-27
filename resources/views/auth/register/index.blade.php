<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    {{-- icon --}}
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}" width="150px;" type="image/png">
    <title>{{ $title }}</title>
</head>
<body>
    
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-5 my-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('LoginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('LoginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <div class="row badan">
        <div class="login-box">
            <h2>Daftar Sekarang</h2>
            <form action="/register" method="POST">
                @csrf
                <div class="user-box">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Lengkap" required value="{{ old('name') }}" autofocus>
                    @error('name')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <label for="name">Nama Lengkap</label>
                </div>
                <div class="user-box">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat Email" value="{{ old('email') }}" name="email" tabindex="1" required >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label>Alamat Email</label>
                </div>
                <div class="user-box">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" tabindex="2" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label>Password</label>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Register
                    </button>
                </div>
                <small class="d-block text-center mt-2">Already Registered ? <a href="/login">Login</a></small>
            </form>
        </div>
    </div>
</div>
    
<div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>