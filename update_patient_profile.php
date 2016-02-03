<?php
$host="localhost";
$db_name="emr_system";
$table_name="patient";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$updatebtn=$_POST['updatebtn'];
$deletebtn=$_POST['deletebtn'];

$pid=$_POST['pid'];
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

if($updatebtn == "Update"){
$sql = "UPDATE patient SET userId = '1', patientId = '$pid', patientName = '$pname', patientPhoneNo = '$phonenumber',
patientIc = '$ic', patientAddress = '$address', Dob = '$birthday', patientGender ='$gender',  race = '$race', religion = '$religion', insurance = '$insurance', age = '$age' WHERE patientId = $pid";
mysql_query($sql);
header("location:view_patient1.php");
exit();
}elseif($deletebtn == "Delete"){
$sql = "DELETE FROM patient where patientId =$pid";
mysql_query($sql);
header("location:view_patient1.php");
exit();
}
 ?>
