
<?php include('connect.php'); ?>
<?php include('session.php'); ?>
<?php include('user_name.php'); ?>

<?php

$get_id=$_GET['id'];
$roomID = $_POST['roomID'];
$t = $_POST['t'];

mysql_query("update tb_reserve set totalamount='$t',date='$Today',status='checkout',incharge='$session_id',balance='paid' where reserveID='$get_id'")or die(mysql_error());

mysql_query("update tb_rooms set status='Available' where roomID='$roomID'") or die(mysql_error());

header('location:process.php');

?>

