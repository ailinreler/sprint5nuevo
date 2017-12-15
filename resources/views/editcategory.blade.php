@extends('layouts.app')

@section('content')

  <div class="container altura">
    <div class="row">
      <div class="col-md-12">
        <form class="formulario" action="editcategory/{{$categories[0]->id}}" method="post">
          {{ csrf_field() }}
          {{ method_field('PATCH')}}

          <div class="form-group">
            <select class="category" name="">
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="name">Editar nombre:</label>
            <input type="text" name="name" value="">
          </div>

          <div class="form-group">
            <input type="submit" name="enviar" value="Editar">
          </div>

        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">

    function cambiarAction() {

      var formulario = document.querySelector('.formulario');
      var inputSeleccionado = document.querySelector('.category');
      formulario.setAttribute('action', '/editcategory/' + inputSeleccionado.value);

    }

    document.querySelector('.category').addEventListener('change', cambiarAction);

  </script>

@endsection
