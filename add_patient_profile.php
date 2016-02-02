<?php
$host="localhost";
$db_name="emr_system";
$table_name="patient";

$con=mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

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
      'userId' => 1,
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
  );

  function dbRowInsert($table_name, $form_data)
  {
      $fields = array_keys($form_data);
      $sql = "INSERT INTO ".$table_name." (`".implode('`,`', $fields)."`)VALUES('".implode("','", $form_data)."')";
        return mysql_query($sql);
  }

mysql_select_db("$db_name");

dbRowInsert('patient',$form_data);





 ?>
