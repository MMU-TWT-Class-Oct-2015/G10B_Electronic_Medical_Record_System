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
              <a href="#">Add new Profile</a>
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
              <a href="#">Add new User</a>
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
      <div id="table">
      <fieldset style="width:90%; height:320px; margin-left:30px;">
      <table style="float:left" >
      <form action="add_patient_profile.php" method="post">
      <legend id="legend">New Patient Profile</legend>

      <tr>
        <td><input type="text" class="textbox" name="pname" id="ppname" placeholder="Name" required/></td>

      </tr>
<tr></tr><tr></tr>
      <tr>
        <td><input type="text" name="age"class="textbox" id="age" placeholder="Age" required/></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
        <td><input type="text" class="textbox" name="phonenumber" id="phonenumber" placeholder="Contact Number" required/></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
        <td>
          <select id="race" name="race" class="textbox" required>
            <option value="" selected>Race:</option>
            <option value="cina">Cina</option>
            <option value="malay">Malay</option>
            <option value="india">Indian</option>
            <option value="others">others</option>
          </select>
        </td>
      </tr>
<tr></tr><tr></tr>
      <tr>
        <td><input type="text" class="textbox" name="religion" id="religion" placeholder="Religion" required/></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
        <td><input type="text" class="textbox" name="insurance" id="insurance" placeholder="Insurance Company" required></td>
      </tr>

      <table class="wt" style="float:right">
        <tr>
          <td><input type="text" class="textbox" name="ic" id="ic" placeholder="IC/Passport" required/></td>
        </tr>
        <tr>
          <td>Date of birth:<br><input type="date" name="birthday" class="textbox" id="birthday"  required></td>

        </tr>
        <tr>
          <td>Gender:<input type="radio" name="gender" value="m">Male<input type="radio" name="gender" value="f">Female</td>
        </tr>
        <tr>
          <td><textarea name="address" class="textbox" id="address" rows="4" cols="50" maxlength="500" placeholder="Address.." required></textarea></td>

        </tr>
      </table>
       </table>
       <table class="subtn">
         <tr><td>
       <input style="background-color:#00FF40;" id="button" type="submit" name="submitbtn"  value="Submit"/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
       <input style="background-color:#FA5858;" id="button" type="reset" name="resetbtn"  value="Reset"/>
</td>
     </tr>
     </table>
      </div>



  </form>
    </div>

</body>
</html>
