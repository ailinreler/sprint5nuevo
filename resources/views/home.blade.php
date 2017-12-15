@extends('layouts.app')

@section('content')

  <div class="altura">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Lo mejor en electrónica en un solo lugar.</h1>
        <img src="/images/iphone.png" alt="">
      </div>
    </div>

    <div class="row">

      <h2 class="text-center">Productos Destacados</h2>

      @foreach ($destacados as $destacado)
        <div class="col-md-3">
          <div class="text-center destacados">
            <img src="{{$destacado->imagen}}" alt="">
            <div class="capa">
              <div class="capita">
                <span>+</span>
                <p>{{$destacado->name}}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>

    <div class="row text-center">
      <div class="col-md-12 elegirnosh2">
        <h2>Por qué elegirnos</h2>
      </div>

      <div class="col-md-4 elegirnos">
        <h3>Calidad</h3>
        <p>Nuestro productos estan certificados por normas de calidad internacional.</p>
      </div>
      <div class="col-md-4 elegirnos">
        <h3>Confianza</h3>
        <p>Llevamos más de 20 años brindando confianza a nuestro clientes.</p>
      </div>
      <div class="col-md-4 elegirnos">
        <h3>Soporte 24hs!</h3>
        <p>Podés comunicarte con nosotros las 24hs antes cualquier duda o inconveniente.</p>
      </div>
    </div>

    <div class="row text-center masvendidos">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <h2>Los mas vendidos</h2>
          </div>

          <div class="col-md-12">
            <div class="col-md-4">
              <img src="{{$products[0]->imagen}}" alt="">
            </div>
            <div class="col-md-4">
              <img src="{{$products[1]->imagen}}" alt="">
            </div>
            <div class="col-md-4">
              <img src="{{$products[2]->imagen}}" alt="">
            </div>
          </div>
        </div>


      </div>
    </div>

    <div class="row text-center">

      <div class="col-md-12">
        <h2>Lo que dicen nuestros clientes</h2>
      </div>

      <div class="col-md-12 comentarios">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <img src="{{$products[0]->imagen}}" alt="">
            </div>

            <div class="col-md-8">
              <p>el mejor lugar donde comprar electronica</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <img src="{{$products[0]->imagen}}" alt="">
            </div>

            <div class="col-md-8">
              <p>el mejor lugar donde comprar electronica</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
