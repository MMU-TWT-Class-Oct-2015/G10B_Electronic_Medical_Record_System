<html>
  <title> EMR SYSTEM </title>
  <link rel="stylesheet" href="main.css" type="text/css"/>
  <body>
    <br>
    <h1 style="color:white;" align=center>
      <img src="image\iconflip.png" alt="Profile Picture" style="width:40px;height:40px;">
      Electronic Medical Record System
      <img src="image\icon.png" alt="Profile Picture" style="width:40px;height:40px;">
    </h1>
    <br>
    <table width=300 border=3 align=center cellpadding=0 cellspacing=2>
      <form name="loginform" method="post" action="logincheck.php">

      <tr><td>
            <table width="100%" border=0 cellpadding=3 cellspacing=1>
        <thead>
          <strong>Login Here<strong>
        </thead>
      </tr>

      <tr>
        <td width=78 align=right>Username: </td>
        <td width=294><input name="uname" type="text" id="iduname"></td>
      </tr>

      <tr>
        <td width=78 align=right>Password: </td>
        <td width=294><input name="upassword" type="password" id="idupassword"></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <!--admin = 1 staff = 0-->
        <td><input type="radio" name="utype" value="1" checked>Admin &nbsp; </input>
            <input type="radio" name="utype" value="0">Staff </input>
          </td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" value="Login"></td>
      </tr>
    </td>
    </table>
    </form>
  </table>
  </body>
</html>
