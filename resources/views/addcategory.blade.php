@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

          <p>Lista de Categorias:</p>

          <ul>
            @foreach ($categories as $category)
              <li>{{$category->name}}</li>
            @endforeach
          </ul>

          <form class="" action="/addcategory" method="post">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">Nombre de Categoría:</label>
              <input type="text" name="name" value="">
            </div>

            <div class="form-group">
              <input type="submit" name="send" value="Agregar">
            </div>

          </form>
      </div>
    </div>
  </div>

@endsection
