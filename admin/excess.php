
<?php include('connect.php'); ?>
<?php include('session.php'); ?>
<?php include('user_name.php'); ?>

<?php

$get_id=$_GET['id'];
$memberID = $_POST['memberID'];
$qty = $_POST['qty'];
$productID = $_POST['productID'];


$pquery = mysql_query("Select * from tb_products where productID = '$productID'") or die (mysql_error());
	while($prow = mysql_fetch_array($pquery)){
		$proprice = $prow['price'];

	}
$excess_id = $_POST['excess_id'];
	
	$query = mysql_query("Select * from tb_price where excess_id = '$excess_id'") or die (mysql_error());
	while($row = mysql_fetch_array($query)){
		$exprice = $row['prices'];
		
	}


$porder =  $proprice * $qty;


$x = $_POST['ex'];

$t = $x + $porder + $exprice;


		

mysql_query("update tb_reserve set excess_id='$t' where reserveID='$get_id'")or die(mysql_error());


$save = mysql_query("INSERT into tb_orders(memberID,productID,quantity,excess_id,reserveID) values('$memberID','$productID','$qty','$excess_id','$get_id')") or die(mysql_error());

header('location:process.php');

?>

