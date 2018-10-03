<?php
include('connect.php');

$get_id=$_GET['id'];

                            if (isset($_POST['update'])) {
	
                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $un = $_POST['un'];
                                $p = md5($_POST['p']);
								$cn = $_POST['cn'];

                                mysql_query("update tb_user set firstname='$fn', lastname='$ln' , username='$un' , password='$p', contact='$cn' where user_id='$get_id'") or die(mysql_error());

                                header('location:progressbar.php');
                            }
                            ?>