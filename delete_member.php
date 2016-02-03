<?php

session_start();
$host="localhost";
$db_name="emr_system";
$table_name="members";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$upload_dir='image/';
$target_file =$upload_dir . basename($_FILES['fileToUpload']['name']);

        $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
        $name = $_FILES["fileToUpload"]["name"];
        move_uploaded_file($tmp_name, "$upload_dir/$name");


$editbtn=$_POST['editbtn'];
$deletebtn=$_POST['deletebtn'];

$gid =$_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];
$ic = $_POST['ic'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$doctorname = $_POST['drname'];
$specility = $_POST['special'];
$picture = $target_file;



  if($editbtn == "Edit"){
  $sql = "UPDATE members SET userId = '$gid', username = '$username', password = '$password', type = '$type',
  ic = '$ic', phoneNo = '$phonenumber', email = '$email', gender ='$gender',  doctorName = '$doctorname', speciality = '$specility',
  picture = '$picture' WHERE userId = '$gid'";
  mysql_query($sql);
  header("location:view_user.php");
  exit();
  }elseif($deletebtn == "Delete"){
  $sql = "DELETE FROM members where userId = $gid";
  mysql_query($sql);
  header("location:view_user.php");
  exit();
  }
 ?>
