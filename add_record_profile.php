<?php
$host="localhost";
$db_name="emr_system";
$table_name="record";

mysql_connect("$host", "root", "")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$treatment = $_POST['treatment'];
$diagnosis=$_POST['diagnosis'];
$symptoms=$_POST['symptoms'];
$patientId = $_POST['patientid'];

  $form_data = array(
    'recordId' => NULL,
    'patientId' => $patientId,
      'userId' => 1,
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
      echo "<script type='text/javascript'>
                window.alert('New record successfully created!');
                window.location.href = 'main1.php';
            </script>";
        return $sqlresult;


  }

mysql_select_db("$db_name");

dbRowInsert('record',$form_data);


header("location:record.php");
exit();



 ?>
