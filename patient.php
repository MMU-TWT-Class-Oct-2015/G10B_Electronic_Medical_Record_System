<!DOCTYPE html>
<html>
  <head meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" >
    <title>Eletronic Medical Record System</title>
    <link href="patient.css" rel="stylesheet" type="text/css" />
  </head>

  <body>

    <div id="title">
      <h1>Eletronic Medical Record System<img style="width:50px; height:50px;" src="image/title.ico"></h1>
    </div>

    <div id="navigation">
    <ul>
     <li><a href="#home">Home</a></li>
     <li><a href="patient.php">Add new patient</a></li>
     <li><a href="#delete">Delete patient</a></li>
     <li><a href="#update">Update patient details</a></li>
     <li><a href="index.php">Sign out</a></li>
    </ul>
  </div>

    <div id="table">
    <fieldset style="width:90%; height:320px; margin-left:30px;">
    <table>
    <form name="patientfrm" class="" action="add_patient_profile.php" method="post">

        <legend id="legend">New Patient Profile</legend>

      <tr>
      <td><input type="text" class="textbox" name="pname" id="pname" placeholder="Name" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><input type="text" class="textbox" name="ic" id="ic" placeholder="IC/Passport" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
    </tr>

    <tr>
      <td><input type="text" name="age"class="textbox" id="age" placeholder="Age" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Date of birth:<br><input type="date" name="birthday" class="textbox" id="birthday"  required></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

    </tr>

    <tr>
      <td><input type="text" class="textbox" name="phonenumber" id="phonenumber" placeholder="Contact Number" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Gender:<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female</td>
      <td></td>
    </tr>

    <tr>
        <td><select id="race" name="race" class="textbox" required>
          <option value="" selected>Race:</option>
          <option value="cina">Cina</option>
          <option value="malay">Malay</option>
          <option value="india">India</option>
          <option value="others">others</option>
        </select>
      </td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><input type="text" name="treatment" class="textbox" id="treatment" maxlength="100" placeholder="Treatment" required</td>
    </tr>

    <tr>
      <td><input type="text" class="textbox" name="religion" id="religion" placeholder="Religion" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><input type="text" name="diagnosis" class="textbox" id="diagnosis" placeholder="Diagnosis" required></td>
    </tr>

    <tr>
      <td><input type="text" class="textbox" name="insurance" id="insurance" placeholder="Insurance Company" required></td>

      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><textarea  name="symptoms" id="symptoms"  class="textbox" rows="4" cols="50" maxlength="100" placeholder="Patient symptoms" required></textarea></td>

    </tr>



    </form>
  </table>

  </div>

  <div id="table2">
    <table>
      <form name="form2">
      <tr>
        <td><textarea name="address" class="textbox" id="address" rows="4" cols="50" maxlength="500" placeholder="Address.." required></textarea></td>
      </tr>

      <tr>
      <td><textarea  name="systoms" id="systoms"  class="textbox" rows="4" cols="50" maxlength="100" placeholder="Patient Systoms" required></textarea></td>
    </tr>

    <tr>
      <td>
        <input style="background-color:#00FF40;" id="button" type="submit" name="submitbtn"  value="Submit"/>&nbsp
        <input style="background-color:#FA5858;" id="button" type="reset" name="resetbtn"  value="Reset"/>
      </td>
    </tr>

  </form>
   </table>
 </div>

  </fieldset>



<div id="footer">
  <p id="content">Copyright 2016.All right are reserved.<br>Electronic Medical Record System.<img id="image" src="image/copyright.png"></p>
</div>
  </body>
</html>
