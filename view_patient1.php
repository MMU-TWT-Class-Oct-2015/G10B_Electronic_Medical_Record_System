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
?>

<html>

  <head>
    <link rel="stylesheet" href="view_patient.css" type="text/css"/>
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
              <a href="view_record.php">View Record</a>
              <a href="#">Update Record</a>
              <a href="#">Delete Record</a>
            </div>
          </div>
        </li>

        <li>
          <div class="dropdown">
            <a href="#" class="dropbtn">Patient Profile</a>
            <div class="dropdown-content">
              <a href="patient.php">Add new Profile</a>
              <a href="view_patient1.php">View Profile</a>
              <a href="#">Update Profile</a>
              <a href="#">Delete Profile</a>
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
                      <a href="#">View User</a>
                      <a href="#">Update User</a>
                      <a href="#">Delete User</a>
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
            <img src="image\profile1.png" alt="Profile Picture" style="width:200px;height:220px;">
          </td>
        </tr>
        <tr>
          <td>
            Doctor ID: <?php echo $id;?>
          </td>
        </tr>

        <tr>
          <td>
            Name: <?php echo $drname;?>
          </td>
        </tr>

        <tr>
          <td>
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
        <?php

        $i=0;
      $query = "SELECT patientName,patientPhoneNo,patientIc, patientAddress,Dob,patientGender,race,religion,insurance FROM patient order by patientId";
      $result = mysql_query($query) or die(mysql_error());


      if (mysql_num_rows($result) > 0) {
         echo "<div class=\"scrollit\"><table class=\"table-style-one\">
         <tr>
         <th>No</th>
         <th>Name</th>
         <th>Phone No</th>
         <th>Patient IC</th>
         <th>Address</th>
         <th>Day of birthday</th>
         <th>Gender</th>
         <th>Race</th>
         <th>Religion</th>
         <th>Insurance</th>

         </tr>";

         while($row = mysql_fetch_assoc($result)) {
             echo "<tr><td>" .++$i."</td><td>" . $row["patientName"]. "</td><td> " . $row["patientPhoneNo"]. "</td><td> " . $row["patientIc"]. "</td><td> " . $row["patientAddress"]. "</td><td> " . $row["Dob"]. "</td><td> " . $row["patientGender"]. "</td><td> " . $row["race"]. "</td><td> " . $row["religion"]. "</td><td> " . $row["insurance"]. "</td></tr>";
         }
         echo "</table></div>";
      } else {
         echo "No patient record!";
      }


      ?>
      </div>
    </div>

</body>
</html>
