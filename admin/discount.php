<?php
include('connect.php');

if(isset($_POST['discount'])){

$get_id=$_POST['id'];
$disID = $_POST['disID'];
$bal = $_POST['bal'];

$qry = mysql_query("select * from tb_discount where id = '$disID'") or die(mysql_error());
	while($row = mysql_fetch_array($qry)){
		$price = $row['price'];

	}
	
$balance = $bal-$price;	
	
$f = sprintf("%.2f",$balance);

	
mysql_query("update tb_reserve set balance='$f',discount='$price' where reserveID='$get_id'")or die(mysql_error());
header('location:process.php');

}
?>