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


     
        
        <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

		<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
		<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
		<script>
			jQuery(document).ready(function() {
				// binds form submission and fields to the validation engine
				jQuery("#formID").validationEngine({
					autoHidePrompt:true,
					prettySelect : true,
					useSuffix: "_chzn"

					//promptPosition : "bottomLeft"
				});
				$("#country").chosen({
					allow_single_deselect : true
				});
			});
		</script>
        
        <script>
		jQuery(document).ready(function(){
			jQuery("#formID").validationEngine();

			$("#formID").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
		});
		</script>
        
        
  		

 
  </head>
  
 
  
  <?php 
  
  $start = $_POST['start'];
  $end = $_POST['end'];
  $result = $_POST['result'];
  $bal = $_POST['bal'];
  $pre = $_POST['pre'];
  $total = $_POST['total'];
  $tax = $_POST['tax'];
  $totalper = $_POST['totalper'];
  $balance = $_POST['balance'];
  $partial = $_POST['partial'];

  
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
  
  <li><a tabindex="-1" href="#"><strong>Fechas de reserva</strong></a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Llegada:</span> <?php echo $start;?></a></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Salida:</span> <?php echo $end;?></a></li>
  <li><a tabindex="-1" href="#"><span class="text-info">No. de Dias:</span> <?php echo $result;?></a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#"><strong>Cuentas a pagar en el hotel</strong></a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Total:</span> PHP <?php echo $total;?>.00</a></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Pago por adelantado:</span> PHP <?php echo $pre;?>.00</a></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Balance:</span> PHP <?php echo $bal;?>.00</a></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Impuesto:</span> PHP <?php echo $tax;?>.00</a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#"><strong>Habitacion</strong></a></li>
  <li class="divider"></li>
  <li><a tabindex="-1" href="#"><span class="text-info">Room ID.</span> <?php

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
                
                <form id="formID" class="formular" method="post" action="orden.php">

        <h4>Paso 4: Detalles del huésped</h4>
        	<hr>
            <table width="503">
  
                   	<input name="start" type="hidden" value="<?php echo $start;?>">
                    <input name="end" type="hidden" value="<?php echo $end;?>">
                    <input name="result" type="hidden" value="<?php echo $result;?>">
                    <input name="total" type="hidden" value="<?php echo $total;?>">
                    <input name="pre" type="hidden" value="<?php echo $pre;?>">
                    <input name="bal" type="hidden" value="<?php echo $bal;?>">
                    <input name="tax" type="hidden" value="<?php echo $tax;?>">
                    
                    <input name="totalper" type="hidden" value="<?php echo $totalper;?>">
    				<input name="balance" type="hidden" value="<?php echo $balance;?>">
   					<input name="partial" type="hidden" value="<?php echo $partial;?>">
                    
                    
                    <?php

					$id=$_POST['selector'];
					$N = count($id);
					for($i=0; $i < $N; $i++)
					{

					?>

					<input name="selector[]" type="hidden" value="<?php echo $id[$i];?>"/>

					<?php }?>

                
            
            	<tr>

                	<td width="270">Nombres:<input class="validate[required,custom[onlyLetterSp]] text-input" name="fname" type="text" id="req" ></td>
                    
            		<td width="221">Apellidos:<input class="validate[required,custom[onlyLetterSp]] text-input" name="lname" type="text" id="req2"></td>
		
        		</tr>

                
                <tr>
                
                	<td>Email:<input class="validate[required,custom[email]] text-input" name="email" id="email" type="text"></td>
                    <td>Confirmar Email :<input class="validate[required,equals[email]] text-input" name="cemail" id="email2" type="text"></td>
                
                
                </tr>
                
                <tr>
                
                <td>Usuario:<input class="validate[required,custom[onlyLetterNumber],maxSize[20],ajax[ajaxUserCallPhp]] text-input" name="user" type="text" id="user"/></td>
                
                	
                    <td>Numero de Contacto:<input value="63" class="validate[required,[maxSize[12],custom[onlyNumberSp],[minSize[12]] text-input" name="cnumber" maxlength="12" type="text" id="telephone"></td>
                
                
                </tr>
                
                 <tr>
                
                	<td>Contraseña:<input class="validate[required,minSize[6]] text-input" name="password" id="password" type="password"></td>
                    <td>Repite la contraseña:<input class="validate[required,minSize[6],equals[password]] text-input" name="password2" id="password2" type="password"></td>
                
                
                </tr>
                
                 <tr>
                    
                    <td>Código postal:<input class="validate[required,custom[onlyNumberSp]] text-input" name="zip" type="text" id="onlynumber"/></td>
                
                
                </tr>
                
                <tr>
                
                	<td>Pais:<input class="validate[required] text-input" name="address" type="text"/></td>
                    <td><input class="validate[required] checkbox" type="checkbox" id="agree" name="agree"/> <span style=" font-size:12px">I agree & accept <a href="#myModal" data-toggle="modal">terms & conditions</a></span></td>
                    
                </tr>    
                        
            </table>
            
            <label>Solicitud especial</label>
            <label style="font-size:12px">(Opcional. También puede especificar los detalles de su vuelo aquí.)</label>
       		<textarea class="span11" rows="8" name="request"></textarea>
            
   			  </div><!--form sign -->
                
           	</div><!--span 6 -->
            
        
            
            
            <div class="span6">
    
    			
                
    			<div class="form-signin">
                
                <h4><div style="margin-top:-10px; margin-left:-5px;"><img src="media/durmiendo.png" height="50" width="50"></div> HOSPEDAJE RAMSES II</h4>
                
                <hr>
                
                
                   
 	<div align="right">			
 	<button class="btn btn-large btn-primary" name="order" type="submit"><i class="icon-check"></i>Reservar habitacion</button>
    </div>            
                
                
                </form>
                
                <div class="accordion" id="accordion2">

  <div style="margin-top:20px;" class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        <i class="icon-user"></i> Área de miembros
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
       
       <form action="order_login.php" method="post">
       
       <div class="row-fluid">
       			<div class="span3">
                
<div class="control-group">
                   	  <div class="controls">
                    			
						<label for "username">Usuario</label>
						<input type="text" name="username_login" required/>
                        
                    </div>
				  </div>
                    
                    
                    <input name="start" type="hidden" value="<?php echo $start;?>">
                    <input name="end" type="hidden" value="<?php echo $end;?>">
                    <input name="result" type="hidden" value="<?php echo $result;?>">
                    <input name="total" type="hidden" value="<?php echo $total;?>">
                    <input name="pre" type="hidden" value="<?php echo $pre;?>">
                    <input name="bal" type="hidden" value="<?php echo $bal;?>">
                    <input name="tax" type="hidden" value="<?php echo $tax;?>">
                    
                    <input name="totalper" type="hidden" value="<?php echo $totalper;?>">
    				<input name="balance" type="hidden" value="<?php echo $balance;?>">
   					<input name="partial" type="hidden" value="<?php echo $partial;?>">
 
                    
                    <?php

					$id=$_POST['selector'];
					$N = count($id);
					for($i=0; $i < $N; $i++)
					{

					?>

					<input name="selector[]" type="hidden" value="<?php echo $id[$i];?>"/>

					<?php }?>
                    
                    
                    <div class="control-group">
                    	<div class="controls">
						<label for "email">Password</label>
						<input type="password" name="password_login" required/>
						</div>
                    </div>
                   	
                    <div class="control-group">
                    	<div class="controls">
						<button class="btn" type="submit" name="order_login"><i class="icon-check"></i> Sign-in</button>
						</div>
                    </div>    
                </div>
            
                     
		</div><!-- end form_elements -->
       
       </form>
       
       
      </div>
    </div>
  </div>
</div>
                
                
      			</div><!--form sign -->
                
           	</div><!--span 6 --> 
            
                   
        
        </div><!--row fluid -->
            

    </div> <!-- /container -->
    
    
    <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">HOSPEDAJE RAMSES II</h3>
  </div>
  <div class="modal-body">
  
  
  
    <p>Terminos & Condiciones</p>
    
    <p>Diri eh butang</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
  </div>
</div>

  </body>
</html>
