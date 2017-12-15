@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">

      <form action="/addproduct" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Nombre del producto</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nuevo producto">
      </div>
      <div class="form-group">
        <label for="precio">Precio del producto</label>
        <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio">
      </div>
      <div class="form-group">
        <label for="imagen">Imagen de producto</label>
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

      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </div>
  </div>

@endsection
