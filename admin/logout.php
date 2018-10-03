<?php include('session.php'); ?>
<?php include('connect.php');?>

<?php

session_start();
session_destroy();

mysql_query("INSERT INTO tb_history(user_id,action,date)VALUES('$session_id', 'Logout', NOW())")or die(mysql_error());


header('location:index.php');

?>