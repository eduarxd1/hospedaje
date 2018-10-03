


                        <!-- Modal add rooms -->
<div id="addroom" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Rooms</h3>
  </div>
  <div class="modal-body">
  
  <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Informations</strong></div>
                                <hr>
                                                              
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Room no.</label>
                                    <div class="controls">
                                        <input required="required" type="text" name="name" id="inputEmail">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Description:</label>
                                    <div class="controls">
                                        <input type="text"  name="description" >
                                    </div>
                                </div>
                                
                            
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Category:</label>
                                    <div class="controls">
                                        <select type="text" name="category">
                                  		
                                        <option>--Select Category--</option>
          		<?php
				$result = mysql_query("SELECT * FROM tb_category ORDER BY category_id");
				while($test = mysql_fetch_array($result))
				{
				if (!$result)
					{
					die("Error: Data not Found. . ");
					}
				echo "<option value=".$test['category_id'].">".$test['category_name']."</option>";
				}
					mysql_close($conn);
				 ?>
                                  	
                                        </select>
                                                
                   						
                                      
                                    </div>
                                    
                                </div>
                                
  									
                             

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Price:</label>
                                    <div class="controls">
                                        <input type="text" name="price">
                                        <input type="hidden" name="status" value="Available" >
                                    </div>
                                </div>

                               

                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image"> 
                                    </div>
                                </div>

       
  
    
  </div>
  <div class="modal-footer">
   <button type="submit" name="roomsave" class="btn btn-success"><i class="icon-check"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
    
  </div>
  
</div>
                        
    </form>                   
              <?php
                            if (isset($_POST['roomsave'])) {

                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $category = $_POST['category'];
                                
                                $price = $_POST['price'];
                         
								$status = $_POST['status'];

                                //image
                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);
//
                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];


                                mysql_query("insert into tb_rooms (name,description,category_id,price,location,status)
                            	values ('$name','$description','$category','$price','$location','$status')
                                ") or die(mysql_error());

                                header('location:progressbar.php');
                            }
                            ?>           
       



<!--add room modal end -->





<!--adduser modal -->
<div id="adduser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add user</h3>
  </div>
  <div class="modal-body">
    <form id="align-center" class="form-horizontal" method="post">
    <div class="alert alert-info"><strong>Informations</strong></div>
                                <hr>
    
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">FirstName:</label>
                                    <div class="controls">
                                        <input name="fn" type="text" required="required" id="inputEmail"   >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LastName:</label>
                                    <div class="controls">
                                        <input type="text" required="required"  name="ln">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Username:</label>
                                    <div class="controls">
                                        <input type="text" required="required" name="un">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="password" required="required" name="p">
                                    </div>
                                </div>

								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Contact Number:</label>
                                    <div class="controls">
                                        <input name="cn" type="text" required="required" max="13">
                                    </div>
                                </div>

                                
                            

                           
  </div>
  <div class="modal-footer">
  	
  	<button type="submit" name="saveu" class="btn btn-success"><i class="icon-check"></i> Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
   
    
  </div>
</div><!--modal -->

 </form>
 


	 					<?php
                            if (isset($_POST['saveu'])) {

                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $un = $_POST['un'];
                                $p = md5($_POST['p']);
								$cn = $_POST['cn'];

                                mysql_query("insert into tb_user (firstname,lastname,username,password,contact) values('$fn','$ln','$un','$p',$cn)") or die(mysql_error());
                                header('location:progressbar.php');
                            }
							
                            ?>
							
                            
<!--add user modal end -->     
                       

<!--Modal Product --> 
<div id="addproduct" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <div class="modal-body">
  <div class="alert alert-info">Enter Product <strong>Informations</strong></div>
                 
                 	<form method="post">
                 
                	<div align="center">Product Name: <input name="pproduct" type="text" value="" /></div>
                    <div style="margin-left:55px;" align="center">Price: <input name="pprice" type="text" value="" /></div>
                     
  </div>
  	 
  <div class="modal-footer">
  		<button class="btn btn-info" type="submit" name="product"><i class="icon-check"></i> Save</button>
      	<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
  
  					</form>
</div>             
                            
<!--Product end --> 

	<?php 
	
		if(isset($_POST['product'])){
	
		$pproduct = $_POST['pproduct'];
		$pprice	= $_POST['pprice'];
		
		mysql_query("insert into tb_products (name,price) values('$pproduct','$pprice')") or die(mysql_error());
		header('location:admin.php');
	
	
		}
		
	?>

<!--Modal Product --> 
<div id="adddiscount" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <div class="modal-body">
  <div class="alert alert-info">Enter Discount <strong>Informations</strong></div>
                 
                 	<form method="post">
                 
                	<div align="center">Discount Type: <input name="ndiscount" type="text" value="" /></div>
                    <div style="margin-left:35px;" align="center">Discount: <input name="price" type="text" value="" /></div>
                     
  </div>
  	 
  <div class="modal-footer">
  		<button class="btn btn-info" type="submit" name="discount"><i class="icon-check"></i> Save</button>
      	<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
  
  					</form>
</div>             
                            
<!--Product end --> 

	<?php 
	
		if(isset($_POST['discount'])){
	
		$ndiscount = $_POST['ndiscount'];
		$price	= $_POST['price'];
		
		mysql_query("insert into tb_discount (name,price) values('$ndiscount','$price')") or die(mysql_error());
		header('location:admin.php');
	
	
		}
		
	?>
    

<!--Modal Log-out --> 
<div id="logout" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <div class="modal-body">
  <div class="alert alert-info">Are you Sure you Want to <strong>Logout</strong>?</div>
  </div>
  <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
      <a href="logout.php" class="btn btn-info"><i class="icon-off"></i> Logout</a>
  </div>
</div>             
                            
<!--Logout end -->                           
                            

