<!DOCTYPE html>
<html>
  <head meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" >
    <title>Eletronic Medical Record System</title>
    <link href="patient.css" rel="stylesheet" type="text/css" />


  </head>
  <body>
    <div id="title">
      <h1>Eletronic Medical Record System</h1>
    </div>
    <div id="navigation">
    <ul>
     <li><a href="#home">Home</a></li>
     <li><a href="patient.html">Add new patient</a></li>
     <li><a href="#delete">Delete patient</a></li>
     <li><a href="#update">Update patient details</a></li>
     <li><a href="index.php">Sign out</a></li>
    </ul>
  </div>

    <div id="table">
    <fieldset style="width:90%;">
    <table>
    <form name="patientfrm" class="" action="" method="post">

        <legend id="legend">Patient Profile</legend>

      <tr>
      <td><input type="text" class="textbox" name="pname" id="pname" placeholder="Name" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><input type="text" class="textbox" name="ic" id="ic" placeholder="IC/Passport" required/></td>
    </tr>
    <tr>
      <td><input type="text" name="age"class="textbox" id="age" placeholder="Age" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Date of birth:</td>
    </tr>
    <tr>
      <td><input type="text" class="textbox" name="phonenumber" id="phonenumber" placeholder="Contact Number" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><input type="date" name="birthday" class="textbox" id="birthday"  required></td>
    </tr>
    <tr>
        <td><select name="race" class="textbox" required>
          <option value="" selected>Race:</option>
          <option value="cina">Cina</option>
          <option value="malay">Malay</option>
          <option value="india">India</option>
          <option value="others">others</option>
        </select>
      </td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Gender:<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female</td>
    </tr>

    <tr>
      <td><input type="text" class="textbox" name="region" id="region" placeholder="Religion" required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><textarea name="address" class="textbox" id="address" rows="4" cols="50" maxlength="200" placeholder="Address.." required></textarea></td>
    </tr>
    <tr>
      <td><input type="text" class="textbox" name="insurance" id="insurance" placeholder="Insurance Company" required></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><textarea  name="symptoms" id="symptoms"  class="textbox" rows="4" cols="50" maxlength="100" placeholder="Patient symptoms" required></textarea></td>
    </tr>
    <tr>
      <td><input type="text" name="diagnosis" class="textbox" id="diagnosis" placeholder="Diagnosis" required></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><input type="text" name="treatment" class="textbox" id="treatment" placeholder="Treatment" required</td>
    </tr>

    <tr>
      <td>
        <input id="button" type="submit" name="submitbtn" id="submitbtn" value="Submit"/>&nbsp
        <input id="button" type="reset" name="resetbtn" id="resetbtn"value="Reset"/>
      </td>
    </tr>

    </form>
  </table>
  </fieldset>

</div>
  </body>
</html>
