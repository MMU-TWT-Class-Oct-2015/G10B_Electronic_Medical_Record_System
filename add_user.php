<?php
$host="localhost";
$db_name="emr_system";
$table_name="members";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


$upload_dir='image/';
$target_file =$upload_dir . basename($_FILES['fileToUpload']['name']);

        $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
        $name = $_FILES["fileToUpload"]["name"];
        move_uploaded_file($tmp_name, "$upload_dir/$name");

$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];
$ic = $_POST['ic'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$doctorname = $_POST['drname'];
$specility = $_POST['special'];
$picture = $target_file;



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
      'picture' => $picture ,
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

dbRowInsert('members',$form_data);





 ?>
