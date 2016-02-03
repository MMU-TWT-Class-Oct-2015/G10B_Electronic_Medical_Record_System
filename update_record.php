<?php
session_start();
if($_SESSION["name"] == ""){
  header("location:main.php");
}
$host="localhost";
$db_name="emr_system";


mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$cname=$_SESSION["name"];
//$sql="SELECT * FROM members WHERE username='$cname'";
$sql="SELECT userId, doctorName, speciality FROM members WHERE username='$cname'";
$inresult=mysql_query($sql);

if( mysql_num_rows( $inresult )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysql_fetch_assoc( $inresult ) ){
          $id=$row['userId'];
          $drname=$row['doctorName'];
          $drspecial=$row['speciality'];
        }
      }

$updatebtn=$_POST['updatebtn'];
$deletebtn=$_POST['deletebtn'];

$recordId=$_POST['recordId'];
$patientId= $_POST['patientId'];
$treatment= $_POST['treatment'];
$diagnosis= $_POST['diagnosis'];
$symptom= $_POST['symptom'];



if($updatebtn == "Update"){
$sql = "UPDATE record SET treatment='$treatment', diagnosis='$diagnosis', symptom='$symptom'  WHERE recordId='$recordId'";
mysql_query($sql);
header("location:view_record.php");
exit();
}elseif($deletebtn == "Delete"){
$sql = "DELETE FROM record where recordId =$recordId";
mysql_query($sql);
header("location:view_record.php");
exit();
}
 ?>
