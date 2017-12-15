@extends('layouts.app')

@section('content')


  <div class="container altura">
    <div class="row">
      <div class="col-md-12">
        <form class="editform" action="/updateproduct/@if (isset($products[0]->id))
          {{$products[0]->id}}
        @endif" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}

          <div class="form-group col-md-12">

            <select class="producto" name="name">
              @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}} - $ {{$product->precio}}</option>
              @endforeach
            </select>

          </div>

          <div class="form-group col-md-12">
            <div class="form-group">
              <label for="name">Nombre del Producto:</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="nombre">
            </div>

            <div class="form-group">
              <label for="precio">Precio del Producto:</label>
              <input type="number" name="precio" class="form-control" id="precio" placeholder="precio">
            </div>

            <div class="form-group">
              <label for="imagen">Imagen del Producto:</label>
              <input type="file" id="imagen" name="imagen">
            </div>

            <div class="form-group">
              <select class="" name="category_id">
                <option value="">Elegir categoria</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <select class="" name="brand_id">
                <option value="">Elegir marca:</option>
                @foreach ($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <p>Elegir Tags:</p>
              @foreach ($tags as $tag)
                <div class="">
                  <label for="{{$tag->name}}">{{$tag->name}}</label>
                  <input id="{{$tag->name}}" type="checkbox" name="tag[]" value="{{$tag->id}}">
                </div>
              @endforeach
            </div>

            <button type="submit" class="btn btn-default">Guardar cambios</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function cambiarAction(){
      var formulario = document.querySelector('.editform');
      var selectInput = document.querySelector('.producto');
      formulario.setAttribute('action', '/updateproduct/' + selectInput.value);
    }

    document.querySelector('.producto').addEventListener('change', cambiarAction);

  </script>

@endsection
