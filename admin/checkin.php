<?php
include('connect.php');


$get_id=$_GET['id'];

mysql_query("update tb_reserve set status='checkin',modeofpayment='Unpaid' where reserveID='$get_id'")or die(mysql_error());

header('location:process.php');

?>