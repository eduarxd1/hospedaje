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
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$tipo_usuario = $_POST['tipo_usuario'];
		$sha1_pass = sha1($password);
		
		$error = '';
		
		$sqlUser = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
		$resultUser=$mysqli->query($sqlUser);
		$rows = $resultUser->num_rows;
		
		if($rows > 0) {
			$error = "El usuario ya existe";
			} else {
			
			$sqlPerson = "INSERT INTO personal (nombre) VALUES('$nombre')";
			$resultPerson=$mysqli->query($sqlPerson);
			$idPersona = $mysqli->insert_id;
			
			$sqlUsuario = "INSERT INTO usuarios (usuario, password, id_personal, id_tipo) VALUES('$usuario','$sha1_pass','$idPersona','$tipo_usuario')";
			$resultUsuario = $mysqli->query($sqlUsuario);
			
			if($resultUsuario>0)
			$bandera = true;
			else
			$error = "Error al Registrar";
			
		}
	}
	
?>

<html>
	<head>
		<title>Registro</title>
		
		<script>
			function validarNombre()
			{
				valor = document.getElementById("nombre").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Nombre');
					return false;
				} else { return true;}
			}
			
			function validarUsuario()
			{
				valor = document.getElementById("usuario").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Usuario');
					return false;
				} else { return true;}
			}
			
			function validarPassword()
			{
				valor = document.getElementById("password").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Password');
					return false;
					} else { 
					valor2 = document.getElementById("con_password").value;
					
					if(valor == valor2) { return true; }
					else { alert('Las contraseña no coinciden'); return false;}
				}
			}
			
			function validarTipoUsuario()
			{
				indice = document.getElementById("tipo_usuario").selectedIndex;
				if( indice == null || indice==0 ) {
					alert('Seleccione tipo de usuario');
					return false;
				} else { return true;}
			}
			
			function validar()
			{
				if(validarNombre() && validarUsuario() && validarPassword() && validarTipoUsuario())
				{
					document.registro.submit();
				}
			}
			
		</script>
		
	</head>
	
	<body>
		
		<form id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
			<div><label>Nombre:</label><input id="nombre"name="nombre" type="text" ></div>
			<br />
			
			<div><label>Usuario:</label><input id="usuario" name="usuario" type="text"></div>
			<br />
			
			<div><label>Password:</label><input id="password" name="password" type="password"></div>
			<br />
			
			<div><label>Confirmar Password:</label><input id="con_password" name="con_password" type="password"></div>
			<br />
			
			<div><label>Tipo Usuario:</label>
				<select id="tipo_usuario" name="tipo_usuario">
					<option value="0">Seleccione tipo de usuario...</option>
					<?php while($row = $result->fetch_assoc()){ ?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
					<?php }?>
				</select>
			</div>
			<br />
			
			<div><input name="registar" type="button" value="Registrar" onClick="validar();"></div> 
		</form>
		
		<?php if($bandera) { ?>
			<h1>Registro exitoso</h1>
			<a href="welcome.php">Regresar</a>
			
			<?php }else{ ?>
			<br />
			<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
			
		<?php } ?>
		
	</body>
	
</html>