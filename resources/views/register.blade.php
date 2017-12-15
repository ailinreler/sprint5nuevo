@extends('layouts.app')

@section('content')

  <div class="container">

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
      <form  id="register-form" class="col-md-12" action="/register" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="formulario-log">
          <div class="form-group">
            <label for="name">nombre</label>
            <input class="username" type="text" name="name" value="" id="name">
          </div>

          <div class="form-group">
            <label for="last_name">apellido</label>
            <input class="lastname" type="text" name="last_name" value="" id="last_name">
          </div>

          <div class="form-group">
            <label for="email">email</label>
            <input class="email" type="email" name="email" value="" id="email">
          </div>

          <div class="form-group">
            <label for="password">password</label>
            <input class="password" type="password" name="password" value="" id="password">
          </div>

          <div class="form-group">
            <label for="password_confirmation">password</label>
            <input class="password_confirmation" type="password" name="password_confirmation" value="" id="password_confirmation">
          </div>

          <div class="form-group">
            <input type="submit" name="register" value="registrarse">
          </div>
        </div>

      </form>
    </div>
  </div>

  <script type="text/javascript" src="\js\scrypt.js">

  </script>

@endsection
