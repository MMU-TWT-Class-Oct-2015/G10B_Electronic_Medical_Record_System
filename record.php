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
    <link rel="stylesheet" href="record.css" type="text/css"/>
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
        <form action="add_record_profile.php" method="post">
          <fieldset style="width:90%; height:auto; margin-left:30px;">
          <legend id="legend">New Patient Record</legend>
          <table id="recordsize">
            <tr>
              <td><input class="textbox" type="text" class="textbox" name="patientid" id="pid" placeholder="Patient ID" required/></td>
            </tr>
            <tr>
              <td><textarea class="textbox" name="treatment"  id="treatment" rows="4" cols="50" maxlength="500" placeholder="Treatment" required></textarea></td>
            </tr>
            <tr>
                <td><textarea  class="textbox"name="diagnosis" id="diagnosis" rows="4" cols="50" maxlength="500" placeholder="Diagnosis" required></textarea></td>
            </tr>
            <tr>
              <td><textarea class="textbox" name="symptoms" id="symptoms" rows="4" cols="50" maxlength="500" placeholder="Patient Symptoms" required></textarea></td>
            </tr>
          </table>
        </fieldset>
        <table align="center">
          <tr>
            <td>
             <input style="background-color:#00FF40;" id="button" type="submit" name="submitbtn"  value="Submit"/>&nbsp &nbsp &nbsp &nbsp
             <input style="background-color:#FA5858;" id="button" type="reset" name="resetbtn"  value="Reset"/>
            </td>
          </tr>
      </table>
        </form>
    </div>

</body>
<footer>
  <p id="foot">Copyright 2016.All right are reserved. Electronic Medical Record System.<img id="copy" src="image/copyright.png">
  <br>Contact information: <a class="mail" href="mailto:EMR-sup@assignment.com">
  EMR-sup@assignment.com</a></p>
</footer>
</html>
