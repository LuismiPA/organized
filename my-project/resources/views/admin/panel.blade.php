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
          </div>
    </nav>
    <article id="principalDetalle">
          <h1>principal detalles</h1>
    </article>
    <article id="clientesDetalle">
      <h1>Panel de control | Admin </h1>
          <form>
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Address 2</label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                      <option selected>Choose...</option>
                      <option>...</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
                </div>
      
              <div class="form-row">
                  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Habitaciones</label>
                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
                  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Baños</label>
                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
              </div>
      
              <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="solarium">
                    <label class="form-check-label" for="solarium">
                      Solarium
                    </label>
              </div>
      
              <button type="submit" class="btn btn-primary my-1">Submit</button>
            </form>
    </article>

    <article id="datosDetalle">
          <h1>Mis datos detalles</h1>
    </article>
</div>
@endsection

@section('jspropio')
  <script src={{asset('assets/js/panelControl.js')}}></script>
@endsection