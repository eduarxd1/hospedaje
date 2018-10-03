<?php
	require ('conexion.php');
	
	session_start();
	
	
	
	if(!empty($_POST))
	 {
		
		$usuario = mysqli_real_escape_string($mysqli, $_POST['user']);
 		$password = mysqli_real_escape_string($mysqli, $_POST['pass']);
		$error = '';
		
		
		$hash = hash( "sha256", $password);
		
		$sql = "SELECT id, id_tipo FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$hash'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
	

		if($rows>0){
			$rows = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $rows['id'];	
			$_SESSION['tipo_usuario'] = $rows['id_tipo'];			
			
			header("location: personal.php");
			}
		else{
				 $error = "El Usuario o clave son incorrectos";

			}
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!--Codigo JavaScript-->

	
	<script>
			$(function(){

				$("#in").on("click", function(){
					var formData=$("#formulario").serialize();
					var ruta = "acceso.php";
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
	<!--Codigo JavaScript-->
</head>
<body>
<video src="img/drive.mp4" autoplay loop muted>
    </video>
<!--Navegación-->
<div id="contenido1">
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
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>

<!--Navegación-->

<div class="container">
 <form id="formulario" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="form-group">
    <label for="user">Usuario:</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Ingresar nombre de Usuario">
  </div>
  <div class="form-group">
    <label for="pass">Contraseña:</label>
	<input type="password" class="form-control" id="pass" name="pass" placeholder="Ingresar Contraseña">
	</div>
	
	
  <div class="form-group" style="display: none">
    <label for="capt">Captcha:</label>
    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Ingresar Captcha">
  </div>
  <div class="form-group" style="display: none">
  <img src="captcha.php">
  <button type="button" class="btn btn-warning" id="actualizar_captcha"> Actualizar</button>
  </div>
  
  
  
  
  <div class="form-group">
  <input name="login" type="submit" class="btn btn-primary" id="in" value="Ingresar">

  </div>
    
  <div style = "font-size:16px; color:#FFF;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
   
  <div id="respuesta"></div>
</form>
</div>
</div>
</body>
</html>