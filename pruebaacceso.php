<?php
if ($totalRows_rsvalida == 0) //si la consulta a la base de datos con el nombre de usuario 
//y contraseña me devuelve un CERO es por que no se encontro ese registro y por ende o esta mal el usuario 
//o la contraseña
{
	if (isset($_SESSION['contador'])) //si ya existe la variable de sesion contador.....
	{
		$_SESSION['contador']=$_SESSION['contador']+1; //le sumo el intento fallido
		$int = $_SESSION['contador'];
		if ($int <= 3) //comparo que sea menor o igual a 3 intentos
		{
		header ("Location: login.php=$int"); // lo mando a la pagina de logeo diciendole 
		//q esta mal el nombre de usuario y contraseña...
		exit;
		}
	}
	else //si no existe la variable de sesion contador entonces la inicializo
	   	// y le doy el valor primario de 1 y lo redireciono de nuevo a la pagina de login.
	{
		$_SESSION['contador'] = 1;
		$int = $_SESSION['contador'];
		header ("Location: index.php=$int");
		exit;
	}

}
?>