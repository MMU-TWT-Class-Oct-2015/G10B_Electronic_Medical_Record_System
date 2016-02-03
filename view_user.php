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
    <link rel="stylesheet" href="view_user.css" type="text/css"/>
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
              <a href="view_record.php">View Update/ Delete Record</a>

            </div>
          </div>
        </li>

        <li>
          <div class="dropdown">
            <a href="#" class="dropbtn">Patient Profile</a>
            <div class="dropdown-content">
              <a href="patient.php">Add new Profile</a>
              <a href="view_patient1.php">View/ Update/ Delete Profile</a>

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
          <td><b>
            Speciality:</b><i> <?php echo $drspecial;?></i>
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
      $query = "SELECT doctorName,ic,gender,phoneNo,email,speciality,picture FROM members order by doctorName";

      $result = mysql_query($query) or die(mysql_error());


      if (mysql_num_rows($result) > 0) {
         echo "<div class=\"scrollit\"><table class=\"table-style-one\">
         <tr>
         <th>No</th>
         <th>Doctor Name</th>
         <th>IC No</th>
         <th>Gender</th>
         <th>Phone No.</th>
         <th>Email</th>
         <th>Speciality</th>
         <th>Profile Picture</th>


         </tr>";

         while($row1 = mysql_fetch_assoc($result)) {

             echo "<tr><td>" .++$i."</td><td>" . $row1["doctorName"]. "</td><td> " .
             $row1["ic"]. "</td><td> " . $row1["gender"]. "</td><td> " . $row1["phoneNo"].
              "</td><td> " . $row1["email"]. "</td><td> " . $row1["speciality"].
             "</td><td><img width='145' height='150px' src=" . $row1["picture"]. "></td></tr>";
         }
         echo "</table></div>";
      } else {
         echo "No record!";
      }


      ?>
      </div>
    </div>

</body>
<footer>
  <p id="foot">Copyright 2016.All right are reserved. Electronic Medical Record System.<img id="copy" src="image/copyright.png">
  <br>Contact information: <a class="mail" href="mailto:EMR-sup@assignment.com">
  EMR-sup@assignment.com</a></p>
</footer>
</html>
