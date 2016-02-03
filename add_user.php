<?php
$host="localhost";
$db_name="emr_system";
$table_name="members";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];
$ic = $_POST['ic'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$doctorname = $_POST['drname'];
$specility = $_POST['special'];



  $form_data = array(
    'userId' => NULL,
    'username' => $username,
      'password' => $password,
      'type' => $type,
      'ic' => $ic,
      'phoneNo' => $phonenumber,
      'email' => $email,
      'gender' => $gender,
      'doctorName' => $doctorname,
      'speciality' => $specility,
  );

  function dbRowInsert($table_name, $form_data)
  {
      $fields = array_keys($form_data);
      $sql = "INSERT INTO ".$table_name." (`".implode('`,`', $fields)."`)VALUES('".implode("','", $form_data)."')";
      echo $sql;
        return mysql_query($sql);

  }

mysql_select_db("$db_name");

dbRowInsert('members',$form_data);





 ?>
