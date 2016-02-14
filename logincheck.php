<?php

session_start();
$host="localhost";
$db_name="emr_system";
$table_name="members";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$uname=$_POST['uname'];
$upassword=$_POST['upassword'];
$utype=$_POST['utype'];
//HEREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//$upassword = sha1($upassword);
if($uname == "" || $upassword == "" || $utype == ""){
  echo "<script type='text/javascript'>
            window.alert('Please enter your username and password!');
            window.location.href = 'main.php';
        </script>";
}
else{

  $uname = stripslashes($uname);
  $upassword = stripslashes($upassword);
  $uname = mysql_real_escape_string($uname);
  $upassword = mysql_real_escape_string($upassword);
  $sql="SELECT * FROM $table_name WHERE username='$uname' and password='$upassword' and type='$utype';";
  $result=mysql_query($sql);

  $rowcount=mysql_num_rows($result);

  if($rowcount==1){
    $_SESSION["name"]= $uname;
    header("location:successful.php");
  }
  else{
    echo "<script type='text/javascript'>
              window.alert('Wrong username or password!');
              window.location.href = 'main.php';
          </script>";
  }
}
 ?>
