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
$sql="SELECT doctor.doctorId,doctor.doctorName,doctor.speciality FROM doctor INNER JOIN members ON doctor.doctorId=members.userId WHERE username='$cname'";
$inresult=mysql_query($sql);

if( mysql_num_rows( $inresult )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysql_fetch_assoc( $inresult ) ){
          $id=$row['doctorId'];
          $drname=$row['doctorName'];
          $drspecial=$row['speciality'];
        }
      }
?>

<html>
  <head>
    <link rel="stylesheet" href="main1.css" type="text/css"/>
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
              <a href="#">View Record</a>
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
              <a href="#">View Profile</a>
              <a href="#">Update Profile</a>
              <a href="#">Delete Profile</a>
            </div>
          </div>
        </li>

      <ul style="float:right;list-style-type:none;">
        <li><a1>Electronic Medical Record System</a1></li>

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
        <li>
            <a href="logout.php"> Logout  </a>
      </li>
      </ul>
    </ul>

    <div class="tprofile">
      <table class = "profile">
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
    </div>

<!--EDIT YOUR CODE HERE ------------------------------------------>
    <div class="conform">
      <div class="para">
        <h1>Brief Information:</h1>
        <p>This is an Electronic Medical Record System. This medical record is a
          confidential record that is kept for each patient by a healthcare
          professional or organization. It contains the patient's personal details
           (such as name, address, date of birth), a summary of the patient's
           medical history, and documentation of each event, including symptoms,
           diagnosis, treatment and outcome.

           <br><br>
           This project is done by 4 person as named below:
           <ol>
             <li>Kelvin</li>
             <li>Tony</li>
             <li>Chong</li>
             <li>Boon</li>
           </ol>
        </p>
      </div>
    </div>

</body>
</html>
