@extends('layouts.app')

@section('content')

  <div class="container altura">

    @if (count($errors) > 0)
      <div class="errores">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="divErrores">

    </div>

    <div class="row">
      <form id="loginform" class="col-md-12" action="/login" method="post">
        {{ csrf_field() }}

        <div class="formulario-log">
          <div class="form-group col-md-12">
            <label for="email">Email:</label>
            <input class="email" type="email" name="email" value="">
          </div>

          <div class="form-group col-md-12">
            <label for="password">Password:</label>
            <input class="password" type="password" name="password" value="">
          </div>

          <div class="form-group">
            <input type="submit" name="login" value="login">
          </div>
        </div>

      </form>
    </div>
  </div>

  <script type="text/javascript" src="\js\scrypt.js">

  </script>

@endsection
