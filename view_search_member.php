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

      $Dsearch=$_POST["search"];
      $Dsearchby=$_POST["searchby"];
      if($Dsearch==""){
        echo  "<script type='text/javascript'>
                  window.alert('Please insert value.');
                  window.location.href = 'view_user.php';
              </script>";
      }
      $conn = mysql_connect("$host", "root", "")or die("cannot connect");
      mysql_select_db("$db_name")or die("cannot select DB");

      if($Dsearchby == "doctorName"){
      $sql = "SELECT * FROM members WHERE doctorName='$Dsearch' ";

         $retrieve = mysql_query( $sql, $conn );
         $rowcount=mysql_num_rows($retrieve);
         if($rowcount==0){
           echo "<script type='text/javascript'>
                     window.alert('No data. Please type a correct value!');
                     window.location.href = 'view_user.php';
                 </script>";
         }

         while($grow = mysql_fetch_array($retrieve, MYSQL_ASSOC)) {
           $gid=$grow['userId'];
           $gusername=$grow['username'];
           $gpassword=$grow['password'];
           $gtype=$grow['type'];
           $gic=$grow['ic'];
           $gphoneNo=$grow['phoneNo'];
           $gemail=$grow['email'];
           $ggender=$grow['gender'];
           $gdrname=$grow['doctorName'];
           $gdrspecial=$grow['speciality'];
           $gppicture=$grow['picture'];
         }
      }elseif($Dsearchby == "userId"){
      $sql = "SELECT * FROM members WHERE userId='$Dsearch' ";

         $retrieve = mysql_query( $sql, $conn );

         $rowcount=mysql_num_rows($retrieve);
         if($rowcount==0){
           echo "<script type='text/javascript'>
                     window.alert('No data. Please type a correct value!');
                     window.location.href = 'view_user.php';
                 </script>";
         }

         while($grow = mysql_fetch_array($retrieve, MYSQL_ASSOC)) {
           $gid=$grow['userId'];
           $gusername=$grow['username'];
           $gpassword=$grow['password'];
           $gtype=$grow['type'];
           $gic=$grow['ic'];
           $gphoneNo=$grow['phoneNo'];
           $gemail=$grow['email'];
           $ggender=$grow['gender'];
           $gdrname=$grow['doctorName'];
           $gdrspecial=$grow['speciality'];
           $gppicture=$grow['picture'];
         }
      }elseif($Dsearchby == "ic"){
      $sql = "SELECT * FROM members WHERE ic='$Dsearch' ";

         $retrieve = mysql_query( $sql, $conn );
         $rowcount=mysql_num_rows($retrieve);
         if($rowcount==0){
           echo "<script type='text/javascript'>
                     window.alert('No data. Please type a correct value!');
                     window.location.href = 'view_user.php';
                 </script>";
         }
         while($grow = mysql_fetch_array($retrieve, MYSQL_ASSOC)) {
           $gid=$grow['userId'];
           $gusername=$grow['username'];
           $gpassword=$grow['password'];
           $gtype=$grow['type'];
           $gic=$grow['ic'];
           $gphoneNo=$grow['phoneNo'];
           $gemail=$grow['email'];
           $ggender=$grow['gender'];
           $gdrname=$grow['doctorName'];
           $gdrspecial=$grow['speciality'];
           $gppicture=$grow['picture'];
         }
       }
    else {
      echo "<script type='text/javascript'>
                window.alert('Please choose a type to perform searching!');
                window.location.href = 'view_user.php';
            </script>";
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

        <li>
          <div class="dropdown">
            <a href="#" class="dropbtn">Human Resource System</a>
            <div class="dropdown-content">
              <a href="hr.php">Add new User</a>
              <a href="view_user.php">View/ Update/ Delete User</a>

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
            <?php echo "<img width='145' height='150px' src=" .$ppicture. ">" ?>
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
      <div id="table">
      <fieldset style="width:90%; height:320px; margin-left:30px;">
      <table style="float:left" id = "table1" class="wt">
      <form action="delete_member.php" method="post" enctype="multipart/form-data">
      <legend id="legend">New Doctor Profile</legend>

      <tr>
        <td>Username: <br><input type="text" class="textbox" name="username" id="username" value=<?php echo $gusername; ?> required/></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
        <td>Password: <br><input type="password" name="password"class="textbox" id="password" value=<?php echo $gpassword; ?> required/></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
        <td>Phone No: <br><input type="text" class="textbox" name="phonenumber" id="phonenumber" value=<?php echo $gphoneNo; ?> required/></td>
      </tr>
<tr></tr><tr></tr>
<tr></tr><tr></tr>
      <tr>
        <td>IC: <br><input type="text" class="textbox" name="ic" id="ic" value=<?php echo $gic; ?> required/></td>
      </tr>
<tr></tr><tr></tr>
      <tr>
        <td>Email: <br><input type="text" class="textbox" name="email" id="email" value=<?php echo $gemail; ?> required></td>
      </tr>
      <tr></tr><tr></tr>

      <tr></tr><tr></tr>

      <table class="wt" style="float:right">
        <tr>
          <td>Doctor Name: <br><input type="text" class="textbox"  name="drname" id="drname" value=<?php echo $gdrname; ?> required/></td>
        </tr>
        <tr></tr><tr></tr>
        <tr>
          <td>Speciality: <br><input type="text" class="textbox" name="special" id="special" value=<?php echo $gdrspecial; ?> required/></td>
        </tr>
        <tr></tr><tr></tr>
        <td><input type="hidden" class="textbox"  name="id" id="id" value=<?php echo $gid; ?> required/></td>
        <tr>
          <?php if($ggender=="m" || $ggender=="M"){ ?>
            <td>Gender:   <input type="radio" name="gender" value="M" checked>Male<input type="radio" name="gender" value="F">Female</td>
          <?php }
                else { ?>
                  <td>Gender:   <input type="radio" name="gender" value="M">Male<input type="radio" name="gender" value="F" checked>Female</td>
            <?php    }
           ?>
        </tr>
        <tr></tr><tr></tr>
        <tr>
          <td>Position:<input type="checkbox" name="type" disabled value="0" checked="">Staff</td>
        </tr>

        <tr>
        <td> <input type="file" name="fileToUpload" id="fileToUpload"></td>
        </tr>
      </table>
       </table>
</fieldset>
       <table align="center">
         <tr><td>
       <input style="background-color:#00FF40;" id="button" type="submit" name="editbtn"  value="Edit"/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
       <input style="background-color:#FA5858;" id="button" type="submit" name="deletebtn"  value="Delete"/>
</td>
     </tr>
     </table>
      </div>
  </form>
    </div>
</body>
<footer>
  <p id="foot">Copyright 2016.All right are reserved. Electronic Medical Record System.<img id="copy" src="image/copyright.png">
  <br>Contact information: <a class="mail" href="mailto:EMR-sup@assignment.com">
  EMR-sup@assignment.com</a></p>
</footer>
</html>
