<?php 
	session_start();
	require('conexion.php');
	include('header.php');
	include('admin/connect.php');
	include('conexion1.php');

?>
<?php include('header.php'); ?>


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
	
	


   
    <link href="admin/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
     
      
    <![endif]-->
    
    
    
    <script type="text/javascript" src="js/datepicker.js"></script>
	<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
        
		<script type="text/javascript">
		//<![CDATA[

		/*
				A "Reservation Date" example using two datePickers
				--------------------------------------------------

				* Functionality

				1. When the page loads:
						- We clear the value of the two inputs (to clear any values cached by the browser)
						- We set an "onchange" event handler on the startDate input to call the setReservationDates function
				2. When a start date is selected
						- We set the low range of the endDate datePicker to be the start date the user has just selected
						- If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

				* Caveats (aren't there always)

				- This demo has been written for dates that have NOT been split across three inputs

		*/

		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				// Clear any old values from the inputs (that might be cached by the browser after a page reload)
				document.getElementById("sd").value = "";
				document.getElementById("ed").value = "";

				// Add the onchange event handler to the start date input
				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		var initAttempts = 0;

		function setReservationDates(e) {
				// Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
				// until they become available (a maximum of ten times in case something has gone horribly wrong)

				try {
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				// Check the value of the input is a date of the correct format
				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

				// If the input's value cannot be parsed as a valid date then return
				if(dt == 0) return;

				// At this stage we have a valid YYYYMMDD date

				// Grab the value set within the endDate input and parse it using the dateFormat method
				// N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				// Set the low range of the second datePicker to be the date parsed from the first
				ed.setRangeLow( dt );
				
				// If theres a value already present within the end date input and it's smaller than the start date
				// then clear the end date value
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				// Remove the onchange event handler set within the function initialiseInputs
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

		//]]>
		</script>
		<!--sa error trapping-->
		<script type="text/javascript">
		function validateForm()
		{
		var x=document.forms["index"]["start"].value;
		if (x==null || x=="")
		  {
		  alert("Debe ingresar su fecha de entrada (haga clic en el ícono del calendario)");
		  return false;
		  }
		var y=document.forms["index"]["end"].value;
		if (y==null || y=="")
		  {
		  alert("Debe ingresar su fecha de salida (haga clic en el ícono del calendario)");
		  return false;
		  }
		}
		</script>
		<!--sa minus date-->
		<script type="text/javascript">
			// Error checking kept to a minimum for brevity
		 
			function setDifference(frm) {
			var dtElem1 = frm.elements['start'];
			var dtElem2 = frm.elements['end'];
			var resultElem = frm.elements['result'];
			 
		// Return if no such element exists
			if(!dtElem1 || !dtElem2 || !resultElem) {
		return;
			}
			 
			//assuming that the delimiter for dt time picker is a '/'.
			var x = dtElem1.value;
			var y = dtElem2.value;
			var arr1 = x.split('/');
			var arr2 = y.split('/');
			 
		// If any problem with input exists, return with an error msg
		if(!arr1 || !arr2 || arr1.length != 3 || arr2.length != 3) {
		resultElem.value = "Invalid Input";
		return;
			}
			 
		var dt1 = new Date();
		dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
		var dt2 = new Date();
		dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

		resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
		}
		</script>
        
        <script>
		function goBack()
 		 {
 		 window.history.back()
  			}
  
		</script>
		
<script type="text/javascript">
function validateForms()
{

var a=document.forms["cancelpage"]["confirmation"].value;
if ((a==null || a==""))
  {
  alert("Ingrese su código de confirmación para cancelar su reserva !!!");
  return false;
  }
 
if (document.cancelpage.cancelpolicy.checked == false)
{
alert ('Por favor, acepte la política de cancelación de este hotel!');
return false;
}
else
{
return true;
}
}
</script>

<script>

function goBack()
  {
  window.history.back()
  }
  
</script>
        



 
  </head>

  <body>

<!--Navegación-->

<div class="contenido3">
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
            <li><a href="disponibles.php">Ver Disponibles</a></li>
            <li><a href="#">Reservaciones</a></li>
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
  
  
    <div class="container-narrow">

   	<button style="margin-bottom:-80px;" class="btn" onClick="goBack()"><i class="icon-hand-left"></i> Atras</button>
      <hr>

      <div class="jumbotron">
        <h1>Fecha de Reservacion</h1>
	
    
      
      				<form method="post" action="pruebas.php" name="index" onSubmit="return validateForm()">
				                    
					  <span style="margin-right: 70px; color:FFF(0,0,0,1);">Fecha Inicio:::<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" placeholder="Llegada" name="start" id="sd" value="" maxlength="10" readonly style="width: 210px; margin-left: 15px; border: 1px double #CCCCCC; padding:20px 10px;"/></span><br>
					  <span style="margin-right: 70px; color:FFF(0,0,0,1);">Fecha Final::<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" placeholder="Salida" name="end" id="ed" value="" maxlength="10" readonly style="width: 210px; margin-left: 23px; border: 1px double #CCCCCC; padding:20px 10px;" /></span><br>
						<input type="hidden" name="result" id="result" /><br>
                        
                    
        <div align="center"> 	
<button type="submit" style="margin-right: 30px;" onClick="setDifference(this.form);" class="btn btn-info"><i class="icon-check"></i> VERIFICAR DISPONIBILIDAD</button>
       </div>
                        
						
					  </form>
    

      </div>

    </div> <!-- /container -->

   

  </body>
</html>
