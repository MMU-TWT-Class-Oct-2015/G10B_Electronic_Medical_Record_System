<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelvin client</title>
    <link href="patient.css" rel="stylesheet" type="text/css" />


  </head>
  <body>
    <ul>
     <li><a href="#home">Home</a></li>
     <li><a href="patient.html">Add patient record</a></li>
     <li><a href="#delete">Delete</a></li>
     <li><a href="#update">Update</a></li>
    </ul>

    <div>
    <fieldset style="width:90%;">
    <table>
    <form name="patientfrm" class="" action="" method="post">

        <legend id="legend">Patient Profile</legend>

      <tr>
      <td>Name:</td><td><input type="text" class="textbox" name="pname" id="pname"required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>IC/Passport:</td><td><input type="text" class="textbox" name="ic" id="ic"required/></td>
    </tr>
    <tr>
      <td>Age:</td><td><input type="text" name="age"class="textbox" id="age"required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Date of birth:</td><td><input type="date" name="birthday" class="textbox" id="birthday"  required></td>
    </tr>
    <tr>
      <td>Contact Number:</td><td><input type="text" class="textbox" name="phonenumber" id="phonenumber"required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Gender:</td><td><input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female</td>
    </tr>
    <tr>
      <td>Race:</td>
      <td><select name="race" class="textbox" required>
        <option value="cina">Cina</option>
        <option value="malay">Malay</option>
        <option value="india">India</option>
        <option value="others">others</option>
      </select>
    </td>
    </tr>
    <tr>
      <td>Religion:</td><td><input type="text" class="textbox" name="region" id="region"required/></td>
      <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Address:</td><td><textarea name="address" class="textbox" id="address" rows="4" cols="50" maxlength="200"required></textarea></td>
    </tr>
    <tr>
      <td>Insurance Company:</td><td><input type="text" class="textbox" name="insurance" id="insurance" required></td>
        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Patient Systoms:</td><td><textarea  name="systoms" id="systoms"  class="textbox" rows="4" cols="50" maxlength="100"required></textarea></td>
    </tr>
    <tr>
      <td>Diagnosis:</td><td><input type="text" name="diagnosis" class="textbox" id="diagnosis" required></td>
        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td>Treatment:</td><td><input type="text" name="treatment" class="textbox" id="treatment" required</td>
    </tr>

    <tr>
      <td>
        <input type="submit" name="submitbtn" id="submitbtn" value="Submit"/>&nbsp
        <input type="reset" name="resetbtn" id="resetbtn"value="Reset"/>
      </td>
    </tr>

    </form>
  </table>
  </fieldset>

</div>
  </body>
</html>
