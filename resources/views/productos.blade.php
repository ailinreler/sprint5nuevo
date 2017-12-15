@extends('layouts.app')

@section('content')

  {{-- comienzo barra de categorias y tags --}}

  <div class="row">
    <div class="col-md-3">
      <form class="" action="/buscadorproductos" method="post">
        {{ csrf_field() }}

        <div class="">
          <p>Categorias</p>

          <div class="">
            @foreach ($categories as $category)
              <div class="">
                <label for="{{$category->name}}">{{$category->name }}</label>
                <input id="{{$category->name}}" type="checkbox" name="categories[]" value="{{$category->id}}">
              </div>
            @endforeach
          </div>
        </div>



        <div class="">
          <p>Marca</p>

          @foreach ($brands as $brand)
            <div class="">
              <label for="{{$brand->name}}">{{$brand->name}}</label>
              <input id="{{$brand->name}}" type="checkbox" name="brands[]" value="{{$brand->id}}">
            </div>
          @endforeach
        </div>

        <div class="">
          <p>Tags:</p>

          @foreach ($tags as $tag)
            <div class="">
              <label for="{{$tag->name}}">{{$tag->name}}</label>
              <input id="{{$tag->name}}" type="checkbox" name="tags[]" value="{{$tag->id}}">
            </div>
          @endforeach
        </div>

        <input type="submit" name="" value="Buscar">

      </form>
    </div>

    {{-- fin categorias y tags --}}

    {{-- comienzo listado de productos --}}

    <div class="col-md-9">
      <div class="row productos">
        @foreach ($products as $product)
          <div class="col-md-3 productos-height">
            <div class="">
              <img src="\storage\{{$product->imagen}}" alt="">
              <div class="">
                <p>{{$product->name}} - ${{$product->precio}}</p>
              </div>
            </div>
            @if (Auth::check())
              <a href="/agregarCarrito/{{$product->id}}">Agregar al carrito</a>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection
