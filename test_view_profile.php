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

      if(isset($_POST['submitbtn']))
      {
        echo "
            <script type=\"text/javascript\">
            window.alert('Your form is submit successfully!');
            window.location.href = 'main1.php';
            </script>
        ";

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
              <a href="view_patient1.php">View Profile</a>
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
  $userId= $row['userId'];
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

    <div class="conform">
      <div id="table">
      <fieldset style="width:90%; height:320px; margin-left:30px;">
      <table style="float:left" >
      <legend id="legend">New Patient Profile</legend>

      <tr>
        <td>Patient ID:<br><input type="text"  class="textbox" value = <?php $patientId ?>></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
        <td>Patient Name:<br><input type="text" class="textbox" value = <?php $patientName ?>></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
      <td>Patient Phone No:<br><input type="text" class="textbox" value = <?php $patientPhoneNo ?>></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
      <td>Patient IC:<br><input type="text" class="textbox" value = <?php $patientIc ?>></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
      <td>Patient Address:<br><input type="text" class="textbox" value = <?php $patientAddress ?>></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
      <td>Date of Birth:<br><input type="text" class="textbox" value = <?php $Dob ?>></td>
      </tr>
      <tr></tr><tr></tr>
      <tr>
      <td>Gender:<br><input type="text" class="textbox" value = <?php $patientGender ?>></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
      <td>Race:<br><input type="text" class="textbox" value = <?php $race ?>></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
      <td>Religion:<br><input type="text" class="textbox" value = <?php $religion ?>></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
      <td>Insurance:<br><input type="text" class="textbox" value = <?php $insurance ?>></td>
      </tr>
       </table>
      </div>
    </div>

</body>
</html>
