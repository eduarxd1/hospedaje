<?php

mysql_select_db('kingsfields_database', mysql_connect("localhost","root","")) or die (mysql_error());	
 
 $country=$_POST["country"];
 $result=mysql_query("select category_id,name,price,roomID FROM tb_rooms where category_id='$country' and status = 'Available' ");
  while($city=mysql_fetch_array($result)){
    echo"<option value=$city[roomID]>Room $city[name]</option>";
 
  }
?>