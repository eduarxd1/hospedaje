<?php
error_reporting(0);
require('conexion.php');

if(isset($_POST))
{

    $captcha=sha1($_POST["captcha"]);
    $cookie_captcha=$_COOKIE["captcha"];
	$user=$_POST["user"];
	$pass=$_POST["pass"];

	if($user==NULL || $user=="")
	{
		echo "<p class='text-danger'>Ingresar Usuario</p>";
	}
	elseif($pass==NULL || $pass=="")
	{
		echo "<p class='text-danger'>Ingresar Contraseña</p>";
	}
	elseif($_SESSION['contador']<=2)
	{
		$hash = hash ( "sha256" , $pass, false );
		
		$sqlUser ="Select usuario FROM usuarios WHERE usuario=$user";
		$resultUser=$mysqli->query($sqlUser);
		$rows = $resultUser->num_rows;
		
        
        $_SESSION['ldap_bind']=ldap_bind($rows,$hash);
        if($_SESSION['ldap_bind'])
        {
        	$_SESSION['usuario']=$user;
        	$_SESSION['contador']=0;
        	$_SESSION['acceso']=1;
        	$_SESSION['current_user_cn'] = $user;
        	RegisterAuditoriaAcceso($user, "V");
			echo "<p class='text-info'>Se ingreso correctamente</p>";
			echo 
			'<script language="JavaScript" type="text/javascript">
				window.location="personal.php";
			</script>';
		}
        else
        {
        	RegisterAuditoriaAcceso($user, "F");
        	$_SESSION['contador']++;
		    echo "<p class='text-danger'>La constraseña no coincide</p>";
        }
		
	}
	elseif($_SESSION['contador']==3)
	{
		$_SESSION['contador']++;
		echo 
			'<script language="JavaScript" type="text/javascript">
				var pagina="login.php"
				function redireccionar() 
				{
				location.href=pagina
				} 
				setTimeout ("redireccionar()", 0);
			</script>';
	}
	else
	{
		if(ldap_bind($rows,$hash))
        {
        	$hash = hash ( "sha256" , $pass, false );
			
			
			$sqlUser ="Select usuario FROM usuarios WHERE usuario=$user";
			$resultUser=$mysqli->query($sqlUser);
			$rows = $resultUser->num_rows;
			
            
			if($captcha!=$cookie_captcha)
			{
				echo "<p class='text-danger'>El codigo captcha no coincide</p>";
				RegisterAuditoriaAcceso($user, "F");
				echo "<script>document.location.reload();</script>";
			}
			else
			{
				$_SESSION['usuario']=$user;
				$_SESSION['acceso']=1;
				$_SESSION['contador']=0;
				$_SESSION['current_user_cn'] = $user;
				RegisterAuditoriaAcceso($user, "V");
				echo "<p class='text-info'>Se ingreso correctamente</p>";
				setcookie("captcha",'',time()-3600);
				echo "<script>document.getElementById('formulario').reset();</script>";
				echo 
				'<script language="JavaScript" type="text/javascript">
					window.location="personal.php";
				</script>';
			}
		}
        else
        {
        	$_SESSION['contador']++;
		    echo "<p class='text-danger'>La constraseña no coincide</p>";
		    RegisterAuditoriaAcceso($user, "F");
        }
		
		
	}
}
?>