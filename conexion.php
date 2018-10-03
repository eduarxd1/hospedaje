<?php
	$mysqli= new mysqli("localhost","root","","seguridad"); //servidor usuario de base de datos, contraseña del usuario, nombre de la base de datos
	
	if(mysqli_connect_errno())
	{
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>