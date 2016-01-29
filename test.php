<?php
session_start();

if($_SESSION["name"] == ""){
  header("location:main.php");
}
?>

<html>
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="support\bootstrap.min.css">
  <script src="support\jquery.min.js"></script>
  <script src="support\bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Welcome <?php echo $_SESSION["name"];?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Patient Record <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Add new Record</a></li>
          <li><a href="#">View Record</a></li>
          <li><a href="#">Update Record</a></li>
          <li><a href="#">Delete Record</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Patient Profile <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Add new Profile</a></li>
          <li><a href="#">View Profile</a></li>
          <li><a href="#">Update Profile</a></li>
          <li><a href="#">Delete Profile</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Insurance Profile <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Insurance Profile Profile</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <a class="navbar-brand">Electronic Medical Record System</a>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Staff Profile <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Add new User</a></li>
          <li><a href="#">View User</a></li>
          <li><a href="#">Update User</a></li>
          <li><a href="#">Delete User</a></li>
        </ul>
      </li>

      <li>

          <a href="logout.php"> Logout  </a>
    </li>
    </ul>
  </div>
</nav>

<div class="container">
  <h3>Test</h3>
  <p>This is a test interface</p>
</div>

</body>
</html>
