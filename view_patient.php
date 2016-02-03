<?php

$host="localhost";
$db_name="emr_system";
$table_name="patient";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View Patient</title>
    <link href="view_patient.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="title">
      <h1>Eletronic Medical Record System<img style="width:50px; height:50px;" src="image/title.ico"></h1>
    </div>

    <div id="navigation">
    <ul>
     <li><a href="#home">Home</a></li>
     <li><a href="patient.php">Add new patient</a></li>
     <li><a href="#delete">Delete patient</a></li>
     <li><a href="#update">Update patient details</a></li>
     <li><a href="index.php">Sign out</a></li>
    </ul>
  </div>
<div class="viewtable">
  <?php


$query = "SELECT patientId, patientName,patientPhoneNo,patientIc, patient,AddresspatientGender FROM patient order by patientId";
$result = mysql_query($query) or die(mysql_error());


if (mysql_num_rows($result) > 0) {
   echo "<table>
   <tr>
   <th>ID</th>
   <th>Name</th>
   <th>Gender</th>
   </tr>";

   while($row = mysql_fetch_assoc($result)) {
       echo "<tr><td>" . $row["patientId"]. "</td><td>" . $row["patientName"]. "</td><td> " . $row["patientGender"]. "</td></tr>";
   }
   echo "</table>";
} else {
   echo "No patient record!";
}


?>
</div>


  <div id="footer">
    <p id="content">Copyright 2016.All right are reserved.<br>Electronic Medical Record System.<img id="image" src="image/copyright.png"></p>
  </div>

  </body>
</html>
