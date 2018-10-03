<?php
	session_start();
	require('conexion.php');
	
	$id=$_GET['id'];
	$id1=$_GET['id'];
	
	$query="SELECT usuario, id_tipo FROM usuarios WHERE id='$id'";
	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();
	
	$query1="SELECT nombre, apellido, email FROM personal WHERE id='$id1'";
	$resultado1=$mysqli->query($query1);
	$row1=$resultado1->fetch_assoc();
	
	$query2="SELECT id, tipo FROM tipo_usuario";
	$resultado2=$mysqli->query($query2);

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
   var idleInterval = setInterval(timerIncrement, 20000);
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
	  

      <ul class="nav navbar-nav navbar-right">
        <li><a href="reporte.php"><span class="glyphicon glyphicon-user"></span> Reportes</a></li>
        <li><a href="registrarse.php"><span class="glyphicon glyphicon-user"></span> Registrar Usuario</a></li>
		<li><a href="mostrar.php"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li>
		<li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li>
		
	 </ul>
    </div>
  </div>
</nav>
<!--Navegación-->
<div class="container">
<div class="jumbotron">
		<center>
		<h1>Modificar Usuario</h1>
</center>
		
		<form name="modificar_usuario" method="POST" action="mod_usuario.php">
			
			<table class='table table-hover'>
				<tr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="20"><b>Usuario:</b></td>
					<td width="30"><input type="text" class="form-control" name="usuario" size="30" value="<?php echo $row['usuario']; ?>" /></td>
				</tr>	
				<tr>
					<td><b>Nombres:</b></td>
					<td><input type="nombre" class="form-control" name="nombre" size="30" value="<?php echo $row1['nombre']; ?>" /></td>
				</tr>
				
				<tr>
					<td><b>Apellidos:</b></td>
					<td><input type="apellido" class="form-control" name="apellido" size="30" value="<?php echo $row1['apellido']; ?>" /></td>
				</tr>
				
				<tr>
					<td><b>Email:</b></td>
					<td><input type="text" class="form-control" name="email" size="30" value="<?php echo $row1['email']; ?>" /></td>
				</tr>
				
				<tr>
					<td><b>Privilegio:</b></td>
				<td><select id="tipo_usuario" class="form-control" name="tipo_usuario">
						<option value="0">Seleccione tipo de usuario...</option>
					<?php while($row2 = $resultado2->fetch_assoc()){ ?>
						<option value="<?php echo $row2['id']; ?>"><?php echo $row2['tipo']; ?></option>
					<?php }?>
				</select><td>
				</td>
				</td>
				</tr>

				
				
				<tr>
					<td><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
			</table>
		</form>
</center>
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
          <form role="form" id="formularios">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Contraseña</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Ingresar Contraseña">
            </div>
              <button type="button" class="btn btn-success btn-block" id="ins"><span class="glyphicon glyphicon-off"></span> Ingresar</button>
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


	</body>
</html>	
