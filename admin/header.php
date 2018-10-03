<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Kingsfields</title>
        <link href="images/icon.png" rel="icon" type="image">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
        <?php include('connect.php'); ?>
    </head>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
    <script type='text/javascript' language='javascript' src='js/ndhui.js'></script>



    <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" /> 

    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
        });
    </script>  


    <script type="application/javascript" src="js/awesomechart.js"> </script>


    <script language="javascript" type="text/javascript">
        /* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
        <!-- Begin
        var timerID = null;
        var timerRunning = false;
        function stopclock (){
            if(timerRunning)
                clearTimeout(timerID);
            timerRunning = false;
        }
        function showtime () {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds()
            var timeValue = "" + ((hours >12) ? hours -12 :hours)
            if (timeValue == "0") timeValue = 12;
            timeValue += ((minutes < 10) ? ":0" : ":") + minutes
            timeValue += ((seconds < 10) ? ":0" : ":") + seconds
            timeValue += (hours >= 12) ? " P.M." : " A.M."
            document.clock.face.value = timeValue;
            timerID = setTimeout("showtime()",1000);
            timerRunning = true;
        }
        function startclock() {
            stopclock();
            showtime();
        }
        window.onload=startclock;
        // End -->
    </SCRIPT>	



<script type="text/javascript">
           $(document).ready(function(){
 
               
               $("#country").change(function(){
                     var country=$("#country").val();
                     $.ajax({
                        type:"post",
                        url:"getdata.php",
                        data:"country="+country,
                        success:function(data){
                              $("#city").html(data);
                        }
                     });
               });
           });
      </script>
      
      <script type="text/javascript">
           $(document).ready(function(){
 
               
               $("#country").change(function(){
                     var country=$("#country").val();
                     $.ajax({
                        type:"post",
                        url:"data.php",
                        data:"country="+country,
                        success:function(data){
                              $("#city1").html(data);
                        }
                     });
               });
           });
      </script>

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>