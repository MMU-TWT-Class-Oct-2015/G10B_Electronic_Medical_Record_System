<?php
session_start();
//if($_SESSION["name"] == ""){
  //header("location:main.php");
//}
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

$table_pat="patient";

$conn = mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


$search = $_POST['search'];
$searchby = $_POST['searchby'];

if($searchby == "patientId"){
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
  $age= $row['age'];
   }
}elseif($searchby == "patientName"){
$sql = "SELECT * FROM patient WHERE patientName='$search' ";

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
  $age= $row['age'];
   }
}elseif($searchby == "patientIc"){
$sql = "SELECT * FROM patient WHERE patientIc='$search' ";

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
  $age= $row['age'];
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

             </div>
           </div>
         </li>

         <li>
           <div class="dropdown">
             <a href="#" class="dropbtn">Patient Profile</a>
             <div class="dropdown-content">
               <a href="patient.php">Add new Profile</a>
               <a href="view_patient1.php">View/ Update Delete Profile</a>

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
                       <a href="#">View/ Update/ Delete User</a>

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
       <table style="float:left" >
       <form action="update_patient_profile.php" method="post">
       <legend id="legend">Searched Profile</legend>

       <tr>

         <td>Patient ID:<br><input type="text"  class="textbox"  value = <?php echo $patientId ?>> </td>

         <td>Patient ID:<br><input type="none"  name = "pid"  class="textbox"  value = <?php echo $patientId ?>> </td>

       </tr>
 <tr></tr><tr></tr>
       <tr>
         <td>Patient Name:<br><input type="text" name="pname" class="textbox"  value = <?php echo $patientName ?>></td>
       </tr>
 <tr></tr><tr></tr>
       <tr>
       <td>Patient Phone No:<br><input type="text" name="phonenumber" class="textbox"  value = <?php echo $patientPhoneNo ?>></td>
       </tr>
 <tr></tr><tr></tr>
       <tr>
       <td>Patient IC:<br><input type="text" name ="ic" class="textbox"  value = <?php echo $patientIc ?>></td>
       </tr>
 <tr></tr><tr></tr>
       <tr>
       <td>Patient Address:<br><input type="text" name = "address" class="textbox"  value = <?php echo $patientAddress ?>></td>
       </tr>
 <tr></tr><tr></tr>
 </table>
 <table style="float:middle" >
       <tr>
       <td>Date of Birth:<br><input type="text" name = "birthday" class="textbox"  value = <?php echo $Dob ?>></td>
       </tr>
       <tr></tr><tr></tr>
       <tr>
       <td>Gender:<br><input type="text" name = "gender" class="textbox"  value = <?php echo $patientGender ?>></td>
       </tr>
 <tr></tr><tr></tr>
       <tr>
       <td>Race:<br><input type="text" name = "race" class="textbox"  value = <?php echo $race ?>></td>
       </tr>
 <tr></tr><tr></tr>
       <tr>
       <td>Religion:<br><input type="text" name = "religion" class="textbox"  value = <?php echo $religion ?>></td>
       </tr>
 <tr></tr><tr></tr>
       <tr>
       <td>Insurance:<br><input type="text" name = "insurance" class="textbox"  value = <?php echo $insurance ?>></td>
       </tr>
<tr></tr><tr></tr>
       <tr>
       <td>Age:<br><input type="text"  name="age" class="textbox"  value = <?php echo $age ?>></td>
       </tr>
        </table>
        <table class="subtn">
          <tr><td>
        <input style="background-color:#00FF40;" id="button" type="submit" name="updatebtn"  value="Update"/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <input style="background-color:#FA5858;" id="button" type="submit" name="deletebtn"  value="Delete"/>
 </td>
      </tr>
      </table>
       </div>
     </div>

 </body>
 </html>
