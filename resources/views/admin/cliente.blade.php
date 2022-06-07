@extends('plantilla')

@section('title')
    Panel de control | Admin
@endsection

@section('csspropio')
<link rel="stylesheet" href="{{asset('assets/css/panelControl.css')}}">
@endsection

@section('principal')
<div class="contenido">
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