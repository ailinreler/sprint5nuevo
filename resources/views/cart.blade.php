@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="cart">
          @foreach ($carrito as $cart)
            <p>{{$cart->name}}</p>
              <a href="/eliminarcarrito/{{$cart->id}}">X</a>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

@endsection
