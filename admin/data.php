<?php

mysql_select_db('kingsfields_database', mysql_connect("localhost","root","")) or die (mysql_error());	
 
 $country=$_POST["country"];
  $result=mysql_query("select name,prices FROM tb_price where category_id='$country' ");
  while($city=mysql_fetch_array($result)){
    echo"<option value=$city[prices]>Price $city[name] $city[prices]</option>";
 
  }
?>