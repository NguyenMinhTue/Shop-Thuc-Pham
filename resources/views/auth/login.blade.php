@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main">

            <div class="main-w3l">

                <div class="w3layouts-main">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <h2>Đăng nhập</h2>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label style="color:white" for="email"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                            <div class="col-md-6">
                                                <input placeholder="Mời bạn nhập email" id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                                       autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label style="color:white"  for="password"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input placeholder="Mời bạn nhập password" id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="current-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <input type="submit" value="Đăng nhập">

                                            </div>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                                </li>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
