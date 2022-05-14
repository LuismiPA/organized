@extends('plantilla')

@section('csspropio')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endsection

@section('principal')
    <div class="main">
        <div class="container mx-auto">
            <div class="row justify-content-center">
                <div class="middle">
                    <div id="login">
                        <div class="">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="">
                                    <div class="">
                                        <p><span class="fa fa-user"></span><input id="email" type="email"
                                            class="@error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                                        </p>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="">
                                    <div class="">
                                        <p><span class="fa fa-lock"></span><input id="password" type="password"
                                            class="@error('password') is-invalid @enderror" name="password" placeholder="Password"
                                            required autocomplete="current-password">
                                        </p>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="">
                                    <div class="">
                                        <div class="">
                                            <label class="form-check-label" for="remember">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="">
                                    <div class="d-flex">
                                        <button type="submit" id="enviar" class="btn btn-primary">
                                            {{ __('Enviar') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" id="missPw" href="{{ route('password.request') }}">
                                                {{ __('Olvidé mi contraseña') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                        <div class="logo">
                            <img src="{{ asset('assets/images/logo_trans.png') }}" alt="logo">
                            <div class="clearfix"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
