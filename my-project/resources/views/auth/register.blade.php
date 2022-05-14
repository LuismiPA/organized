@extends('plantilla')

@section('csspropio')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endsection

@section('principal')
    <div class="main">
        <div class="container mx-auto">
            <div class="middle">
                
                <div id="login">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="d-flex">
                            <div class="d-flex">
                                <p><span class="fa fa-user"></span>
                                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" required placeholder="Nombre"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="fa fa-at"></span>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                            </div>


                            </p>

                        </div>

                        <div class="">
                            <p><span class="fa fa-key"></span>
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="fa fa-repeat"></span>
                            <input id="password-confirm" type="password" class="" name="password_confirmation"
                                placeholder="Confirmación Password" required autocomplete="new-password">
                            </p>
                        </div>

                        <button type="submit" id="enviar" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                </div>
                <div class="clearfix"></div>
                <div class="logo">
                    <img src="{{ asset('assets/images/logo_trans.png') }}" alt="logo">
                    <div class="clearfix"></div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
