<?php
session_start();
if($_SESSION["name"] == ""){
  header("location:main.php");
}
$host="localhost";
$db_name="emr_system";
$table_name="record";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$cname=$_SESSION["name"];
//$sql="SELECT * FROM members WHERE username='$cname'";
$sql="SELECT userId, doctorName, speciality, picture FROM members WHERE username='$cname'";
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
if($search == ""){
  echo "<script type='text/javascript'>
            window.alert('Please insert value.');
            window.location.href = 'view_record.php';
        </script>";
      }
if($searchby == "recordId"){
$sql = "SELECT * FROM record INNER JOIN patient  WHERE recordId = '$search' ";

   $retrieve = mysql_query( $sql, $conn );
$rowcount=mysql_num_rows($retrieve);

if($rowcount==0){
  echo "<script type='text/javascript'>
            window.alert('No data. Please type a correct value!');
            window.location.href = 'view_record.php';
        </script>";
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

else {
  echo "<script type='text/javascript'>
            window.alert('Please choose a type to perform searching!');
            window.location.href = 'view_record.php';
        </script>";
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
       <table id="recordsize" class="wt">
         <tr>
           <td>Patient ID: <br><input type="text" class="textbox" name="patientId" id="pid" disabled placeholder="PatientID" required value=<?php echo $patientId ?> /></td>
           <td><input type="text" name='recordId' value=<?php echo $recordId ?>  style="display:none"></td>
         </tr>
         <tr>
           <td>Treatment: <br><textarea name="treatment"  id="treatment" rows="4" cols="50" maxlength="500" placeholder="Treatment.." required ><?php echo $treatment ?></textarea></td>
         </tr>
         <tr>
             <td>Diagnosis: <br><textarea name="diagnosis" id="diagnosis" rows="4" cols="50" maxlength="500" placeholder="Diagnosis.." required ><?php echo $diagnosis ?></textarea></td>
         </tr>
         <tr>
           <td>Symptom: <br><textarea name="symptom" id="symptoms" rows="4" cols="50" maxlength="500" placeholder="Patient Symptoms.." required ><?php echo $symptom ?></textarea></td>
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
 <footer>
   <p id="foot">Copyright 2016.All right are reserved. Electronic Medical Record System.<img id="copy" src="image/copyright.png">
   <br>Contact information: <a class="mail" href="mailto:EMR-sup@assignment.com">
   EMR-sup@assignment.com</a></p>
 </footer>
 </html>
