<?php include('header.php');?>
<?php include('admin/connect.php');?>

    <style type="text/css">
 
      .form-signin {
        max-width: 600px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
	  
	  
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

<script>

function goBack()
  {
  window.history.back()
  }
  
</script>
 
  </head>
 
  


  
  	<?php 			
  
  $start = $_POST['start'];
  $end = $_POST['end'];
  $result = $_POST['result'];

	?>

  <body>
  
  
  
  

    <div class="container">
    
    
    	<div class="row-fluid">
        
        	<div class="span6">
    
    			<div class="form-signin">
                

                
                <div class="btn-group">
  <button style="margin-left:0px; margin-bottom:0px;" class="btn" onClick="goBack()"><i class="icon-hand-left"></i> Atras</button>
  <button class="btn dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  
  <li><a tabindex="-1" href="#"><strong>Datos de Reservacion</strong></a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Llegada:</span> <?php echo $start?></a></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Salida:</span> <?php echo $end?></a></li>
  <li><a tabindex="-1" href="#"><span class="text-info">No. de Dias:</span> <?php echo $result?></a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#"><strong>habitacion</strong></a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Room ID.</span>  <?php

					$id=$_POST['selector'];
					$N = count($id);
					for($i=0; $i < $N; $i++)
					{

					?>

					<?php echo '#'."". $id[$i];?>

					<?php }?></a></li>
    <!-- dropdown menu links -->
  </ul>
				</div>
                


        <h4>Paso 3: Confirmar La Reserva</h4>
        
			<hr>
            <table>
            	<tr>
					<td><strong>No Habitacion</strong></td>
                    <td width="300px"><div align="right"> 
  	<?php 
  
  	$id=$_POST['selector'];
	$N = count($id);
	$rname = NULL;
	$pname = NULL;

	for($i=0; $i < $N; $i++)
	{
	
	
	$res = mysql_query("SELECT * FROM tb_rooms where roomID='$id[$i]'");
	while($row = mysql_fetch_array($res)){
			$rname = $row['name'];

			
	}
  
  
   ?>
    <?php echo '#'."".$rname;?>
    
    <?php }?>  </div></td>
 				</tr>
                <tr>
                	<td><strong>Precio</strong></td>
                	<td><div align="right"><?php 
  
  	$id=$_POST['selector'];
	$N = count($id);
	$rname = NULL;

	for($i=0; $i < $N; $i++)
	{
	
	
	$res = mysql_query("SELECT * FROM tb_rooms where roomID='$id[$i]'");
	while($row = mysql_fetch_array($res)){
			$pname += $row['price'];


			
	}
  
  
   ?>
    <?php }?>
	
	<?php 
	
	
	
	$f = sprintf ("%.2f", $pname);
	
	 echo 'PHP'." ". $f;?>  </div></td>                
                </tr>
      
                <tr>
                	<td><strong>Tipo de Habitacion:</strong></td>
                	<td><div align="right"><?php 
  
  	$id=$_POST['selector'];
	$N = count($id);
	$rname = NULL;

	for($i=0; $i < $N; $i++)
	{
	
	
	$res = mysql_query("SELECT * FROM tb_rooms where roomID='$id[$i]'");
	while($row = mysql_fetch_array($res)){
			$catid = $row['category_id'];
			$pname += $row['price'];
			
			$cat = mysql_query("SELECT * FROM tb_category where category_id = '$catid'") or die(mysql_error());
				while($rowcat = mysql_fetch_array($cat)){
						$category = $rowcat['category_name'];
					
						
							
					
				}

			
	}
  
  
   ?>
    <?php }?>
    
    <?php echo $category; ?>
    
    
	  </div></td>
                </tr>
                <tr>
                	<td></td>
                    <td><div align="right">Precio total de la habitación con cargos:</div></td>
                    <td width="100px"><div align="right"><?php 
					
					$rtotal = $f;
					
					
					$g = sprintf ("%.2f", $rtotal);
					
					
					echo 'PHP'." ".$g;
					
					?> </div></td>
                
                </tr>
                <tr>
                	<td></td>
                    <td><div align="right"></div></td>
                    <td width="100px"><div align="right"><?php 
  
  	$id=$_POST['selector'];
	$N = count($id);
	$rname = NULL;
	$pname = NULL;

	for($i=0; $i < $N; $i++)
	{
	
	
	$res = mysql_query("SELECT * FROM tb_rooms where roomID='$id[$i]'");
	while($row = mysql_fetch_array($res)){
			$prce = $row['price'];

			
	}
  
  
   ?>
   <?php }?>
    <?php  
	
	
	
	$pr = $prce - ($prce * .15);
	
	
		
	$l = sprintf ("%.2f", $pr);


	
	$tax = $g * 11.5/100;
	
	$t = sprintf ("%.2f", $tax);
	
	$total = $f * $result;
	
	$tt = sprintf ("%.2f", $total);
	
	$p = $tt * .10;
	
	$pre = sprintf ("%.2f", $p);
	
	$b = $tt - $pre;
	
	$bal = sprintf ("%.2f", $b);
	
	
	
	$totalper = sprintf("%.2f",$result * $prce);	
	$prep = sprintf("%.2f",$totalper * .10);
	$balance = sprintf("%.2f",$totalper - $prep);
	$part = sprintf("%.2f",$totalper - $balance);
	
	?>
  
    
    
      </div></td>
                
                </tr>
                <tr>
                	<td></td>
                    <td><div align="right"><i class="icon-info-sign"></i> Impuestos:</div></td>
                    <td width="100px"><div align="right"><?php echo 'PHP'." ".$t;?> </div></td>
                
                </tr>
                <tr>
                	<td></td>
                    <td><div align="right">Costo total de reserva:</div></td>
                    <td width="100px"><div align="right"><?php echo 'PHP'." ".$tt;?> </div></td>
                
                </tr>
               
                <tr class="alert alert-info">
                	<td></td>
                    <td><div align="right">DEBE AHORA - EL 10%:</div></td>
                    <td width="100px"><div align="right"><?php echo 'PHP'." ".$pre;?> </div></td>
                </tr>
                <tr class="alert alert-success">    
                    <td></td>
                    <td><div align="right">BALANCE:</div></td>
                    <td width="100px"><div align="right"><?php echo 'PHP'." ".$bal;?> </div></td>
                </tr>
                
                
            </table>
            
            	<form action="details.php" method="post">
                
                <div style="margin-right:16px; margin-top:20px;" class="pull-right">
                <button name="order" class="btn btn-large btn-primary" type="submit"><i class="icon-user"></i> Detalles del huésped <i class="icon-arrow-right"></i></button>
            		</div>
               	<p>&nbsp;</p> 
                <p>&nbsp;</p>
                                
                <input name="start" type="hidden" value="<?php echo $start;?>">
                <input name="end" type="hidden" value="<?php echo $end;?>">
                <input name="result" type="hidden" value="<?php echo $result;?>">
                <input name="bal" type="hidden" value="<?php echo $bal;?>">
                <input name="pre" type="hidden" value="<?php echo $pre;?>">
                <input name="total" type="hidden" value="<?php echo $tt;?>">
                <input name="tax" type="hidden" value="<?php echo $t;?>">
                  
    			<input name="totalper" type="hidden" value="<?php echo $totalper;?>">
    			<input name="balance" type="hidden" value="<?php echo $balance;?>">
   				<input name="partial" type="hidden" value="<?php echo $part;?>">
                
                
                <?php

				$id=$_POST['selector'];
				$N = count($id);
				for($i=0; $i < $N; $i++)
				{

				?>

				<input name="selector[]" type="hidden" value="<?php echo $id[$i];?>"/>

				<?php }?>
                
                 	<?php 
  
  	$id=$_POST['selector'];
	$N = count($id);
	$rname = NULL;
	$pname = NULL;

	for($i=0; $i < $N; $i++)
	{
	
	
	$res = mysql_query("SELECT * FROM tb_rooms where roomID='$id[$i]'");
	while($row = mysql_fetch_array($res)){
			$rname = $row['name'];
			$roomID = $row['roomID'];
			

			
	}
  
  
   ?>
   
                
                
               
                	 <?php }?>
                </form>   
      			</div>
                
           	</div>
            
            <div class="span6">
    
    			<div class="form-signin">
					
                    <h4><i class="icon-time"></i> Llegada & Detalles de salida</h4>
                    <hr>
					<table>
                    	<tr>
                    		<td><strong>Llegada:</strong></td>
                            <td width="100px"><div align="right"><?php echo $start;?></div></td>  
                    	</tr>
                        <tr>
                    		<td><strong>Salida:</strong></td>
                            <td width="100px"><div align="right"><?php echo $end;?></div></td>  
                    	</tr>
                        <tr>
                    		<td><strong>Numero de Noches:</strong></td>
                            <td width="100px"><div align="right"><?php if ($result==1){echo $result; echo ' night'; }else{echo $result; echo ' nights';}?></div></td>  
                    	</tr>
                    </table>
                    <hr>
                    <p>Se requiere un pago por adelantado para confirmar su reserva y esto no es reembolsable.</p>
                    <p>Sin cargo adicional si cancela las 24 horas o más antes de la fecha de llegada. Para cancelaciones hechas con menos de 24 horas antes de la fecha de llegada, se aplicará el costo de la primera noche</p>
 
      			</div>
                
           	</div>        
        
        </div>

    </div> <!-- /container -->

  

  </body>
</html>
