@extends('layouts.app')

@section('content')

  <div class="container altura">
    <div class="row">
      <div class="col-md-12">
        <form class="deleteform" action="/deleteproduct/@if (isset($products[0]->id))
          {{$products[0]->id}}
        @endif" method="post">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

          <div class="form-group col-md-12">
            <p>Elegir producto a eliminar:</p>
            <select class="producto" name="name">
              @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}} - $ {{$product->precio}}</option>
              @endforeach
            </select>

          </div>

          <div class="group-form">
            <input type="submit" name="" value="Eliminar">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function cambiarAction(){
      var formulario = document.querySelector('.deleteform');
      var inputdelete = document.querySelector('.producto').value;
      formulario.setAttribute('action', '/deleteproduct/' + inputdelete);
    }

    document.querySelector('.deleteform').addEventListener('change', cambiarAction);

  </script>

@endsection
