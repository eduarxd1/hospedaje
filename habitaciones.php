<?php
	session_start();
	require('conexion.php');

	$query = "SELECT usuarios.id, usuarios.usuario, personal.nombre, personal.apellido, personal.email, tipo_usuario.tipo  FROM usuarios, personal, tipo_usuario WHERE personal.id=usuarios.id_personal AND tipo_usuario.id=usuarios.id_tipo"; 
	$resultado=$mysqli->query($query); 
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Personales</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<!--Codigo JavaScript-->
	
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
      <a class="navbar-brand" href="#">HOSPEDAJE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="personal.php">Inicio</a></li>
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
            <li><a href="#">Habitaciones</a></li>
           </ul>
        </li>
		<li><a href="#"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li>
		<li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li>
      </ul>
	
    </div>
  </div>
</nav>
<!--Navegación-->
 <div class="container">
  <div class="row">
	<div class="col-xs-6 col-md-3">
		<div class="thumbnail">
			<a href="disponible1.php"><img src="imagenes/personal.jpg" alt=""></a>
			<div class="caption">
			<h4>Habitación Personal</h4>
			<p> PRECIO: S/. 25 SOLES </p>
			<p>Incluye Una Cama Normal</p>
			</div>
		</div>
	</div>
	
	<div class="col-xs-6 col-md-3">
		<div class="thumbnail">
			<a href="#"><img src="imagenes/dobles.jpg" alt=""></a>
			<div class="caption">
			<h4>Habitación Doble</h4>
			<p> PRECIO: S/. 30 SOLES </p>
			<p>Incluye Dos Camas Normales</p>
			</div>
		</div>
	</div>
	
	<div class="col-xs-6 col-md-3">
		<div class="thumbnail">
			<a href="#"><img src="imagenes/Matrimonial.jpg" alt=""></a>
			<div class="caption">
			<h4>Habitación Matrimonial</h4>
			<p> PRECIO: S/. 35 SOLES </p>
			<p>Incluye Cama De Dos Plazas </p>
			</div>
		</div>
	</div>
		 
	<div class="col-xs-6 col-md-3">
		<div class="thumbnail">
			<a href="#"><img src="imagenes/triple.jpg" alt=""></a>
			<div class="caption">
			<h4>Habitación Triple</h4>
			<p> PRECIO: S/. 40 SOLES </p>
			<p>Incluye Tres Camas Normales</p>
			</div>
		</div>
	</div>
		
</div>		
		
</div>
  
  


</body>
</html>