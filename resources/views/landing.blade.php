<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPKLU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        .img-banner{
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            object-position: center;
        }
        .banner-caption{
            position: absolute;
            top: 0;
            bottom: 0;
            margin-top: auto;
            margin-bottom: auto;
            left: 45px;
            display: flex;
        }
        .btn-round{
            border-radius: 25px !important;
            padding: 10px 25px 10px 25px;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    {{-- nav menu --}}
    {{-- <nav class="navbar bg-body-tertiary fixed-top" style="opacity: 0.7">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">SPKLU</span>
        </div>
    </nav> --}}
    {{-- end nav --}}

    <div class="banner position-relative">
        <img src="{{asset('landing/banner.svg')}}" class="img-banner" alt="...">
        <div class="container banner-caption">
            <div class="row mt-auto mb-auto w-100">
                <div class="col-md-6" style="color: #606060;">
                    <h1>Platform Digital</h1>
                    <h3>Stasiun Pengisian Kendaraan Listrik Umum (SPKLU)</h3>
                    <br>
                    <button class="btn btn-warning btn-round" onclick="loginForm()">Gunakan Stasiun</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" onclick="closeForm()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                    <h4 class="text-center">Masuk Untuk Menggunakan</h4>
                    <br>
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" onclick="submitLogin()" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function loginForm(){
            $('#staticBackdrop').modal('show');
            localStorage.setItem('isOpenModal', 'true');
        }
        function closeForm(){
            $('#staticBackdrop').modal('hide');
            localStorage.setItem('isOpenModal', 'false');
        }
        function submitLogin(){
            localStorage.setItem('isOpenModal', 'false');
            $('#loginForm').submit();
        }
        window.onload = function() {            
            let isOpen = localStorage.getItem('isOpenModal');
            if(isOpen == 'true'){
                $('#staticBackdrop').modal('show');
            }else{
                $('#staticBackdrop').modal('hide');
            }
        };
    </script>
  </body>
</html>