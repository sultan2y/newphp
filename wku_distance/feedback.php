<?php
include("connection.php");
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    if ($stmt->execute()) {
        echo "<p style='color:green; text-align:center;'>Feedback submitted successfully!</p>";
    } else {
        echo "<p style='color:red; text-align:center;'>Error: " . $conn->error . "</p>";
    }
    $stmt->close();
    $conn->close();
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="3.css">
</head>
<body>
<table align="center" width="1000px" border="0" bgcolor="white">
<tr>
<td height="20px" colspan="4">
<img src="2.jpg" width="120px" height="50"><img src="ima/c12.png" width="1000px" height="50"><img src="2.jpg" width="120px" height="50">
</td>
</tr>
<tr>
<td height="20px" colspan="3" bgcolor="#737CA1">
  <div id="dropdown">
    <li><a href="index.php">Home</a></li>
    <li><a href="About.php">About Us</a></li>
    <li><a href="register.php">Apply</a></li>
    <li><a href="#">Departments</a>
      <ul>
        <li><a href="Accounting.php">Accounting</a></li>
        <li><a href="Managment.php">Management</a></li>
        <li><a href="Marketing.php">Marketing Management</a></li>
        <li><a href="Economics.php">Economics</a></li>
        <li><a href="English.php">English</a></li>
        <li><a href="Mathematics.php">Mathematics</a></li>
        <li><a href="Educational.php">Educational Planning and Management</a></li>
      </ul>
    </li>
    <li><a href="Contact.php">Contact Us</a></li>
    <li><a href="feedback.php">Feedback</a></li>
    <li><a href="help.php">Help</a></li>
    <li><a href="new1.php">Announcement</a></li>
    <li><a href="login.php">Login</a></li>
  </div>
</td>
</tr>
<tr>
<td height="350px" width="150px" bgcolor="#E5E4E2" valign="top">
<table bgcolor="#E5E4E2" border="0" width="150" height="400" class="menu-bar" align="center">
  <tr>
    <td width="110" height="20"><b><font color="white"></font></b></td>
  </tr>
  <tr>
    <td width="110" height="20"><b><font color="white"><a href="dir.php" style="color:white">Office Director</a></font></b></td>
  </tr>
  <tr>
    <td width="150" height="20"><a href="regulation.php" id="drop"><b>Rules and Regulations</b></a></td>
  </tr>
  <tr>
    <td><img src="b3.gif" width="200" height="150"></td>
  </tr>
</table>
</td>
<td valign="top" bgcolor="white">
<h2 style="font-size:20px; color:red"><center>Feedback</center></h2><br>
<form action="feedback.php" method="post">
<table style="margin-left:auto; margin-right:auto; font-family: Verdana, Helvetica, sans-serif; font-size:18px;">
  <tr>
    <td><label for="name">Name:</label></td>
    <td><input type="text" id="name" name="name" size="30" required></td>
  </tr>
  <tr>
    <td><label for="email">Email:</label></td>
    <td><input type="email" id="email" name="email" size="30" required></td>
  </tr>
  <tr>
    <td><label for="message">Message:</label></td>
    <td><textarea id="message" name="message" rows="5" cols="30" required></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="submit" value="Submit Feedback">
      <input type="reset" value="Reset">
    </td>
  </tr>
</table>
</form>
</td>
<td width="150px">
<table border="0" width="100px" height="450" bgcolor="white">
<tr>
<td valign="top" bgcolor="white">
<h2><center>
<font color="black" face="monotype corsiva" size="5">Wolkite University Distance Office Works for Change!!</font><br>
<iframe name="frame" width="350px" height="400px" src="date.php"></iframe>
<a href="https://www.facebook.com"><img src="f.png" width="88" height="34"></a>
<a href="https://www.youtube.com"><img src="y.png" width="88" height="34"></a>
</center></h2>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="3" bgcolor="gray">
<table align="center" bgcolor=""><tr><td><font face="Times New Roman" color="white" size="3">
Wolkite University Distance Education Office All Rights Reserved © 2010 E.C.
</font></td></tr></table>
</td>
</tr>
</table>
</body>
</html>