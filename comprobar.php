<?php
error_reporting(0);
require('conexion.php');
$user=$_SESSION['usuario'];
if(isset($_POST))
{
	$pass=$_POST["pass"];

	if($pass==NULL || $pass=="")
	{
		echo "<p class='text-danger'>Ingresar Contraseña</p>";
	}
	else
	{
		
		$hash = hash ( "sha256" , $pass, false );
        $sqlUser ="Select usuario FROM usuarios WHERE usuario=$user";
		$resultUser=$mysqli->query($sqlUser);
		$rows = $resultUser->num_rows;
        
        $_SESSION['bind']=bind($rows,$hash);
        if($_SESSION['bind'])
        {
			echo "<p class='text-info'>Se ingreso correctamente</p>";
			echo "<script>document.getElementById('formulario').reset();</script>";
			echo '<script>
				  $(document).ready(function(){
			       $("#modal_bloqueo").modal("hide");
				  });';

		}
        else
        {
		    echo "<p class='text-danger'>La constraseña no coincide</p>";
        }
		
	}
}