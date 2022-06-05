@extends('plantilla')

@section('title')
    Panel de control | Admin
@endsection

@section('csspropio')
    <link rel="stylesheet" href="{{ asset('assets/css/panelControl.css') }}">    
@endsection

@section('principal')
    <div id="app">
        <div class="contenido">
            <nav class="text-center pt-5">
                <div class="mt-auto mb-auto">
                    <img src="{{ asset('assets/images/panel_logo.png') }}" alt="logo">
                    <div class="d-flex justify-content-between">
                       {{--  <router-link :to="{ name: 'apartamento_perfil' }">
                            Perfil
                        </router-link> --}}
                        <router-link :to="{ name: 'adminUsers' }">
                            Clientes
                        </router-link>
                        <router-link :to="{ name: 'apartamentos_tabla' }">
                            Apartamentos
                        </router-link>
                        <router-link :to="{ name: 'trabajos_tabla' }">
                            Trabajo Pendiente
                        </router-link>
                        <router-link :to="{ name: 'bienvenida' }">
                            Bienvenida
                        </router-link>
                        @guest
                            @if (Route::has('login'))
                                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endif
                        @else
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </nav>
                <router-view></router-view>
        </div>
    </div>
@endsection

@section('jspropio')
    <script src={{ asset('js/app.js') }}></script>
@endsection
