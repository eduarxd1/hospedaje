<!DOCTYPE html>
<?php
error_reporting(0);
?>
<html>
<head lang="es">
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOSPEDAJE</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  
  <!--Codigo JavaScript-->
  <?php if($_SESSION['acceso']==1) { ?>
  <script>
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

        $("#in").on("click", function(){
          var formData=$("#formulario").serialize();
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
  </script>
   <?php } ?>
  <!--Codigo JavaScript-->
</head>
<body>
	<video src="img/hospedaje.mp4" autoplay loop muted>
    </video>
<!--Navegación-->
<div id="">
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">HOSPEDAJE</a>
 </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Inicio</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['acceso']==1){ ?><li><a href="reporte.php"><span class="glyphicon glyphicon-user"></span> Reportes</a></li><?php } ?>
        <?php if($_SESSION['acceso']==1){ ?><li><a href="mostrar.php"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li><?php } ?>
        <?php if($_SESSION['acceso']!=1){ ?><li><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li><?php } ?>
        <?php if($_SESSION['acceso']!=1){ ?><li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li><?php } else {?><li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li><?php } ?>
      </ul>
    </div>
  </div>
</nav>


<!--Navegación-->
          <p></p><font size="60" color="#83BA10">BIENVENIDOS A HOSPEDAJE RANCES</font>
    <H3>ATENCION LAS 24 HORAS DEL DIA</H3> 

  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
      <h3></h3>
	  
	  
   
    </div>
    <div class="col-sm-4">
      <h3CURSO DE PROCESOS DE SOFTWARE</h3>        
      <p></p>
    </div>
  </div>
</div>
</div>
<!-- Modal Bloqueador-->
<div class="container">
  <div class="modal fade" id="modal_bloqueo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span> Bloqueado</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" id="formulario">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Contraseña</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Ingresar Contraseña">
            </div>
              <button type="button" class="btn btn-success btn-block" id="in"><span class="glyphicon glyphicon-off"></span> Ingresar</button>
            <div class="form-group" id="respuesta">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <p>Se bloqueo debido a la inactividad de 2 minutos</p>
        </div>
      </div>
    </div>
  </div> 
</div>

<!-- Modal Bloqueador-->
</body>
</html>