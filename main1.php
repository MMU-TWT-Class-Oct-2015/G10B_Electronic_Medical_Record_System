<?php
session_start();

if($_SESSION["name"] == ""){
  header("location:main.php");
}
?>

<html>
  <head>
    <link rel="stylesheet" href="main1.css" type="text/css"/>
    <title>EMR MENU</title>
  </head>

<body>
    <ul>
        <li><a1 class="navbar-brand">Welcome <?php echo $_SESSION["name"];?></a1></li>
        <li><a>Home</a></li>
        <li>
          <div class="dropdown">
            <a href="#" class="dropbtn">Patient Record</a>
            <div class="dropdown-content">
              <a href="#">Add new Record</a>
              <a href="#">View Record</a>
              <a href="#">Update Record</a>
              <a href="#">Delete Record</a>
            </div>
          </div>
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
