<?php
session_start();

if($_SESSION["name"] == ""){
  header("location:main.php");
}
$host="localhost";
$db_name="emr_system";
$table_name="members";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$cname=$_SESSION["name"];
//$sql="SELECT * FROM members WHERE username='$cname'";
$sql="SELECT userId, doctorName, speciality,picture FROM members WHERE username='$cname'";
$inresult=mysql_query($sql);

if( mysql_num_rows( $inresult )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysql_fetch_assoc( $inresult ) ){
          $id=$row['userId'];
          $drname=$row['doctorName'];
          $drspecial=$row['speciality'];
          $ppicture=$row['picture'];
        }
      }
?>

<html>

  <head>
    <link rel="stylesheet" href="view_record.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMR MENU</title>
  </head>

<body>
    <ul>
        <li><a1>Welcome <?php echo $_SESSION["name"];?></a1></li>
        <li><a href="main1.php">Home</a></li>
        <li>

          <div class="dropdown">
            <a href="#" class="dropbtn">Patient Record</a>
            <div class="dropdown-content">
              <a href="record.php">Add new Record</a>
              <a href="view_record.php">View/ Update/ Delete Record</a>
            <!--  <a href="#">Update Record</a>
              <a href="#">Delete Record</a>-->
            </div>
          </div>
        </li>

        <li>
          <div class="dropdown">
            <a href="#" class="dropbtn">Patient Profile</a>
            <div class="dropdown-content">
              <a href="patient.php">Add new Profile</a>
              <a href="view_patient1.php">View/ Update/ Delete Profile</a>
              <!--<a href="#">Update Profile</a>
              <a href="#">Delete Profile</a>-->
            </div>
          </div>
        </li>

      <ul style="float:right;list-style-type:none;">
        <li><a1><img src="image\iconflip.png" alt="Profile Picture" style="width:14px;height:14px;">
        Electronic Medical Record System
        <img src="image\icon.png" alt="Profile Picture" style="width:14px;height:14px;"></a1></li>

        <?php
          if($_SESSION["name"] === "admin") {?>
                <li>
                  <div class="dropdown">
                    <a href="#" class="dropbtn">Human Resource System</a>
                    <div class="dropdown-content">
                      <a href="hr.php">Add new User</a>
                      <a href="view_user.php">View/ Update/ Delete User</a>
                      <!--<a href="#">Update User</a>
                      <a href="#">Delete User</a>-->
                    </div>
                  </div>
                </li>
        <?php } ?>
        <li>
            <a href="logout.php"> Logout  </a>
      </li>
      </ul>
    </ul>

    <div class="tprofile">
      <table class = "profile">
        <tr>
          <td>
            <?php echo "<img width='145' height='150px' src=" .$ppicture. ">" ?>
          </td>
        </tr>
        <tr>
          <td><b>
            Doctor ID:</b><i> <?php echo $id;?></i>
          </td>
        </tr>

        <tr>
          <td><b>
            Name:</b><i> <?php echo $drname;?></i>
          </td>
        </tr>

        <tr>
          <td >
            Speciality: <?php echo $drspecial;?>

          </td>
        </tr>
      </table>

      <!--patient assigned list-->
        <fieldset class="patfield">
        <legend id="legend">Assigned Patient: </legend>
        <table class = "patlist">
          <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
              </tr>
            </thead>
        </table>
        <div class="scroll">
          <table class = "patdata">
            <?php
              $listsql="SELECT patientId, patientName FROM `patient` WHERE userId= '$id'";
              $listresult=mysql_query($listsql);

             while($listrow = mysql_fetch_assoc($listresult)){
                echo "<tr><td>". $listrow['patientId']. "</td><td>". $listrow['patientName']. "</td></tr>";
              }
            ?>
          </table>
        </div>
        </fieldset>

    </div>


<!--EDIT YOUR CODE HERE ------------------------------------------>
    <div class="conform">

      <div class="viewtable">
          <form action="view_search_record.php" method="post">
            <br>
            <input type="text" id="search" name="search">
           <select id="searchby" name="searchby">
             <option value="">Search By</option>
             <option value="recordId">Record Id</option>
             <input style="background-color:#00FF40;" id="button" type="submit" name="submitbtn"  value="Search"/>
        <?php

        $i=0;
      $query = "SELECT recordId,patientName,doctorName,treatment,diagnosis,symptom FROM patient
      INNER JOIN record  ON patient.patientId=record.patientId
      INNER JOIN members ON patient.userId=members.userId";
      $result = mysql_query($query) or die(mysql_error());


      if (mysql_num_rows($result) > 0) {
         echo "<div class=\"scrollit\"><table class=\"table-style-one\">
         <tr>
         <th>No</th>
         <th>Record Id</th>
         <th>Patient Name</th>
         <th>Handled by</th>
         <th>Treatment</th>
         <th>Diagnosis</th>
         <th>Symptom</th>


         </tr>";

         while($row = mysql_fetch_assoc($result)) {
             echo "<tr><td>" .++$i. "</td><td>". $row["recordId"]. "</td><td>" . $row["patientName"]. "</td><td> " . $row["doctorName"]. "</td><td> " . $row["treatment"]. "</td><td> " . $row["diagnosis"]. "</td><td> " . $row["symptom"]. "</td></tr>";
         }
         echo "</table></div>";
      } else {
         echo "No record!";
      }


      ?>

     </form>
      </div>
    </div>

</body>

<footer>
  <p id="foot">Copyright 2016.All right are reserved. Electronic Medical Record System.<img id="copy" src="image/copyright.png">
  <br>Contact information: <a class="mail" href="mailto:EMR-sup@assignment.com">
  EMR-sup@assignment.com</a></p>
</footer>

</html>
