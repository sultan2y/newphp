<html>
<head>
<link rel="stylesheet" type="text/css" href="3.css">
<script language="javascript">
  function check() {
    if (document.getElementById("txt_username").value == "") {
      alert("Please Enter User name !!");
      document.getElementById("txt_username").focus();
      return false;
    }
    if (document.getElementById("txt_password").value == "") {
      alert('Please Enter your password !!');
      document.getElementById("txt_password").focus();
      return false;
    }
    return true;
  }
</script>
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
<table bgcolor="#E5E4E2" border="0" width="200" height="400" class="menu-bar" align="center">
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
<h2 style="font-size:20px; color:red"><center>Mission</center></h2><br>
<p style="font-size: 20px; text-align: justify;">
To produce competent, innovative, and socially responsible graduates who contribute to Ethiopia’s social, economic, and technological advancement through quality education, impactful research, and community engagement.
</p>
<h2 style="font-size:20px; color:blue"><center>Vision</center></h2>
<p style="font-size: 20px; text-align: justify;">
Wolkite University aspires to be a leading institution in Ethiopia, recognized for excellence in multidisciplinary education, research, and community service.
</p>
<h2 style="font-size:20px; color:blue"><center>History of the University</center></h2>
<p style="font-size: 20px; text-align: justify;">
Wolkite University was established in 2004 E.C. (2011/2012 Gregorian Calendar) by the Ethiopian government to expand higher education access in the Gurage Zone, Southern Nations, Nationalities, and Peoples' Region (SNNPR). Founded with an initial focus on addressing regional educational needs, the university began operations with limited resources and a commitment to serving rural communities. Its main campus is located in Wolkite town, approximately 158 kilometers southwest of Addis Ababa.
</p>
<p style="font-size: 20px; text-align: justify;">
Since its inception, Wolkite University has grown to offer a range of undergraduate and postgraduate programs, including distance education initiatives to reach students across Ethiopia. The Distance Education Office, established to enhance accessibility, supports learners in various fields such as Accounting, Management, and Education. Today, the university plays a vital role in producing skilled professionals and conducting research to address national development challenges, with a history spanning over a decade of service to the Ethiopian education system.
</p>
</td>
<td width="150px">
<table width="150px" height="400" bgcolor="white">
<tr>
<td valign="top" bgcolor="white">
<h2><center>
<font color="black" face="monotype corsiva" size="5">Wolkite University Distance and continuing Education Office Works for Change!!</font><br>
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
Wolkite University Distance and continuing Education Office
</font></td></tr></table>
</td>
</tr>
</table>
</body>
</html>