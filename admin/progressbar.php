<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Kingsfields Express Inn</title>

    <script type='text/javascript' src="js/jquery.js"></script>

	<link rel="shortcut icon" href="ico/icon.png">
    <script type="text/javascript" src="js/bootstrap-progressbar.js"></script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-progressbar.css">

 <style type="text/css">
 		body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      	}
        .progress .bar.six-sec-ease-in-out {
            -webkit-transition: width 6s ease-in-out;
            -moz-transition: width 6s ease-in-out;
            -ms-transition: width 6s ease-in-out;
            -o-transition: width 6s ease-in-out;
            transition: width 6s ease-in-out;
        }
        .progress.vertical .bar.six-sec-ease-in-out {
            -webkit-transition: height 6s ease-in-out;
            -moz-transition: height 6s ease-in-out;
            -ms-transition: height 6s ease-in-out;
            -o-transition: height 6s ease-in-out;
            transition: height 6s ease-in-out;
        }
        .progress.wide {
            width: 10px;
        }
        .vertical-progressbar-span {
            height: 100px;
        }
    </style>
    
    

    <script>
        $(document).ready(function() {
		
               
                $('.progress .bar.text-filled-1').progressbar({
                    display_text: 1,
					         refresh_speed: 200,
                   transition_delay: 500,
             
            });
            
            });
   
    </script>
    
    <script type="text/javascript">
	$(document).ready(function()
		{
		 var delay = 2000;
		setTimeout(function(){ window.location = 'admin.php';}, delay);  
    });
	
	

	</script>
    
<?php include('session.php'); ?>
<?php include('connect.php');?>

<?php mysql_query("INSERT INTO tb_history(user_id,action,date)VALUES('$session_id', 'Login', NOW())")or die(mysql_error());?>
    
</head> 
<body>

  
			<div style="margin-top:200px;" class="modal">	
            	<div class="modal-body">
                		<h4>Processing......</h4>
                		<div id="prog" class="progress progress-info progress-striped">
               <div class="bar text-filled-1" data-amount-part="1337" data-amount-total="9000" data-percentage="100"><?php include('user_name.php'); ?></div>
                </div>
                </div>
           	</div>     
		
		
   
</body>