<?php session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT u.id, p.nombre FROM usuarios AS u INNER JOIN personal AS p ON u.id_personal=p.id WHERE u.id = '$idUsuario'";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
	
?>
 
<!DOCTYPE html>
<html>
<head lang="es">
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!--Codigo JavaScript-->
  <script>
  $(document).ready(function(){
   idleTime = 0;
   var idleInterval = setInterval(timerIncrement, 5000);
   function timerIncrement()
     {
       idleTime++;
       if (idleTime > 4)
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
  
  
  
  <!--Codigo JavaScript-->
</head>
<body>
<video src="img/hospedaje.mp4" autoplay loop muted>
    </video>
<!--Navegación-->
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
	  
	   <?php if($_SESSION['tipo_usuario']==1) { ?>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="registrarse.php"><span class="glyphicon glyphicon-user"></span> Registrar Usuario</a></li>
	  </ul>
	  <?php } ?>
	  
	  <ul class="nav navbar-nav navbar-right">
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Habitaciones <span class="caret"></span></a>
          <ul class="dropdown-menu">	
            <li><a href="disponibles.php">Ver Disponibles</a></li>
            <li><a href="reservaciones.php">Reservaciones</a></li>
            <li><a href="habitaciones.php">Habitaciones</a></li>
           </ul>
        </li>
				
		<li><a href="mostrar.php"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li>
		<li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li>
	  </ul>
      </ul>
    </div>
  </div>
</nav>

  
	
	
	
<style type="text/css">
  
  .colorlabel{
    color:#FFFFFF;
    font-size: 19px;
  }
</style>
	

	
	<!--Navegación-->
	

<div class="container">
  <div class="jumbotron">
    <h1><?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?></h1>
    <h3>LES DESEA HOSPEDAJE RANCES</h3> 
  </div>
  <div class="row">
  </div>
</div>


		
	
	
	

<!-- Modal Bloqueador-->









<!-- Modal Bloqueador-->
</body>
</html>