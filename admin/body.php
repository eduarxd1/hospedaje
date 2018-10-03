<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">


<div class="active item"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-list"></i> List of Reserved</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">Confirmation</div></th>
                        <th><div align="center">No.</div></th>
                        <th><div align="center">Guest</div></th>
                        <th><div align="center">Days</div></th>
                        <th><div align="center">Arrival</div></th>
                        <th><div align="center">Departure</div></th>
                        <th><div align="center">Total</div></th>
                        <th><div align="center">Partial</div></th>
                        <th><div align="center">Balance</div></th>
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Discount</div></th>
                        <th><div align="center">Request</div></th>
                        <th><div align="center">Mode</div></th>
                        <th><div align="center"><a data-trigger="hover" title="Buttons Function" data-placement="top" data-content="Change Room/Discount/Checkin" data-toggle="popover">Actions</a></div></th>
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_reserve where status='reserved'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
										$catdi = $product_row['category_id'];
										
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['total']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['partial']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['balance']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['status']; ?></div></td>
										    <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php if ($cart_row['discount'] == 0){echo 'None';}else{echo $cart_row['discount'];} ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php if($cart_row['request' == '']){echo 'None';} else{echo $cart_row['request'];} ?></div></td>
										  	
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['modeofpayment']; ?></div></td>
                                            
                                            <td width="128"><a href="#change<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-edit"></i></a>
                                            
                                            <a href="#discount<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-gift"></i></a>
                                            
                                            <a href="#checkin<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-pencil"></i></a>
                                            
                                            
                                            </td>
                                            
                                          <div id="checkin<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	
                                            <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> Kingsfield Express Inn Check-In</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                 <div class="alert-block">
                                 	
                 	<p><strong>Transaction Code: </strong><?php echo $cart_row['transaction_code']; ?></p>
                    <p><strong>Guest Name: </strong> <?php echo $member_row['firstname']." ".$member_row['lastname']; ?></p>
                 	<p><strong>Partial Payment: </strong> <?php echo $cart_row['partial']; ?></p>
                    
                 </div>
                 
               <div class="alert alert-info"><h6><strong>Balance is: </strong> PHP <?php echo $cart_row['balance']; ?></h6></div>
                         
                         				</div>
                         
                         		
                                        <div class="modal-footer">
          <a class="btn btn-danger" href="checkin.php<?php echo '?id='.$order_id; ?>" ><i class="icon-check"></i> Checkin</a>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancel</button>

                                        </div>
                                        
                                    </div>     
                                    
                                    
                                    
                                   
       <div id="change<?php echo $order_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> Kingsfield Express Inn Change Room</h5>
  </div>
  <div class="modal-body"> 
  
  <form action="res.php" method="post">
  
  <input name="reserveid" type="hidden" value="<?php echo $order_id;?>">
  
  <input name="roomp" type="hidden" value="<?php echo $product_id;?>">
  
  <div align="center">Room Number: <select class="span2" name="roomID">
  <?php 
 	
	$resc = mysql_query("select * from tb_rooms where category_id = '$catdi' and status = 'available'") or die (mysql_error());
 		while ($row_sche = mysql_fetch_array($resc)){
 
  
  ?>
  
 <option  value="<?php echo $row_sche['roomID']?>"><?php echo 'Room'." ".$row_sche['name'];?></option> 
 
 <?php }?>
  
  </select>
  
  </div>

  </div>
  
  <div class="modal-footer">
  	
    <button type="submit" class="btn btn-info" name="res"><i class="icon-edit"></i> Change</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
    
  </div>
  
   </form>  
  
</div>
       				
       
     <div id="discount<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	
                                            <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> Kingsfield Express Inn Discounts</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                 <div class="alert-block">
                  
 <form action="discount.php" method="post">
  
  <div align="center">Discount Type: <select class="span2" name="disID">
  <option value="0">--Select Discount--</option>
  <?php 
 	
	$rescs = mysql_query("select * from tb_discount order by 'price'") or die (mysql_error());
 		while ($row_dis = mysql_fetch_array($rescs)){
 
  
  ?>
  
 <option  value="<?php echo $row_dis['id']?>"><?php echo $row_dis['name'];?></option> 
 
 <?php }?>
  
  </select>
 
 	<input name="id" type="hidden" value="<?php echo $order_id;?>" />
	<input name="bal" type="hidden" value="<?php echo $cart_row['balance']; ?>" />
                    
                 </div>
                 
             
                         
                         				</div>
                         
                         		
                                        <div class="modal-footer">
          <button class=" btn btn-success" name="discount" type="submit"><i class="icon-check"></i> Ok</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancel</button>

                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                    <!-- end delete modal -->
                                    

											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->




<div class="item"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

           <pre><h4><strong><i class="icon-list"></i> List of Checkin</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">Confirmation</div></th>
                        <th><div align="center">Room </div></th>
                        <th><div align="center">Guest</div></th>
                        <th><div align="center">Days</div></th>
                        <th><div align="center">Arrival</div></th>
                        <th><div align="center">Departure</div></th>
                        <th><div align="center">Total</div></th>
                        <th><div align="center">Partial</div></th>
                        <th><div align="center">Balance</div></th>
                        <th><div align="center">Orders</div></th>
                        <th><div align="center">Discount</div></th>
                        <th><div align="center">Payment</div></th>
                        <th><div align="center"><a data-trigger="hover" title="Buttons Functions" data-placement="top" data-content="Check-out/Additional/Discount" data-toggle="popover">Actions</a></div></th>
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_reserve where status='checkin'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
										$excess_id = $cart_row['excess_id'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
										$categ = $product_row['category_id'];
									
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);

	$ex_query = mysql_query("select * from tb_price where excess_id = '$excess_id'")or die(mysql_error());
										$ex_row=mysql_fetch_array($ex_query);
										$time = $ex_row['time'];
										$t = $excess_id + $cart_row['balance'];
	$order_query = mysql_query("Select * from tb_orders where reserveID='$order_id'") or die (mysql_error());									
										$order_row = mysql_fetch_array($order_query);
										$prod = $order_row['productID'];
	$prod_query = mysql_query("Select * from tb_products where productID='$prod'") or die (mysql_error());									
										$prod_row = mysql_fetch_array($prod_query);
										$prod_name = $prod_row['name'];									
										
                                        ?>
                                        
                                        
                                        
              		
                <tbody>
                						<tr>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['total']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['partial']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['balance']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><a href="#orderd<?php echo $order_id; ?>" data-toggle="modal"><?php if ($excess_id == 0){echo 'None';} else{echo $excess_id;}?></div></a></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['discount']; ?></div></td>
										    <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['modeofpayment']; ?></div></td>
                                            
										  	
                                            <td width="128px"><a href="#checkout<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-off"></i></a>
                                            <a href="#addtime<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-edit"></i></a>				
                                            <a href="#discount<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-gift"></i></a>
                                            
                                            </td>
                                            
                                            
<!--Modal Log-out --> 
<div id="orderd<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  
  <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> Kingsfield Express Inn Order Details</h5>
  
  </div>
  <div class="modal-body">
 	
    	<div class="row-fluid">
        
        	<div class="control-group">
            	<div class="controls">
                
                	<div class="thumbnail table alert-info">
 <strong>Product ID &nbsp;</strong>   <strong>Product Name &nbsp;</strong> <strong>Product Price &nbsp;&nbsp;&nbsp;&nbsp;</strong> <strong>Qty &nbsp;</strong> <strong class="pull-right">Extension &nbsp;</strong>
                    </div>
                
                	   		<?php $table_order = mysql_query("SELECT * FROM tb_orders where reserveID = '$order_id'") or die (mysql_error());				while($row_orders = mysql_fetch_array($table_order)){
									$p_id = $row_orders['productID'];
									$x_id = $row_orders['excess_id'];
									
								$table_product = mysql_query("SELECT * FROM tb_products where productID = '$p_id'") or die (mysql_error());						$row_products = mysql_fetch_array($table_product);
								
								$table_ex = mysql_query("SELECT * FROM tb_price where excess_id = '$x_id'") or die (mysql_error());						$row_ex = mysql_fetch_array($table_ex);	
									
							?>
                    
                    
                	<div class="thumbnail table">
                    
             						
								 <span style=" margin-right:60px;"><i class="icon-list"></i> <?php echo $row_orders['productID'];?></span>
								 <span style=" margin-right:60px;"><?php echo $row_products['name'];?></span>
                                 
                                 <span style=" margin-right:80px;"><?php echo $row_products['price'];?></span>
						
                				 <span style=" margin-right:80px;"><?php echo $row_orders['quantity'];?></span>
                                 
                                 <span class="pull-right"><?php echo $row_ex['name'];?></span>
                    
                	</div>
                    
                    <?php }?>
                    
       			</div>
        	</div>
        </div>
 
  </div>
  <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>             
                            
<!--Logout end -->
                                            
                                            
                                             <!-- product delete modal -->
                                    <div id="checkout<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	
                                           <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> Kingsfield Express Inn Check-out</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                                        
                                        <form action="checkout.php<?php echo '?id='.$order_id; ?>" method="post">
                                        
                                        <input name="t" type="hidden" value="<?php echo $t;?>" />
                                        <input name="roomID" type="hidden" value="<?php echo $product_id;?>" />
                                        
                                        
                 
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Kingsfield Express Inn Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
                 <a style=" margin-bottom:10px;" class="btn" href="javascript:Clickheretoprint()"><i class="icon-print"></i> Print Receipt</a>                       
                 
                 <div id="print_content"> 
                                        
                 <div class="alert-block">
                                 	
                 	<p><strong>Transaction Code: </strong><?php echo $cart_row['transaction_code']; ?></p>
                    <p><strong>Guest Name: </strong> <?php echo $member_row['firstname']." ".$member_row['lastname']; ?></p>
                 	<p><strong>Partial Payment: </strong> <?php echo $cart_row['partial']; ?></p>
                    <p><strong>Extension & Orders: </strong> <?php echo $excess_id; ?></p>
                    
                 </div>
                 
                
                 
               <div class="alert alert-info"><h6><strong>Balance is: </strong> <?php echo $cart_row['balance']; ?> + <?php echo $excess_id; ?> = Total Payable:&nbsp; <span style="font-size:18px">PHP <?php echo $t; ?></span></div>
                         
                         				</div>
                  </div><!--Print Receipt -->        
                         		
                                        <div class="modal-footer">
          <button class="btn btn-info" name="checkout" type="submit"><i class="icon-check"></i> Checkout</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancel</button>

                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                    
                                    <!-- end delete modal -->
                                    
                                   
                                            
                                    <!-- addtime modal -->
                                    <div id="addtime<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	<h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> Kingsfield Express Inn Extensions/Orders</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                                      
                  
            <form action="excess.php<?php echo '?id='.$order_id; ?>" method="post"> 
                                        
                 <div align="center" class="alert-block">
                                
                 <input name="ex" type="hidden" value="<?php echo $excess_id;?>" />
                 <input name="memberID" type="hidden" value="<?php echo $member_id;?>" />
                 
   
                 <select name="excess_id">
                 	<option value="0">--Extensions--</option>
                 
                 	<?php
				 
                    $while_query=mysql_query("select * from tb_price where category_id = '$categ'")or die(mysql_error());
                    while($row=mysql_fetch_array($while_query)){
                    ?>
					
                    <option value="<?php echo $row['excess_id']?>"><?php echo $row['name'];echo'&nbsp;&nbsp;'; echo'PHP'; echo '&nbsp;'; echo $row['prices']; echo '.00';?></option>

		
                    <?php } ?>
                    
                	 </select>
				
                    <select name="productID">
                    
                 	<option value="0">--Product--</option>
                 
                 	<?php
				 
                    $pwhile_query=mysql_query("select * from tb_products")or die(mysql_error());
                    while($prow=mysql_fetch_array($pwhile_query)){
                    ?>
					
                    <option value="<?php echo $prow['productID']?>"><?php echo $prow['name'];echo'&nbsp;&nbsp;'; echo'PHP'; echo '&nbsp;'; echo $prow['price']; echo '.00';?></option>

		
                    <?php } ?>
                    
                	 </select>
						      
                 </div>
                 
                 <div align="center"><input name="qty" type="text" placeholder="Quantity" required /></div>
                 
               <div class="alert alert-info"><h6><strong>Balance is: </strong> PHP <?php echo $cart_row['balance'];?></h6></div>
                         
                         				</div>
                         
                         		
                                        <div class="modal-footer">
          		<button class="btn btn-primary" name="submit" type="submit"><i class="icon-check"></i> Submit</button> 
          		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancel</button>

			</form>

                                       </div>
                                        
                                    </div>
                                    <!-- end delete modal -->  
                                    
                                    
                                    
                                       
     <div id="discount<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	
                                            <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> Kingsfield Express Inn Discounts</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                 <div class="alert-block">
                  
 <form action="discount.php" method="post">
  
  <div align="center">Discount Type: <select class="span2" name="disID">
  <option value="0">--Select Discount--</option>
  <?php 
 	
	$rescs = mysql_query("select * from tb_discount order by 'price'") or die (mysql_error());
 		while ($row_dis = mysql_fetch_array($rescs)){
 
  
  ?>
  
 <option  value="<?php echo $row_dis['id']?>"><?php echo $row_dis['name'];?></option> 
 
 <?php }?>
  
  </select>
 
 	<input name="id" type="hidden" value="<?php echo $order_id;?>" />
	<input name="bal" type="hidden" value="<?php echo $cart_row['balance']; ?>" />
                    
                 </div>
                 
             
                         
                         				</div>
                         
                         		
                                        <div class="modal-footer">
          <button class=" btn btn-success" name="discount" type="submit"><i class="icon-check"></i> Ok</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancel</button>

                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                    <!-- end delete modal -->      
                                            
											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->

<div class="item"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-list"></i> List of Checkout</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">Confirmation Code</div></th>
                        <th><div align="center">Room no.</div></th>
                        <th><div align="center">Guest</div></th>
                        <th><div align="center">Days</div></th>
                        <th><div align="center">Arrival</div></th>
                        <th><div align="center">Departure</div></th>
                        <th><div align="center">Total Amount</div></th>
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Incharge</div></th>
                        <th><div align="center">Checkout</div></th>
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_reserve where status='checkout'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
										$incharge = $cart_row['Incharge'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);
    $incharge_query = mysql_query("select * from tb_user where user_id = '$incharge'")or die(mysql_error());
										$incharge_row=mysql_fetch_array($incharge_query);
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['totalamount']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['status']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $incharge_row['firstname']." ".$incharge_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['Date']; ?></div></td>
										  	
                                            
											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->
    

<div class="item"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-list"></i> List of Cancel Transactions</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">Confirmation Code</div></th>
                        <th><div align="center">Room no.</div></th>
                        <th><div align="center">Guest</div></th>
                        <th><div align="center">Days</div></th>
                        <th><div align="center">Arrival</div></th>
                        <th><div align="center">Departure</div></th>
                        <th><div align="center">Total Amount</div></th>
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Incharge</div></th>
                        <th><div align="center">Checkout</div></th>
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_reserve where status='cancel'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
										$incharge = $cart_row['Incharge'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);
    $incharge_query = mysql_query("select * from tb_user where user_id = '$incharge'")or die(mysql_error());
										$incharge_row=mysql_fetch_array($incharge_query);
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['totalamount']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['status']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $incharge_row['firstname']." ".$incharge_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['Date']; ?></div></td>
										  	
                                            
											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->
    
    
    <div class="item"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-user"></i> History Logs</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">Firstname</div></th>
                        <th><div align="center">Lastname</div></th>
                        <th><div align="center">Contact</div></th>
                        <th><div align="center">Action</div></th>
                        <th><div align="center">Date/Time</div></th>
                    
                    </tr>
                </thead>
                	
                    <?php
    $user_table = mysql_query("select  * from tb_history limit 10") or die(mysql_error());

                                    while ($user_row = mysql_fetch_array($user_table)) {
                                       	$usid = $user_row['id'];
										$usr_id = $user_row['user_id'];
	$us_table = mysql_query("select  * from tb_user where user_id = '$usr_id'") or die(mysql_error());
                                  $us_row = mysql_fetch_array($us_table);

                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $user_row['id'];?></div></td>
                                          <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $us_row['firstname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $us_row['lastname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $us_row['contact'];?></div></td>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $user_row['action'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $user_row['date'];?></div></td>
                                           
								
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->

    

<div class="item"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-user"></i> List of Members</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">Firstname</div></th>
                        <th><div align="center">Lastname</div></th>
                        <th><div align="center">Email</div></th>
                        <th><div align="center">Contact no.</div></th>
                        <th><div align="center">Username</div></th>
                        <th><div align="center">Password</div></th>
                        <th><div align="center">Address</div></th>
                        <th><div align="center">Action</div></th>
                    </tr>
                </thead>
                	
                    <?php
    $member_table = mysql_query("select  * from tb_member") or die(mysql_error());
                                    $cart_count = mysql_num_rows($member_table);
                                    while ($member_row = mysql_fetch_array($member_table)) {
                                       	$mmid = $member_row['memberID'];
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['memberID'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['lastname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['email'];?></div></td>
                                       		<td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['contact_number'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['username'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['password'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['address'];?></div></td>
                                            <td width="85"><div align="center"><a href="#delete_member<?php echo $mmid; ?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Delete</a></div></td>
                                            
                                             <!-- Modal delete user -->
<div id="delete_member<?php echo $mmid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Kingsfields Express Inn</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>Are you sure you want to Delete? <strong><?php echo $member_row['firstname']." ".$member_row['lastname'];?></strong></p></div>
  </div>
  <div class="modal-footer">
  	<a class="btn btn-danger" href="delete_member.php<?php echo '?id=' . $mmid; ?>" ><i class="icon-check"></i>&nbsp;Yes</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>
                                         <!--modal end --> 
                                            
                                            
                                            
                                            
                                            
                                            
											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->





<div class="item"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-user"></i> List of Users</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">Username</div></th>
                        <th><div align="center">Password</div></th>
                        <th><div align="center">Firstname</div></th>
                        <th><div align="center">Lastname</div></th>
                        <th><div align="center">Contact no.</div></th>
                        <th><div align="center">Actions</div></th>      
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_user") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                       		$user_id = $cart_row['user_id'];
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['user_id'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['username'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['password'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['firstname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['lastname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['contact'];?></div></td>
                                            <td width="230"><div align="center">
                                            <a href="#adduser" class="btn" role="button" data-toggle="modal"><i class="icon-plus-sign"></i> Add</a>
                                            <a href="#edit_user<?php echo $user_id; ?>" class="btn" role="button" data-toggle="modal"><i class="icon-edit"></i> Edit</a>
                                            <a href="#delete_user<?php echo $user_id; ?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Delete</a>
                                            </div></td>
                                            
                                            <!-- Modal delete user -->
<div id="delete_user<?php echo $user_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Kingsfields Express Inn</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>Are you sure you want to Delete? <strong><?php echo $cart_row['firstname']." ".$cart_row['lastname'];?></strong></p></div>
  </div>
  <div class="modal-footer">
  	<a class="btn btn-danger" href="delete_user.php<?php echo '?id=' . $user_id; ?>" ><i class="icon-check"></i>&nbsp;Yes</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>
                                         <!--modal end --> 
                                         
                                          <!-- Modal edit user -->

<div id="edit_user<?php echo $user_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit user</h3>
  </div>
  <div class="modal-body">
    <form action="edit_user.php<?php echo '?id=' . $user_id; ?>" id="align-center" class="form-horizontal" method="post">
    <div class="alert alert-info"><strong>Informations</strong></div>
                                <hr>
    
                                <div  class="control-group">
                                   
                                    <div align="center" class="controls">
                                        Firstname: <input type="text" name="fn" id="inputEmail" value="<?php echo $cart_row['firstname']?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    
                                    <div align="center" class="controls">
                                        Lastname: <input type="text"  name="ln" value="<?php echo $cart_row['lastname'];?>">
                                    </div>
                                </div>
                                <div class="control-group">
                           
                                    <div align="center" class="controls">
                                        Username: <input type="text" name="un" value="<?php echo $cart_row['username'];?>">
                                    </div>
                                </div>
                                <div class="control-group">
                       
                                    <div align="center" class="controls">
                                       Password: <input type="text" name="p" value="<?php echo $cart_row['password'];?>">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <div align="center" class="controls">
                                       Contact no.: <input type="text" name="cn" value="<?php echo $cart_row['contact'];?>">
                                    </div>
                                </div>
            
                            

                           
  </div>
  <div class="modal-footer">
  	
  	<button type="submit" name="update" class="btn btn-success"><i class="icon-check"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
   
    
  </div>
</div><!--modal -->

 </form>
					
                            
<!--edit user modal end --> 
                                                                  
                                           											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->






<div class="item"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-list"></i> List of Rooms</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">Room</div></th>
                        <th><div align="center">Description</div></th>
                        <th><div align="center">Price</div></th>
                        <th><div align="center">Category</div></th>
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Actions</div></th>      
                    </tr>
                </thead>
                	
                    <?php
    $room_table = mysql_query("select  * from tb_rooms order by roomID") or die(mysql_error());
                                    $room_count = mysql_num_rows($room_table);
                                    while ($room_row = mysql_fetch_array($room_table)) {
										$catid = $room_row['category_id'];
										$roomID = $room_row['roomID'];
                                       
	$rm_table = mysql_query ("select * from tb_category where category_id = '$catid'") or die (mysql_error());   
									   	$cat_row = mysql_fetch_array($rm_table);										
										
										
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['roomID'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['name'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['description'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['price'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cat_row['category_name'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['status'];?></div></td>
                                            <td width="250"><div align="center">
                                            <a href="#update<?php echo$roomID;?>" class="btn" role="button" data-toggle="modal"><i class="icon-plus-sign"></i> Update</a>
                                            <a href="#edit_room<?php echo $roomID;?>" class="btn" role="button" data-toggle="modal"><i class="icon-edit"></i> Edit</a>
                                            <a href="#delete_room<?php echo $roomID;?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Delete</a>
                                            </div></td>
                                            
                                            
                                             <!-- Modal delete room -->
<div id="update<?php echo $roomID; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Kingsfields Express Inn</h3>
  </div>
  <div class="modal-body">
    
   <form action="update_room.php<?php echo '?id=' . $roomID; ?>" method="post">
   
   			<div align="center">Room Status: <input name="status" type="text" value="" /></div>
    
  </div>
  <div class="modal-footer">
  	<button type="submit" name="updateroom" class="btn btn-success"><i class="icon-check"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
  
  </form>
  
</div>
                                         <!--modal end --> 
                                            
                                            
                                            <!-- Modal delete room -->
<div id="delete_room<?php echo $roomID; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Kingsfields Express Inn</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>Are you sure you want to Delete? <strong>Room <?php echo $room_row['name']." ".$cat_row['category_name'];?></strong></p></div>
  </div>
  <div class="modal-footer">
  	<a class="btn btn-danger" href="delete_room.php<?php echo '?id=' . $roomID; ?>" ><i class="icon-check"></i>&nbsp;Yes</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>
                                         <!--modal end --> 
                                            
                                          <!-- Modal add rooms -->
<div id="edit_room<?php echo $roomID;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Rooms</h3>
  </div>
  <div class="modal-body">
  
  <form action="edit_room.php<?php echo '?id=' . $roomID; ?>" class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Informations</strong></div>
                                <hr>
                                                              
                                
                                <div class="control-group">
                                    
                                    <div align="center" class="controls">
                                        Room no.: <input required type="text" name="name" id="inputEmail" value="<?php echo $room_row['name'];?>">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                   
                                    <div style="margin-left:104px;" class="controls">
                                        Descriptions: <input type="text"  name="description" value="<?php echo $room_row['description'] ;?>" >
                                    </div>
                                </div>
                                
                            
                                <div class="control-group">
                                    <div style="margin-left:125px;" class="controls">
                                        Category: <select type="text" name="category">
                                        
                                        <option>--Select Category--</option>

          		<?php
				$rslt = mysql_query("SELECT * FROM tb_category ORDER BY category_id ");
				while($tst = mysql_fetch_array($rslt))
				{
				if (!$rslt)
					{
					die("Error: Data not Found. . ");
					}
				echo "<option value=".$tst['category_id'].">".$tst['category_name']."</option>";
				}
				 ?>
                                  	
                                        </select>
                                                
                   						
                                      
                                    </div>
                                    
                                </div>
                                
  									
                             

                                <div class="control-group">
                                    <div style="margin-left:150px;" class="controls">
                                        Price: <input type="text" name="price" value="<?php echo $room_row['price'];?>">
                                        	<input type="hidden" name="status" value="Available" >
                                    </div>
                                </div>

                               

                                <div class="control-group">
                                   <div style="margin-left:250px;" class="controls">
                                        <input type="file" name="image"> 
                                    </div>
                                </div>

       
  
    
  </div>
  <div class="modal-footer">
   <button type="submit" name="roomupdate" class="btn btn-success"><i class="icon-check"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
    
  </div>
  
</div>
                        
    </form>                      
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                           											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->







  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>


