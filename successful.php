<?php
session_start();
if(!session_name("uname")){
header("location:main.php");
}
?>
<html>
  <body>
    <h1>Login Successful</h1>
  </body>
</html>
