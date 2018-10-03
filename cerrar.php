<?php 

error_reporting(0);
require('conexion.php');
session_destroy();
echo '<script>window.location="login.php";</script>';
?>
