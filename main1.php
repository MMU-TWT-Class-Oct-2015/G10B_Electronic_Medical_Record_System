<?php
session_start();

if($_SESSION["name"] == ""){
  header("location:main.php");
}
?>

<html>
<<<<<<< HEAD
  <head>
    <link rel="stylesheet" href="main1.css" type="text/css"/>
    <title>EMR MENU</title>
  </head>
=======
<head>
<link rel="stylesheet" href="main1.css" type="text/css"/>
<<<<<<< HEAD
<meta name="viewport" content="width=device-width, initial-scale=1">
=======
>>>>>>> 408faa162dcdc56b9d5e77d9fce81ed5e6b32424
<title>Test Navigation</title>
</head>
<h1>Welcome to Electronic Medical Record</h1>
>>>>>>> dc8bf28fa1fa1752d8ededa69a7d74acaf3a2ff7

<body>
    <ul>
        <li><a1 class="navbar-brand">Welcome <?php echo $_SESSION["name"];?></a1></li>
        <li><a>Home</a></li>
        <li>
<<<<<<< HEAD
          <div class="dropdown">
            <a href="#" class="dropbtn">Patient Record</a>
            <div class="dropdown-content">
              <a href="#">Add new Record</a>
              <a href="#">View Record</a>
              <a href="#">Update Record</a>
              <a href="#">Delete Record</a>
            </div>
          </div>
=======
            <a href="#">Patient Record &#9662;</a>
            <ul class="dropdown">
<<<<<<< HEAD
                <li><a href="#">Add Record</a></li>
=======
                <li><a href="#">Add new Record</a></li>
>>>>>>> 408faa162dcdc56b9d5e77d9fce81ed5e6b32424
                <li><a href="#">View Record</a></li>
                <li><a href="#">Update Record</a></li>
                <li><a href="#">Delete Record</a></li>
            </ul>
>>>>>>> dc8bf28fa1fa1752d8ededa69a7d74acaf3a2ff7
        </li>

        <li>
          <div class="dropdown">
            <a href="#" class="dropbtn">Patient Profile</a>
            <div class="dropdown-content">
              <a href="#">Add new Profile</a>
              <a href="#">View Profile</a>
              <a href="#">Update Profile</a>
              <a href="#">Delete Profile</a>
            </div>
          </div>
        </li>

        <li>
          <div class="dropdown">
            <a href="#" class="dropbtn">Insurance Profile</a>
            <div class="dropdown-content">
              <a href="#">View Insurance Profile</a>
            </div>
          </div>
        </li>

      <ul style="float:right;list-style-type:none;">
        <li><a1 class="navbar-brand">Electronic Medical Record System</a1></li>

        <li>
          <div class="dropdown">
            <a href="#" class="dropbtn">Human Resource System</a>
            <div class="dropdown-content">
              <a href="#">Add new User</a>
              <a href="#">View User</a>
              <a href="#">Update User</a>
              <a href="#">Delete User</a>
            </div>
          </div>
        </li>
        <li>
            <a href="logout.php"> Logout  </a>
      </li>
      </ul>
    </ul>
    <p id = "historyid">Hospital Sultanah Aminah is currently the largest government hospital in Johor Bahru.
      Hospital Sultanah Aminah had third class wards constructed from wood since 1882.
       When these wards became old and overcrowded with patients, a new building was planned to replace these old wards.
        The new building construction began in 1938 and completed in 1941.
        his 5 storey building can accomodate 857 beds. The building has two wings in the shape of "T" containing 80 beds in each ward.
        In the center, there are lifts and kitchen for patients. Operation theater is located in first floor and the top floor was specially for TB patients.
      Accident and Emergency Department used to be located at ground floor of the main building but in 1974 it was shifted to an old building located 300 metres from the main building.
      Outpatient Department was also located at this building. This building is also not sufficient to provide comfort to the patient.
       Thus, as an interim solution to improve services in this section, an accident and emergency department was built on the ground floor of the new Operation Theatre complex.
        It was first used in 27th. May, 1985. This place will continue to be used until the proposed Polyclinic project in Jalan Dato' Wilson which will have a new accident and emergency department is fully implemented.</p>

</body>
</html>
