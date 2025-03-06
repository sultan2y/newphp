<?php
include("connection.php");
session_start();
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
    <li><a href="new1.php"><b>Announcement</b></a></li>
    <li><a href="login.php">Login</a></li>
  </div>
</td>
</tr>
<tr>
<td height="350px" width="150px" bgcolor="#E5E4E2" valign="top">
<table bgcolor="#E5E4E2" border="0" width="200" height="400" class="menu-bar" align="center">
  <tr><td width="110" height="20"><b><font color="white"></font></b></td></tr>
  <tr><td width="110" height="20"><b><font color="white"><a href="dir.php" style="color:white">Office Director</a></font></b></td></tr>
  <tr><td width="150" height="20"><a href="regulation.php" id="drop"><b>Rules and Regulations</b></a></td></tr>
  <tr><td><img src="b3.gif" width="200" height="150"></td></tr>
</table>
</td>
<td valign="top" bgcolor="white">
<h2 style="font-size:20px; color:red"><center>Announcements</center></h2><br>
<?php
// Line 55 area: Fetch and display announcements
$result = $conn->query("SELECT * FROM announcements ORDER BY date DESC");
if (!$result) {
    echo "<p style='font-size: 18px; text-align: center;'>Error: " . $conn->error . "</p>";
} else {
    $rowCheck = $result->num_rows;
    if ($rowCheck > 0) {
        while ($row = $result->fetch_array()) {
            echo "<p style='font-size: 18px; text-align: justify;'>";
            echo "<b>" . htmlspecialchars($row['title']) . "</b><br>";
            echo htmlspecialchars($row['content']) . "<br>";
            echo "<i>Posted on: " . $row['date'] . "</i>";
            echo "</p>";
        }
    } else {
        echo "<p style='font-size: 18px; text-align: center;'>No announcements available.</p>";
    }
}
$conn->close();
?>
</td>
<td width="150px">
<table border="0" width="150px" height="400" bgcolor="white">
<tr>
<td valign="top" bgcolor="white">
<h2><center>
<font color="black" face="monotype corsiva" size="5">Wolkite University Distance Office Works for Change!!</font><br>
<iframe name="frame" width="300px" height="620px" src="date.php"></iframe>
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