<?php
session_start();
//if($_SESSION["name"] == ""){
  //header("location:main.php");
//}
$host="localhost";
$db_name="emr_system";
$table_name="record";

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

$table_pat="patient";

$conn = mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


$search = $_POST['search'];
$searchby = $_POST['searchby'];

if($searchby == "recordId"){
$sql = "SELECT * FROM record INNER JOIN patient  WHERE recordId = '$search' ";

   $retrieve = mysql_query( $sql, $conn );

   if(! $retrieve ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysql_fetch_array($retrieve, MYSQL_ASSOC)) {

   $recordId= $row['recordId'];
   $patientId= $row['patientId'];
  $userId= $row['userId'];
   $treatment= $row['treatment'];
   $diagnosis= $row['diagnosis'];
   $symptom= $row['symptom'];

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
     <form action="update_record.php" method="post">
       <fieldset style="width:90%; height:auto; margin-left:30px;">
       <legend id="legend">Update Record</legend>
       <table id="recordsize">
         <tr>

           <td><input type="text" class="textbox" name="patientId" id="pid" placeholder="PatientID" required value=<?php echo $patientId ?> /></td>
           <td><input type="text" name='recordId' value=<?php echo $recordId ?>  style="display:none"></td>
         </tr>
         <tr>
           <td><textarea name="treatment"  id="treatment" rows="4" cols="50" maxlength="500" placeholder="Treatment.." required ><?php echo $treatment ?></textarea></td>
         </tr>
         <tr>
             <td><textarea name="diagnosis" id="diagnosis" rows="4" cols="50" maxlength="500" placeholder="Diagnosis.." required ><?php echo $diagnosis ?></textarea></td>
         </tr>
         <tr>
           <td><textarea name="symptom" id="symptoms" rows="4" cols="50" maxlength="500" placeholder="Patient Symptoms.." required ><?php echo $symptom ?></textarea></td>
         </tr>
       </table>
     </fieldset>
     <table align="center">
       <tr>
         <td>
          <input style="background-color:#00FF40;" id="button" type="submit" name="updatebtn" value="Update"/>&nbsp &nbsp &nbsp &nbsp
          <input style="background-color:#FA5858;" id="button" type="submit" name="deletebtn" value="Delete"/>
         </td>
       </tr>
   </table>
     </form>
 </div>
 </body>
 </html>
