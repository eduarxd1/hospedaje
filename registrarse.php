<?php
	
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$sql = "SELECT id, tipo FROM tipo_usuario";
	$result=$mysqli->query($sql);
	
	$bandera = false;
	
	if(!empty($_POST))
	{
		$nombre = mysqli_real_escape_string($mysqli,$_POST['nombre']);
		$apellido = mysqli_real_escape_string($mysqli,$_POST['apellido']);
		$email = mysqli_real_escape_string($mysqli,$_POST['email']);
		$usuario = mysqli_real_escape_string($mysqli,$_POST['user']);
		$tipo_usuario = $_POST['tipo_usuario'];
		$password = mysqli_real_escape_string($mysqli,$_POST['pass']);
		
		
		$hash = hash( "sha256", $password);
		
		$error = '';
		
		$sqlUser = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
		$resultUser=$mysqli->query($sqlUser);
		$rows = $resultUser->num_rows;
		
		if($rows > 0) {
			$error = "El usuario ya existe";
			} 
		else {
			
			$sqlPerson = "INSERT INTO personal (nombre, apellido, email) VALUES('$nombre','$apellido','$email')";
			$resultPerson=$mysqli->query($sqlPerson);
			$idPersona = $mysqli->insert_id;
			
			
			$sqlUsuario = "INSERT INTO usuarios (usuario, contrasena, id_personal, id_tipo) VALUES('$usuario','$hash','$idPersona','$tipo_usuario')";
			$resultUsuario = $mysqli->query($sqlUsuario);
			
			if($resultUsuario>0)
			$bandera = true;
			else
			$error = "Error al Registrar";
			
		}
	}
	
?>


<html lang="es">
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar Usuario</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/estilos.css">
   <link type="text/css" href="style/style4.css" rel="stylesheet"  />
   <script ype="text/javascript" src="js/pschecker3.js"></script>
      <script>
		$(document).on('ready', function() {
			$('#show-hide-passwd').on('click', function(e) {
				e.preventDefault();
				var current = $(this).attr('action');
				if (current == 'hide') {
					$(this).prev().attr('type','text');
					$(this).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').attr('action','show');
				}
				if (current == 'show') {
					$(this).prev().attr('type','password');
					$(this).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').attr('action','hide');
				}
			})
		})
	</script>
   
  <script type="text/javascript">
  $(document).ready(function(){
   idleTime = 0;
   var idleInterval = setInterval(timerIncrement, 30000);
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
  
  
  <script type="text/javascript">
 
   $(document).ready(function () {
           
            //Demo code
            $('.password-container').pschecker({ onPasswordValidate: validatePassword, onPasswordMatch: matchPassword });

            var submitbutton = $('.submit-button');
            var errorBox = $('.error');
            errorBox.css('visibility', 'hidden');
            submitbutton.attr("disabled", "disabled");

            //this function will handle onPasswordValidate callback, which mererly checks the password against minimum length
            function validatePassword(isValid) {
                if (!isValid)
                    errorBox.css('visibility', 'visible');
                else
                    errorBox.css('visibility', 'hidden');
            }
            //this function will be called when both passwords match
            function matchPassword(isMatched) {
                if (isMatched) {
                    submitbutton.addClass('unlocked').removeClass('locked');
                    submitbutton.removeAttr("disabled", "disabled");
                }
                else {
                    submitbutton.attr("disabled", "disabled");
                    submitbutton.addClass('locked').removeClass('unlocked');
                }
            }
        });
   
   
  </script>
  <script>
			function validarNombre()
			{
				valor = document.getElementById("nombre").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar los Nombres');
					return false;
				} else { return true;}
			}
			function validarApellido()
			{
				valor = document.getElementById("apellido").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar los Apellidos');
					return false;
				} else { return true;}
			}
			
			function validarEmail()
			{
				valor = document.getElementById("email").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('El Email es Incorrecto');
					return false;
					
				}
				 else { 
				 return true;}
			}
						
			function validarUsuario()
			{
											
				valor = document.getElementById("user").value;
				if( valor == null || valor.length < 10 || /^\s+$/.test(valor) || valor == "admin" || valor == "root" || valor == "administrador" ) {
					alert('Falta Llenar Usuario, minimo 10 caracteres, No permitido usuarios simples ');
					return false;
				} else { 
				return true;}
			}
			
			function validarTipoUsuario()
			{
				indice = document.getElementById("tipo_usuario").selectedIndex;
				if( indice == null || indice==0 ) {
					alert('Seleccione tipo de usuario');
					return false;
				} else { return true;}
			}
			
			function validarPassword()
			{
				valor = document.getElementById("pass").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) || valor == "password" || valor == "1234" || valor == "12345" || valor == "123456"|| valor == "1234567" || valor == "12345678" || valor == "123456789" || valor == "qwerty" ) {
					alert('Falta Llenar contraseña');
					return false;
								
				} else { return true;}
			}
			
			function validar()
			{
				if(validarNombre() && validarApellido() && validarEmail() && validarUsuario() && validarTipoUsuario() && validarPassword())
				{
					document.registro.submit();
				}
			}
			
		</script>
  
  
  
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
      <a class="navbar-brand" href="#">HOSPEDAJE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="personal.php">Inicio</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="reporte.php"><span class="glyphicon glyphicon-user"></span> Comentarios</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrar Usuario</a></li>
        <li><a href="mostrar.php"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li>
		<li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--Navegación-->
<div class="container">

 <form role="form" id="formulario" name="registro"action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
 
  <div class="form-group">
    <label for="name">Nombres:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombres"  required>
  </div>
    <div class="form-group">
    <label for="surname">Apellidos:</label>
    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresar Apellidos"  required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresar Email" required>
  </div>
  <div class="form-group">
    <label for="user">Usuario:</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Ingresar Usuario" required>
  </div>
   <div><label>Tipo Usuario:</label>
				<select id="tipo_usuario" class="form-control" name="tipo_usuario">
					<option value="0">Seleccione tipo de usuario...</option>
					<?php while($row = $result->fetch_assoc()){ ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
					<?php }?>
				</select>
   </div>
			<br />
  
  <div class="password-container">
  
    <label for="pass">Contraseña:</label></br>
    <input type="password" class="strong-password" id="pass" name="pass" placeholder="Ingresar Contraseña"  required>
	<span id="show-hide-passwd" action="hide" class="form-group-addon glyphicon glyphicon glyphicon-eye-open"></span>
  
		<div class="strength-indicator">
                <div class="meter">
                </div>
                Las contraseñas seguras contienen 8-16 caracteres, no incluyen palabras o nombres comunes, y combinar letras mayúsculas, minúsculas, números y símbolos.
        </div>
   
   <p>
            <span class="error">La contraseña debe ser de 8 caracteres de longitud</span>
        </p>
   
   </div>
  <div class="form-group">
  
  <div><input type="button" name="registrar" class="btn btn-primary" value="Registrar" onClick="validar();"></div> 

    </div>
<div id="respuesta"></div>
</form>
		<?php if($bandera) { ?>
			<h1>Registro Exitoso</h1>
			<a href="personal.php" class="btn btn-success">Regresar</a>
			
			<?php }else{ ?>
			<br/>
			<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
			
		<?php } ?>


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
<!-- Modal Bloqueador-->
</body>
</html>