<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar Usuario</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
   idleTime = 0;
   var idleInterval = setInterval(timerIncrement, 60000);
   function timerIncrement()
     {
       idleTime++;
       if (idleTime > 2)
       {
          Bloquear();
          if (idleTime > 5)
           {
              Cerrar();
           }
       }
     }

     $(this).mousemove(function (e) {
        idleTime = 0;
     });

     $(this).keypress(function (e) {
          idleTime = 0;
      });

     function Bloquear()
     {
       $("#modal_bloqueo").removeData("modal").modal({backdrop: 'static', keyboard: false});
     }

     function Cerrar()
     {
      window.location="cerrar.php";
     }

      $(function(){

        $("#ins").on("click", function(){
          var formData=$("#formularios").serialize();
          var ruta = "comprobar.php";
          $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            success: function(datos)
            {
              $("#respuesta").html(datos);
            }

          });

        });
      });
  });

  $(function(){

        $("#in").on("click", function(){
          var formData=$("#formulario").serialize();
          var ruta = "registro.php";
          $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            success: function(datos)
            {
              $("#respuesta").html(datos);
            }
          });
        });

        $("#actualizar_captcha").on("click", function(){
          document.location.reload();
        });

      });
  $(document).ready(function() {
    $('#pswd_info').hide();
    $('input[type=password]').keyup(function() {
      // set password variable
      var pwd = $(this).val();
      //validate the length
    if ( pwd.length < 8 ) {
      $('#length').html('<p class="text-danger">Ingresa al menos 8 caracteres</p>');
    } else {
      $('#length').html('<p class="text-info">Cumple con al menos 8 caracteres</p>');
    }
    //validate letter
    if ( pwd.match(/[a-z]/) ) {
      $('#letter').html('<p class="text-info">Cumple con un caracter minúscula</p>');
    } else {
      $('#letter').html('<p class="text-danger">Ingresa por lo menos un caracter minúscula</p>');
    }

    //validate capital letter
    if ( pwd.match(/[A-Z]/) ) {
      $('#capital').html('<p class="text-info">Cumple con un caracter mayúscula</p>');
    } else {
      $('#capital').html('<p class="text-danger">Ingresa por lo menos un caracter mayúscula</p>');
    }
    //validar simbolo
    if ( pwd.match(/[^A-Za-z0-9_]/) ) {
      $('#simboly').html('<p class="text-info">Cumple con un caracter especial</p>');
    } else {
      $('#simboly').html('<p class="text-danger">Ingresa por lo menos un caracter especial</p>');
    }
    //validate number
    if ( pwd.match(/\d/) ) {
      $('#number').html('<p class="text-info">Cumple con un caracter numérico</p>');
    } else {
      $('#number').html('<p class="text-danger">Ingresa por lo menos un caracter numérico</p>');
    }

    }).focus(function() {
      $('#pswd_info').show();
    }).blur(function() {
      $('#pswd_info').hide();
    });

    });
  </script>
</head>
<body>
<!--Navegación-->
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Seguridad WEP</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="reporte.php"><span class="glyphicon glyphicon-user"></span> Reportes</a></li>
        <li><a href="mostrar.php"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrar Usuario</a></li>
        <li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--Navegación-->
<div class="container">
 <form role="form" id="formulario">
  <div class="form-group">
    <label for="name">Nombres:</label>
    <input type="text" class="form-control" id="nombres" name="nombres"  required>
  </div>
  <div class="form-group">
    <label for="surname">Apellidos:</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos"  required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email"  required>
  </div>
  <div class="form-group">
    <label for="user">Usuario:</label>
    <input type="text" class="form-control" id="user" name="user"  required>
  </div>
  <div class="form-group">
    <label for="pass">Contraseña:</label>
    <input type="password" class="form-control" id="pass" name="pass"  required>
  </div>
  <div class="form-group">
  <button type="button" id="in" class="btn btn-primary">Registrarse</button>
  <button type="button" class="btn btn-success">Limpiar</button>
  </div>
  <div id="respuesta"></div>
</form>
<div id="pswd_info">
        <h4>Validación de contraseña segura:</h4>
        <ul>
          <li id="letter" >Ingresa un caracter minúscula</li>
          <li id="capital" >Ingresa un caracter mayúscula</li>
          <li id="number" >Ingresa un caracter numérico</li>
          <li id="simboly" >Ingresa un carater especial</li>
          <li id="length" >Ingresa contraseña con una longitud de al menos 8 caracteres</li>
        </ul>
</div>
</div>
<!-- Modal Bloqueador-->
<!-- <div class="container">
  <div class="modal fade" id="modal_bloqueo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->

<!-- Modal Bloqueador-->
</body>
</html>