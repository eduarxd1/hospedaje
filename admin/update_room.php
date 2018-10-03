<?php
include('connect.php');

	if(isset($_POST['updateroom']))

$get_id=$_GET['id'];
$status = $_POST['status'];

mysql_query("update tb_rooms set status='$status' where roomID='$get_id'")or die(mysql_error());
header('location:process.php');

?>