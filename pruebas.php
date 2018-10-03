<?php
	session_start();
	require('conexion.php');
	include('admin/connect.php');
	include('conexion1.php');

?>



<!-- mi css-->
	
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Personales</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<!--mi css-->


    <script type="text/javascript" src="js/jquery-2.0.2.min.js"></script> 
    
    <link rel="stylesheet" type="text/css" href="admin/css/DT_bootstrap.css">   
	<script type="text/javascript" charset="utf-8" language="javascript" src="admin/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="admin/js/DT_bootstrap.js"></script>


	<script type="text/javascript" src="js/sagallery.js"></script>
	<script src="gallery/jquery-photo-gallery/jquery-photo-gallery/js/jquery.quicksand.js" type="text/javascript"></script>
	<script src="gallery/jquery-photo-gallery/jquery-photo-gallery/js/jquery.easing.js" type="text/javascript"></script>
	<script src="gallery/jquery-photo-gallery/jquery-photo-gallery/js/script.js" type="text/javascript"></script>
	<script src="gallery/jquery-photo-gallery/jquery-photo-gallery/js/jquery.prettyPhoto.js" type="text/javascript"></script> 
	<link href="gallery/jquery-photo-gallery/jquery-photo-gallery/css/prettyPhoto.css" rel="stylesheet" type="text/css" />









    
<script>

function goBack()
  {
  window.history.back()
  }
 
</script>


<script language="javascript">
function validate()
{
var chks = document.getElementsByName('selector[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Por favor seleccione al menos uno.");
return false;
}
return true;
}
</script>



  </head>

  
 <?php
	
	$start=$_POST['start'];
	$end=$_POST['end'];
	$r=$_POST['result'];
	
	if ($r==0){		
		$r=$r+1;
		
		$result = sprintf ("%.1f", $r);
	
		}
		else{
			
			$result = sprintf ("%.1f", $r);
			
			$result;
			
			
			}
		
	
?>
  
  
  
  

  <body>
  
<!--Navegación-->

<div class="">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">HOSPEDAJE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="personal.php">Inicio</a></li>
      </ul>

	<?php if($_SESSION['tipo_usuario']==1) { ?>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="registrarse.php"><span class="glyphicon glyphicon-user"></span> Registrar Usuario</a></li>
	  </ul>
	  <?php } ?>
	  
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Habitaciones <span class="caret"></span></a>
          <ul class="dropdown-menu">	
            <li><a href="#">Ver Disponibles</a></li>
            <li><a href="reservaciones.php">Reservaciones</a></li>
            <li><a href="habitaciones.php">Habitaciones</a></li>
           </ul>
        </li>
		<li><a href="#"><span class="glyphicon glyphicon-user"></span> Mostrar Usuarios</a></li>
		<li><a href="cerrar.php"><span class="glyphicon glyphicon-log-in"></span> Finalizar Sesión</a></li>
      </ul>
	
    </div>
  </div>
</nav>

</div>
<!--Navegación-->

<div class="container">
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

 <!-- dropdown menu links -->
  </ul>
</div>	
	
	
	<hr>
                                            
                            <form name="form1" onSubmit="return validate()" method="post" action="reservacion.php">
                          
      
      	<div class="pull-right"><button class="btn btn-large btn-primary" name="submit" type="submit"><i class="icon-check"></i> Reservar</button></div>
      
        <h4>Paso 2: Seleccione habitaciones</h4>
        
        
        
        									
        
        									<input name="start" type="hidden" value="<?php echo $start;?>">
                                            <input name="end" type="hidden" value="<?php echo $end;?>">
                                            <input name="result" type="hidden" value="<?php echo $result;?>">
        
	
	
	
	
	
<!-- Modal -->
<div id="about" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Kingsfields Express Inn</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>
<!--Modal end -->







 

		<hr>
        				
      	
                                            
        	<table  border="0" class="table table-striped table-bordered" id="example">                      
                            <thead class=" hero-unit">
                                <tr>
                                
                                	<th width="60"><div align="center" style="margin-top:10px;">Imagen</div></th>
                                    <th width="20"><div align="center" style="margin-top:10px;">No.</div></th>
                                    <th width="100"><div align="center" style="font-size:16px">Precio</div></th>
                                    <th width="180"><div align="center" style="font-size:16px">Categoria</div></th>
                                    <th width="160"><div align="center" style="font-size:16px">10% Pre-Reservas</div></th>
                                    <th><div align="center" style="font-size:16px">Estado</div></th>
                            
                          <th width="60"><div align="center" style="font-size:16px">Reserve</div></th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                      <?php
									  
                                    $query = mysql_query("select * from habitaciones order by id_categoria ASC ") or die(mysql_error());
																					
															
                                    while ($row = mysql_fetch_array($query)) {
                                        $id = $row['id_habitacion'];
										$catid = $row['id_categoria'];
										$price = $row['precio'];
										
										$cat = mysql_query("select * from categoria where id_categoria = '$catid'") or die(mysql_error());

										while ($cat_row = mysql_fetch_array($cat)){
									
										
                                        ?>
                                 
                                    

                                        <tr>
                                        	<td width="60"><a href="imagenes/personal.jpg" class="image-zoom" rel="prettyPhoto[gallery]" title="aire acondicionado"><img style="margin-top:30px;" class="img-rounded thumbnail" src="<?php echo $row['ubicacion']?>" height="50" width="50"></a></td>
                                            
                                            <td><div align="center" style="margin-top:20px"><?php if($row['estado']=='reservado'){ echo '-&deg;-';}else{echo $row['numero'];;}?></div></td>
                                             
                                    		<td><div align="center" style="margin-top:20px"><?php if($row['estado']=='reservado'){ echo '-&deg;-';}else{ switch($price){
												
										case 25:
											
											echo 'S/. 25.00 incl. impuestos y pagos';
											
											break;		
												
												
										case 30;		
										
											echo 'S/. 30.00 incl. impuestos y pagos';	
												
												break;
												
										case 35;		
										
											echo 'S/. 35.00 incl. impuestos y pagos';	
												
												break;
												
										case 40;		
										
											echo 'S/. 40.00 incl. impuestos y pagos';	
												
												break;
												
												default:
												
												}
											
											
											}?></div></td>
											

                                       

                                            
                                               
                                            
                                            <td><div align="center" style="margin-top:20px"><?php if($row['estado']=='reservado'){ echo '-&deg;-';}else{echo $cat_row['nombre_categoria'];}?></div></td> 
 											<td><div align="center" style="margin-top:20px"><?php if($row['estado']=='reservado'){ echo '-&deg;-';}else{switch ($catid){
										
										case 1:
										
											echo '<div align="center" style="margin-top:20px; color: rgba(0,0,0,1); font-size:16px;">S/. 25.00</div><div align="center" style="font-size:10px;">POR UNA NOCHE</div><div align="center" style="font-size:12px; color:rgba(0,204,0,1)">¡Pague solo el 10% para reservar!</div>';
										
										break;
												
										case 2:
											echo '<div align="center" style="margin-top:20px; color: rgba(0,0,0,1); font-size:16px;">S/. 30.00</div><div align="center" style="font-size:10px;">POR UNA NOCHE</div><div align="center" style="font-size:12px; color:rgba(0,204,0,1)">¡Pague solo el 10% para reservar!</div>';
											
										break;	
										
										case 3:
											echo '<div align="center" style="margin-top:20px; color: rgba(0,0,0,1); font-size:16px;">S/. 35.00</div><div align="center" style="font-size:10px;">POR UNA NOCHE</div><div align="center" style="font-size:12px; color:rgba(0,204,0,1)">¡Pague solo el 10% para reservar!</div>';
											
										break;
										
										case 4:
											echo '<div align="center" style="margin-top:20px; color: rgba(0,0,0,1); font-size:16px;">S/. 40.00</div><div align="center" style="font-size:10px;">POR UNA NOCHE</div><div align="center" style="font-size:12px; color:rgba(0,204,0,1)">¡Pague solo el 10% para reservar!</div>';
											
										break;			
												
										default:		
												
												
												}
										
											
											}?></div></td> 
                                                
                                            
                                            <td><div align="center" style="margin-top:20px"><strong>
											<?php if ($row['estado']=='disponible'){
												
												$disabled = "";
												
												echo 'Disponible';}
																								
													elseif($row['estado']=='reservado'){
														
															echo 'Reservado';
													
													
															$disabled = 'disabled="disabled"';
														
														}
														
													else{
													
													echo $row['estado'];
													
													
													$disabled = 'disabled="disabled"';
													
													}
													
												
												?></strong></div></td>						
                                           
             
                                                   <td><div align="center" style="margin-top:30px"><input style="margin-top:-2px;" name="selector[]" type="checkbox" value="<?php echo $id; ?>"<?php echo $disabled?>></div></td>
											
                                  </tr>
                                  
                                  
                                                                     
                        		<?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
 
           
           
                        <hr>
 

    </div> <!-- /container -->
    
    
   
    <!-- Le javascript
    ================================================== -->



  </body>
  
  
</html>
