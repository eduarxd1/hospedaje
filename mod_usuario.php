<?php 
	
	require('conexion.php');
	
	$id=$_POST['id'];
	$usuario=$_POST['usuario'];
	
	
	$id1=$_POST['id'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$email=$_POST['email'];
	
	$tipo_usuario = $_POST['tipo_usuario'];
	
	
	$query="UPDATE usuarios SET usuario='$usuario',id_tipo='$tipo_usuario' WHERE id='$id'";
	$resultado=$mysqli->query($query);
	
	$query1="UPDATE personal SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id='$id1'";
	$resultado1=$mysqli->query($query1);

	?>

<html>
	<head>
		<title>Modificar usuario</title>
	</head>
	
	<body>
		<center>
			
			
			<?php 
				if($resultado>0){
					if($resultado1>0){
						
				echo"<script type=\"text/javascript\">alert('Usuario Modificado'); window.location='mostrar.php';</script>";
				?> 
				
					<?php 	
				}else{ ?>
				<?php	
				echo"<script type=\"text/javascript\">alert('Error al Modificar Usuario'); window.location='mostrar.php';</script>";
					}}?>
			
			<p></p>	
		
		</center>
	</body>
</html>
				
				