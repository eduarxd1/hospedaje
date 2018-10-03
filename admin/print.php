<?php include('core.php'); ?>	
<?php include('session.php'); ?>
<?php include('connect.php');?>
<?php include('hover.php');?>
        
        <form class="navbar-form pull-right">
        
<div class="input-prepend">
  				<div class="btn-group">
    <a class="btn" href="admin.php"><i class="icon-home"></i> Home</a>            
    <a class="btn" href="#logout" data-toggle="modal"><i class="icon-off"></i> Log-out</a>          
 	<button class="btn dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
    		<ul class="dropdown-menu">
    				<li><a href="#adduser" data-toggle="modal"><i class="icon-plus-sign"></i> Addusers</a></li>
                    <li><a href="#addroom" data-toggle="modal"><i class="icon-plus-sign"></i> Addrooms</a></li>
                    <li><a href="#addproduct" data-toggle="modal"><i class="icon-plus-sign"></i> Addproduct</a></li>
                    <li><a href="#trans"><i class="icon-plus-sign"></i> Addtransactions</a></li>
                    <li><a href="#adddiscount" data-toggle="modal"><i class="icon-plus-sign"></i> Adddiscount</a></li>
                    
    		</ul>
  	</div>
  			<input class="span2" id="prependedDropdownButton" type="text">
</div>
             

		</form>
          

<?php include('title.php');?>

<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'kingsfields_database'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<div class="container">

        <div style="margin-top:20px;" class="pull-right">
  
<form action="print.php" method="get">
  <div class="input-prepend input-append">
  	<span class="add-on">From</span>
    <input type="text" name="d1" class="tcal"/>
    <input type="text" name="d2" class="tcal"/>
    <div class="btn-group"><button class="btn" type="submit"><i class="icon-search"></i> Search</button>
    <a style=" margin-bottom:10px;" class="btn" href="javascript:Clickheretoprint()"><i class="icon-print"></i> Print Records</a>     
    
    </div>
  </div>
  
</form>
          
        </div>
        
        
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Kingsfieldexpressinn Power System Reports</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="margin-top:10px; margin-right:20px; margin-left:10px; width: 100%; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
    
    <div id="print_content">     
        
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><div align="center">Confirmation</div></th>
                        <th><div align="center">No.</div></th>
                        <th><div align="center">Guest</div></th>
                        <th><div align="center">Days</div></th>
                        <th><div align="center">Arrival</div></th>
                        <th><div align="center">Departure</div></th>
                        <th><div align="center">Total</div></th>
                       
                        <th><div align="center">Incharge</div></th>
                        <th><div align="center">Checkout</div></th>
                    </tr>
                </thead>
<tbody>
<?php
include('connect.php');
if (isset($_GET["d1"])) { $d1  = $_GET["d1"]; } else { $d1=0; }; 
if (isset($_GET["d2"])) { $d2  = $_GET["d2"]; } else { $d2=0; }; 
$result = $db->prepare("SELECT * FROM tb_reserve WHERE Date BETWEEN :a AND :b");
$result->bindParam(':a', $d1);
$result->bindParam(':b', $d2);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){

                                        $order_id = $row['reserveID'];
                                        $product_id = $row['roomID'];
                                        $member_id = $row['memberID'];
										$incharge = $row['Incharge'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);
    $incharge_query = mysql_query("select * from tb_user where user_id = '$incharge'")or die(mysql_error());
										$incharge_row=mysql_fetch_array($incharge_query);
                                    
?>


<tr class="record">
 <td><div align="center"><?php echo $row['transaction_code']; ?></div></td>
                                            <td><div align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div align="center"><?php echo $row['days_no']; ?></div></td>
                                            <td><div align="center"><?php echo $row['arrival']; ?></div></td>
                                            <td><div align="center"><?php echo $row['departure']; ?></div></td>
                                            <td><div align="center"><?php echo $row['totalamount']; ?></div></td>
                                            
                                            <td><div align="center"><?php echo $incharge_row['firstname']." ".$incharge_row['lastname']; ?></div></td>
                                            <td><div align="center"><?php echo $row['Date']; ?></div></td>
</tr>
<?php
}
?>
</tbody>
</table>

		</div><!--Print end -->

</div>


<?php include'modals.php';?> 
<?php include'script.php';?>
