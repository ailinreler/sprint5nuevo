@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <form class="formulario" action="/removeCategory/{{$categories[0]->id}}" method="post">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <div class="form-group">
            <p>Eliminar Categoria:</p>

            <select class="categoria" name="name">
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <input type="submit" name="" value="Eliminar">
          </div>
        </form>

      </div>
    </div>
  </div>

  <script type="text/javascript">

    function cambiarAction() {
      var formulario = document.querySelector('.formulario');
      var inputSeleccionado = document.querySelector('.categoria');
      formulario.setAttribute('action', '/removeCategory/' + inputSeleccionado.value);
    }

    document.querySelector('.formulario').addEventListener('change', cambiarAction);

  </script>

@endsection
