@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <form class="" action="index.html" method="post">
        {{ csrf_field() }}

        <div class="form-group col-md-12">
          <label for="name">Nombre:</label>
          <input id="name" type="text" name="name" value="" placeholder="nombre">
        </div>

        <div class="form-group col-md-12">
          <label for="email">Mail:</label>
          <input id="email" type="email" name="email" value="" placeholder="mail">
        </div>

        <div class="form-group col-md-12">
          <textarea name="question" rows="8" cols="80"></textarea>
        </div>

        <div class="form-group">
          <input type="submit" name="send" value="Enviar">
        </div>

      </form>
    </div>
  </div>

@endsection
