<?php
	session_start();
	require('conexion.php');

	$query = "SELECT usuarios.id, usuarios.usuario, personal.nombre, personal.apellido, personal.email, tipo_usuario.tipo  FROM usuarios, personal, tipo_usuario WHERE personal.id=usuarios.id_personal AND tipo_usuario.id=usuarios.id_tipo"; 
	$resultado=$mysqli->query($query); 
?>
<html lang="es">
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mostrar Usuarios</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
   idleTime = 0;
   var idleInterval = setInterval(timerIncrement, 3000);
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
  </script>
</head>
<body>
<video src="img/drive.mp4" autoplay loop muted>
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
        <li class="active"><a href="personal.php">Inicio</a></li>
      </ul>
	  <?php if($_SESSION['tipo_usuario']==1) { ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="registrarse.php"><span class="glyphicon glyphicon-user"></span> Registrar Usuario</a></li>
       </ul>
	  <?php } ?>  
	   	<ul class="nav navbar-nav navbar-right">
		<li><a href="reporte.php"><span class="glyphicon glyphicon-user"></span> Comentarios</a></li>
		<li><a href="#"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li>
		<li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li>
      </ul>
	
    </div>
  </div>
</nav>
<!--Navegación-->
<div id="contenido2">
<div class="container">
<center>
<h1>Lista de Usuarios</h1>
 <form role="form" id="formulario">
  
        <table class='table table-hover'>
        <tr color="#000">
		<th>USUARIO</th>
		<th>NOMBRES</th>
		<th>APELLIDOS</th>
		<th>CORREO</th>
		<th>PRIVILEGIO</th>
		<th></th>
		<th></th>
		</tr>
		<tbody>
		</br>
					<?php while($row=$resultado->fetch_assoc()){
							 ?>
						<tr>
							<td><?php echo $row['usuario'];?>
							</td>
							<td><?php echo $row['nombre'];?>
							</td>
							<td><?php echo $row['apellido'];?>
							</td>
							<td><?php echo $row['email'];?>
							</td>
							<td><?php echo $row['tipo'];?>
							</td>
							<?php if($_SESSION['tipo_usuario']==1) { ?>
							<td>
								<a href="modificar.php?id=<?php echo $row['id'];?>">Modificar</a>
							</td>
							<td>
								<a href="eliminar.php?id=<?php echo $row['id'];?>">Eliminar</a>
							</td>
							<?php } ?>
						</tr>
							<?php } ?>
				</tbody>
		
  </form>
  </center>
  </div>

<!-- Modal Bloqueador-->

<!-- Modal Bloqueador-->
</body>
</html>