<?php
include('connect.php');

$get_id=$_GET['id'];

                            if (isset($_POST['roomupdate'])) {

                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $category = $_POST['category'];
                               
                                $price = $_POST['price'];
                               

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);
//
                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];

                            	mysql_query("update tb_rooms set name='$name',description='$description',category_id='$category',price='$price',location='$location' where roomID='$get_id'") or die(mysql_query());
                                header('location:progressbar.php');
                            }
                            ?>