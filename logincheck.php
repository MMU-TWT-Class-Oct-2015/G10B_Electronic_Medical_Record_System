<?php
//$_SESSION['name']= $_POST['uname'];
session_start();
$host="localhost";
$db_name="emr_system";
$table_name="members";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$uname=$_POST['uname'];
$upassword=$_POST['upassword'];
$utype=$_POST['utype'];

$uname = stripslashes($uname);
$upassword = stripslashes($upassword);
$uname = mysql_real_escape_string($uname);
$upassword = mysql_real_escape_string($upassword);
$sql="SELECT * FROM $table_name WHERE username='$uname' and password='$upassword' and type='$utype';";
$result=mysql_query($sql);

$rowcount=mysql_num_rows($result);

if($rowcount==1){
  $_SESSION["name"]= $uname;
  //session_register("uname");
  //session_register("upassword");
  header("location:successful.php");
  //echo "LOGIN SUCCESS";
}
else{
  echo "Wrong Username or Password";
}
 ?>
