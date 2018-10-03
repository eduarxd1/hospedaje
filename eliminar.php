<?php 
	
	require('conexion.php');
	
	$id=$_GET['id'];
	$id1=$_GET['id'];
	
	$query="DELETE FROM usuarios WHERE id='$id'";
	$resultado=$mysqli->query($query);
	
	$query1="DELETE FROM personal WHERE id='$id1'";		
	$resultado1=$mysqli->query($query1);
?>

<html>
	<head>
		<title>Eliminar usuario</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
					if($resultado1>0){
						
					echo"<script type=\"text/javascript\">alert('Usuario Eliminado con exito'); window.location='mostrar.php';</script>";
				?>
				
				
				<?php 	}else{

					echo"<script type=\"text/javascript\">alert('Error al Eliminar Usuario'); window.location='mostrar.php';</script>";
				?>
				<?php }} ?>
			<p></p>		
			
			<a href="mostrar.php">Regresar</a>
			
		</center>
	</body>
</html>