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
    <div class="row justify-content-center mt-5">
        <div class="col-md-5 mt-5">
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
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <div class="user-box">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Alamat Email" value="{{ old('email') }}" name="email" tabindex="1" required autofocus>
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
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label text-white" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="row justify-content-center">
                    <button class="btn btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Login
                    </button>
                </div>
                <small class="d-block text-center mt-3 text-white">Not Registered ? <a href="/register" class="text-white">Register now</a></small>
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