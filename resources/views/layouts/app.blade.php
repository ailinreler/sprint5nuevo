<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="/js/app.js">

  </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  {{-- HACER EL CARRITOOOOO --}}

  @if (Auth::check() && (Auth::User()->typeOfUser == 1 || Auth::User()->typeOfUser == 2))
    <div class="row">
      <div class="col-md-2">
        <p>Hola {{Auth::User()->name}} !</p>
      </div>
      <div class="col-md-10">
        <div class="text-right">


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul>
                <li class="dropdown text-right">
                  <a href="/carrito"> <span class="glyphicon glyphicon-shopping-cart"></span> </a>
                  @if (Auth::User()->typeOfUser == 2)
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class=" glyphicon glyphicon-cog"></span></a>
                  <ul class="dropdown-menu menu-admin">
                    <li><a href="/addproduct">Agregar Producto</a></li>
                    <li><a href="/editproduct">Editar Producto</a></li>
                    <li><a href="/deleteproduct">Eliminar Producto</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/addcategory">Agregar Categoria</a></li>
                    <li><a href="/editcategory">Editar Categoria</a></li>
                    <li><a href="/removeCategory">Eliminar Categoria</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Editar Usuario</a></li>
                    <li><a href="#">Eliminar Usuario</a></li>
                  </ul>
                  @endif
                </li>
              </ul>
            </div>


        </div>
      </div>
    </div>
  @endif

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Electronic</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li {{--class="active" --}}><a href="/">HOME</a></li>
          <li><a href="/productos">PRODUCTOS</a></li>
          <li><a href="/faq">FAQ</a></li>
          <li><a href="/contacto">CONTACTO</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li><a href="/login">login</a></li>
            <li><a href="/register">registrarse</a></li>
          @endif

          @if (Auth::check())
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">logout</a></li>
          @endif

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          {{-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li> --}}
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  @yield('content')

  <footer>
    <div class="row text-center">
      <div class="col-md-3">
        <h3>Electronic</h3>
      </div>
      <div class="col-md-3">
        <h3>CONTACTO</h3>
        <p>Podes contactarnos las 24 hs del dia al 4555-5555 o por email a ayuda@electronic@gmail.com</p>
      </div>
      <div class="col-md-3">
        <h3>Ayuda</h3>
        <ul>
          <li><a href="">faq</a></li>
          <li><a href="">contacto</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h3>Redes</h3>
      </div>
    </div>
  </footer>

</body>
</html>
