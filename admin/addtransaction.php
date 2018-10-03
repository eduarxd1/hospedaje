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
<div style="margin-top:20px; margin-bottom:20px;" class="container thumbnail">

		<form id="formID" class="form-horizontal" method="post" onSubmit="return validateForm()">
    <div class="alert alert-info"><strong><i class="icon-info-sign"></i> Informations</strong></div>
                                <hr>
                                
                                <div class="span6">
                                
    							<div class="alert alert-info"><i class="icon-user"></i> Guest Details</div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">FirstName:</label>
                                    <div class="controls">
                                        <input class="validate[required,custom[onlyLetterSp]] text-input" name="fname" type="text" id="req" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LastName:</label>
                                    <div class="controls">
                                        <input class="validate[required,custom[onlyLetterSp]] text-input" type="text"  name="lastname">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Username:</label>
                                    <div class="controls">
                                       <input class="validate[required,custom[onlyLetterNumber],maxSize[20],ajax[ajaxUserCallPhp]] text-input" name="user" type="text" id="user"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input class="validate[required,minSize[6]] text-input" type="text" name="password">
                                    </div>
                                </div>

								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Contact Number:</label>
                                    <div class="controls">
                                        <input value="63" class="validate[required,[maxSize[12],custom[onlyNumberSp],[minSize[12]] text-input" name="cnumber" maxlength="12" type="text" id="telephone">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email:</label>
                                    <div class="controls">
                                        <input class="validate[required,custom[email]] text-input" name="email" id="email" type="text">
                                    </div>
                                </div>
                                
                                
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Address:</label>
                                    <div class="controls">
                                        <input class="validate[required] text-input" name="address" type="text"/>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Zip:</label>
                                    <div class="controls">
                                        <input class="validate[required,custom[onlyNumberSp]] text-input" name="zip" type="text" id="onlynumber"/>
                                    </div>
                                </div>

                                </div>
                                
       
         
                                
                                <div class="span5">
                                
                                <div class="alert alert-info"><i class="icon-shopping-cart"></i> Guest Orders</div>
    							
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Category name:</label>
                                    <div class="controls">
                                    	<select name="country" id="country">
              								<option>-select your category-</option>
             				<?php 
		
       						 mysql_select_db('kingsfields_database',mysql_connect("localhost","root","")) or die(mysql_error());
		 
        						$result=mysql_query("SELECT * from tb_category order by category_id");
        						while($country=mysql_fetch_array($result)){
         
        					echo "<option value=$country[category_id]>$country[category_name]</option>";
 
        					} ?>
            							</select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Room no.:</label>
                                    <div class="controls">
                                        <select name="city" id="city">
              								<option>-select available rooms-</option>
            							</select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Prices:</label>
                                    <div class="controls">
                                        <select name="city1" id="city1">
              								<option>-room prices-</option>
            							</select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <div class="controls">
                                       
				                    
					  <span style=" color:rgba(0,0,0,1);">Start Date: <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" placeholder="Arrival" name="start" id="sd" value="" maxlength="10" readonly style="width: 210px; border: 1px double #CCCCCC; padding:5px 10px;"/></span><br>
						<span style="color:rgba(0,0,0,1);">End Date:<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" placeholder="Departure" name="end" id="ed" value="" maxlength="10" readonly style="width: 210px; margin-left:px; border: 1px double #CCCCCC; padding:5px 10px;" /></span><br>
						<input type="hidden" name="result" id="result" /><br>
                        
                                    </div>
                                </div>
                                
                                <div style="margin-top:50px;" class="control-group">
                                    <div class="controls">
                       	<button class="btn btn-info" type="submit" name="transaction" onClick="setDifference(this.form);"><i class="icon-check"></i> Save</button>
						<button class="btn" type="reset"><i class="icon-remove"></i> Clear</button>
                                    </div>
                                </div>
                                
                                



                                </div>
                                
                            
</div>

</form>


<?php

function createRandomPassword() {



    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;



    while ($i <= 11) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }



    return $pass;



}


$query = mysql_query("select * from tb_member where memberID") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $memberID = $row['memberID'];
										$m = $memberID + 1;}

if(isset($_POST['transaction'])){
	
	$confirmation = createRandomPassword();
	$f = $_POST['fname'];
	$l = $_POST['lastname'];
	$e = $_POST['email'];
	$cn = $_POST['cnumber'];
	$a = $_POST['address'];
	$u = $_POST['user'];
	$p = md5($_POST['password']);
	$c = $_POST['country'];
	$roomID = $_POST['city'];
	$total = $_POST['city1'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$rno = $_POST['result'];
	
	if ($rno == 0 ){
		
		$rno + 1;
	
	$tt = $total * $rno;
	
	}
	
	else{
		
		$tt = $total * $rno;
		
		}
	
	
mysql_query("insert into tb_member(firstname,lastname,email,address,contact_number,username,password,country) values('$f','$l','$e','$a','$cn','$u','$p','$c')") or die(mysql_error());

mysql_query("insert into tb_reserve(memberID,roomID,balance,status,transaction_code,arrival,departure,days_no) values('$m','$roomID','$tt','reserved','$confirmation','$start','$end','$rno')") or die(mysql_error());

mysql_query("update tb_rooms set status='Reserved' where roomID='$roomID'") or die(mysql_error());

	header('location:progressbar.php');
}


?>

<?php include'modals.php';?> 
<?php include'script.php';?>
