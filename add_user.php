<?php
$host="localhost";
$db_name="emr_system";
$table_name="members";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$upload_dir="image/";
$target_file=$upload_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOK = 1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])){
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false){
    echo "File is an image -" . $check["mime"]. ".";
    $uploadOK=1;
  } else{
    echo "File is not an image.";
    $uploadOK = 0;
  }
}

$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];
$ic = $_POST['ic'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$doctorname = $_POST['drname'];
$specility = $_POST['special'];
$picture = mysql_real_escape_string('image\\'.$_POST['picture']);



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
      echo $sql;
        return mysql_query($sql);

  }

mysql_select_db("$db_name");

dbRowInsert('members',$form_data);





 ?>
