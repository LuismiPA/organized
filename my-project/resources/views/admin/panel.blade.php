@extends('plantilla')

@section('title')
    Panel de control | Admin
@endsection

@section('csspropio')
    <link rel="stylesheet" href="{{ asset('assets/css/panelControl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/panelControl.css') }}">
    
@endsection

@section('principal')
    <div id="app">
        <div class="contenido">
            <nav class="text-center">
                <img src="{{ asset('assets/images/panel_logo.png') }}" alt="logo">
                <div class="d-flex justify-content-between">
                    <router-link :to="{ name: 'profile' }">
                        Perfil
                    </router-link>
                    <router-link :to="{ name: 'panelUsers' }">
                        clientes
                    </router-link>
                    <router-link :to="{ name: 'panelApart' }">
                        Apartamentos
                    </router-link>
                    @guest
                        <a href="#">ERROR</a>
                    @else
                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>
            </nav>
                <router-view></router-view>
        </div>
    </div>
@endsection

@section('jspropio')
    <script src={{ asset('js/app.js') }}></script>
@endsection
