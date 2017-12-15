window.addEventListener('load', function() {

  var formularioRegistro = document.querySelector('#register-form');
  var formularioLogin = document.querySelector('#loginform');
  var  errores = [];

  if (formularioRegistro !== null) {
    formularioRegistro.addEventListener('submit', function(e){
      e.preventDefault();

    errores = [];

    var username = document.querySelector('.username').value;
    var lastname = document.querySelector('.lastname').value;
    var password = document.querySelector('.password').value;
    var password_confirmation = document.querySelector('.password_confirmation').value;
    var email = document.querySelector('.email').value;

    if (username.length < 3) {
      errores.push('El nombre está vacio o tiene menos de 4 letras');
    }

    if (lastname.length < 3) {
      errores.push('no apellido está vacio o tiene menos de 4 letras');
    }


    if (password.length < 5) {
      errores.push('error al ingresar contraseña');

    }

    if (password !== password_confirmation) {
      errores.push('las contraseñas no coinciden');
    }

    if (email.length == 0) {
      errores.push('ingrese un email');
    }


    if (errores.length == 0) {
      formularioRegistro.submit();
    }else{
      var divErrores = document.querySelector('.divErrores');
      errores.forEach(function(error){
        var unError = document.createElement('p');
        unError.innerText = error;
        divErrores.append(unError);
      });
    }

    });
  }

  if (formularioLogin !== null) {
    formularioLogin.addEventListener('submit', function(e){
      errores = [];
      e.preventDefault();

      var email = document.querySelector('.email').value;
      var password = document.querySelector('.password').value;

      if (email.length == 0) {
        errores.push('ingresar usuario');
      }

      if (password.length == 0) {
        errores.push('ingresar contraseña');
      }

      if (errores.length == 0) {
        formularioLogin.submit();
      }else{
        var divErrores = document.querySelector('.divErrores');
        errores.forEach(function(error){
          var unError = document.createElement('p');
          unError.innerText = error;
          divErrores.append(unError);
        });

      }


    });
  }



})
