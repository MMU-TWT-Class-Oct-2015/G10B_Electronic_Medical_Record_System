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

$pname=$_POST['pname'];
$ic=$_POST['ic'];
$age=$_POST['age'];
$phonenumber=$_POST['phonenumber'];
$birthday=$_POST['birthday'];
$race=$_POST['race'];
$gender=$_POST['gender'];
$religion=$_POST['religion'];
$address=$_POST['address'];
$insurance=$_POST['insurance'];


  $form_data = array(
      'userId' => $id,
      'patientId' => NULL,
      'patientName' => $pname,
  'patientPhoneNo' => $phonenumber,
      'patientIc' => $ic,
      'patientAddress' => $address,
    'Dob' => $birthday,
      'patientGender' => $gender,
      'race' => $race,
      'religion' => $religion,
      'insurance' => $insurance,
      'age' => $age,
  );

  function dbRowInsert($table_name, $form_data)
  {
      $fields = array_keys($form_data);
      $sql = "INSERT INTO ".$table_name." (`".implode('`,`', $fields)."`)VALUES('".implode("','", $form_data)."')";
      $sqlresult = mysql_query($sql);
      echo "<script type='text/javascript'>
                window.alert('New Profile successfully created!');
                window.location.href = 'main1.php';
            </script>";
        return $sqlresult;
  }

mysql_select_db("$db_name");

dbRowInsert('patient',$form_data);

 ?>
