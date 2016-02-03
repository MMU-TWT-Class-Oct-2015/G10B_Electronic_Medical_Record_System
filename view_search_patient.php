<?php
$host="localhost";
$db_name="emr_system";
$table_name="patient";

$conn = mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


$search = $_POST['search'];



$sql = "SELECT * FROM patient WHERE patientId='$search' ";

   $retrieve = mysql_query( $sql, $conn );

   if(! $retrieve ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysql_fetch_array($retrieve, MYSQL_ASSOC)) {
echo  $userId= $row['userId'];
  $patientId= $row['patientId'];
  $patientName= $row['patientName'];
  $patientPhoneNo= $row['patientPhoneNo'];
  $patientIc= $row['patientIc'];
  $patientAddress= $row['patientAddress'];
  $Dob= $row['Dob'];
  $patientGender= $row['patientGender'];
  $race= $row['race'];
  $religion= $row['religion'];
  $insurance= $row['insurance'];
   }

 ?>
