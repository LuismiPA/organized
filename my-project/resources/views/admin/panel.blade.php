@extends('plantilla')

@section('title')
    Panel de control | Admin
@endsection

@section('csspropio')
<link rel="stylesheet" href="{{asset('assets/css/panelControl.css')}}">
@endsection

@section('principal')
    
<div class="contenido">
    <nav class="text-center">
        <img src="{{ asset('assets/images/panel_logo.png') }}" alt="logo">
          <div class="d-flex justify-content-between">
            <a href="#" id="principal"><li  class="d-inline" >principal</li></a>
            <a href="#" id="clientes"><li  class="d-inline">clientes</li></a>
            <a href="#" id="misDatos"><li  class="d-inline" >mis datos</li></a>
            <a href="#" id="misDatos"><li  class="d-inline" >mis datos2</li></a>
             @guest
                            <a href="#">ERROR</a>
                        @else
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        @endguest
          </div>
    </nav>
    <article id="principalDetalle">
          <h1>principal detalles</h1>
    </article>
    <article id="datosDetalle">
          <apartamentos-tabla></apartamentos-tabla>
    </article>

    <article id="clientesDetalle">
       <div id="app">
          <usuarios-tabla></usuarios-tabla>
       </div>
</div>

@auth
    
@endauth
@endsection

@section('jspropio')
  <script src={{asset('assets/js/panelControl.js')}}></script>
  <script src={{asset('js/app.js')}}></script>
@endsection