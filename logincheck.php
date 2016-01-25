<?php
ob_start();
$host="localhost";
//$myname="";
//$mypassword="";
$db_name="emr_system";
$table_name="members";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$uname=$_POST['uname'];
$upassword=$_POST['upassword'];

$uname = stripslashes($uname);
$upassword = stripslashes($upassword);
$uname = mysql_real_escape_string($uname);
$upassword = mysql_real_escape_string($upassword);
$sql="SELECT * FROM $table_name WHERE username='$uname' and password='$upassword';";
$result=mysql_query($sql);

$rowcount=mysql_num_rows($result);

if($rowcount==1){
  //session_register("uname");
  //session_register("upassword");
  //header("location:successful.php");
  echo "LOGIN SUCCESS";
}
else{
  echo "Wrong Username or Password";
}
ob_end_flush();
 ?>
