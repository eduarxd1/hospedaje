<?php
session_start();
$usuario = $_SESSION['user'];
require 'conexion.php';
$msg = null;
if(isset($_POST["nuevo_comentario"]))
{
	
	$titulo = $_POST["titulo"];
    $comentario = $_POST["comentario"];
			

	$sqlComen = "INSERT INTO comentarios (usuario, titulo, comentario) VALUES('$usuario','$titulo','$comentario')";
	$resultComen=$mysqli->query($sqlComen);

    if ($resultComen)
    {
        $msg = "Enhorabuena comentario publicado con éxito";
    }
    else
    {
        $msg = "Ha ocurrido un error al crear el comentario";
    }
}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reporte de Usuarios</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/estilos.css">
   <link type="text/css" href="style/style4.css" rel="stylesheet"  />
   <script ype="text/javascript" src="js/pschecker3.js"></script>  
</head>
<body>
<video src="img/Moon.mp4" autoplay loop muted>
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
      <a class="navbar-brand" href="#">Seguridad WEP</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <?php if($_SESSION['tipo_usuario']==1) { ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="registrarse.php"><span class="glyphicon glyphicon-user"></span> Registrar Usuario</a></li>
       </ul>
	  <?php } ?> 
        <li><a href="reporte.php"><span class="glyphicon glyphicon-user"></span> Comentarios</a></li>
        <li><a href="mostrar.php"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li>
		<li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--Navegación-->
<div class="container">

<form role="form" id="formulario" name="comentario"action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
 
  <div class="form-group">
    <label for="name">Titulo:</label>
    <input type="text" class="form-control" id="nombre" name="titulo"  required>
  </div>
    <div class="form-group">
    <label for="surname">Comentario:</label>
	<td><textarea cols="50" rows="10" class="form-control" name="comentario"></textarea></td>

	
  </div>
	
  <div class="form-group">
		<input type="hidden" name="nuevo_comentario">
		<div><input type="submit" name="enviar" class="btn btn-primary" value="Enviar"></div> 
    </div>

</form>
	<?php
		
		$sql = "SELECT * FROM comentarios";
		$resultUser=$mysqli->query($sql);

		while($fila = $resultUser->fetch_array())
	{
		
		echo 'Usuario:' . $fila['usuario'] . "<br>";
		echo 'Título:' . $fila['titulo'] . "<br>";
		echo 'Comentario:' . $fila['comentario'] . "<br><br><hr>";    
	}
	?>

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
<!-- Modal Bloqueador-->
</body>
</html>