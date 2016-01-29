<?php

$pname=$_POST['pname'];
$ic=$_POST['ic'];
$age=$_POST['age'];
$phonenumber=$_POST['phonenumber'];
$birthday=$_POST['birthday'];
$race=$_POST['race'];
$gender=$_POST['gender'];
$religion=$_POST['religion'];
$address=$_POST['address'];
$insurance=$_POST['insurance'];
$symptoms=$_POST['symptoms'];
$diagnosis=$_POST['diagnosis'];
$treatment=$_POST['treatment'];



if (!$connect = mysql_connect("localhost", "root", "")) {
  die(mysql_error());
}

if (!mysql_select_db("TWT_09_01", $connect)){
  $sql = "CREATE DATABASE emr_system;";
  mysql_query($sql) or die(mysql_error());
  mysql_select_db("emr_system", $connect);


extract($_POST);
$sql="INSERT INTO 'patient' ('userId','patientName','patientPhoneNo','patientIc','patientAddress','Dob','recordId','patientGender','race','religion') VALUES ('','$pname,'$phonenumber','$ic','$address','$birthday','','male','$race','$religion');";
mysql_query($sql) or die(mysql_error());
mysql_close($connect);



}
 ?>
