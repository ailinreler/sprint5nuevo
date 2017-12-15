@extends('layouts.app')

@section('content')

  <div class="container altura">
    <div class="row">
      <div class="col-md-12">
        <ul class="cart">
          @foreach ($carrito as $cart)

            <div class="cartdiv">
              <p>{{$cart->name}}</p><br>
              <img class="imagencarrito" src="{{$cart->imagen}}" alt="">
              <a href="/eliminarcarrito/{{$cart->id}}">X</a>
              <div class="linea">

              </div>

            </div>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

@endsection
