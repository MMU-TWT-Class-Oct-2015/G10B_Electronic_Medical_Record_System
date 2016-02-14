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

$treatment = $_POST['treatment'];
$diagnosis=$_POST['diagnosis'];
$symptoms=$_POST['symptoms'];
$patientId = $_POST['patientid'];
$sql="SELECT * FROM patient WHERE patientId=$patientId";
$retrieve=mysql_query($sql);
$rowcount=mysql_num_rows($retrieve);
if($rowcount==0){
  echo "<script type='text/javascript'>
            window.alert('No data. Please enter a valid patient ID!');
            window.location.href = 'record.php';
        </script>";
}
  $form_data = array(
    'recordId' => NULL,
    'patientId' => $patientId,
      'userId' => $id,
      'treatment' => $treatment,
      'diagnosis' => $diagnosis,
      'symptom' => $symptoms,
  );

  function dbRowInsert($table_name, $form_data)
  {
      $fields = array_keys($form_data);
      $sql = "INSERT INTO ".$table_name." (`".implode('`,`', $fields)."`)VALUES('".implode("','", $form_data)."')";

        return mysql_query($sql);

      $sqlresult = mysql_query($sql);

        return $sqlresult;


  }

mysql_select_db("$db_name");

dbRowInsert('record',$form_data);

echo "<script type='text/javascript'>
          window.alert('New record successfully created!');
          window.location.href = 'view_record.php';
      </script>";
//header("location:record.php");
//exit();



 ?>
