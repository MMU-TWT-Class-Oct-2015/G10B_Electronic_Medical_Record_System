<?php
session_start();
if(!$_SESSION["name"]){
  header("location:main.php");
}
else{
  header("location:test.php");
}
?>
<!--<html>
  <body>
    <h1>Login Successful</h1>
  </body>
</html>-->
