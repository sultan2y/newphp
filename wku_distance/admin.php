<?php
	include("connection.php");  
 session_start();
if(isset($_SESSION['User_Id']))
 {
  $mail=$_SESSION['User_Id'];
 } 
 else 
 {
 ?>

<script>
  alert('You Are Not Logged In !! Please Login to access this page');
  alert(window.location='login.php');
 </script>
 <?php
 }
 ?>
<html>
<head>
<link style="text/css" href="3.css" rel="stylesheet">

<body>
<table align=center width=1000px bgcolor="white"border="white">
<tr>
<td height=20px  colspan=4>
<img src="2.jpg" width="120px" height="50" ><img src="ima/c12.png" width="1000px" height="50" ><img src="2.jpg" width="120px" height="50" >
</td>
</tr>
<tr>
<td  height=20px colspan=3 bgcolor=#737CA1 >
  <div id="dropdown">
   <li><a href="admin.php"><b>Admin Home</b></a></li>
   <li><a href="manageuser.php"><b>Manage User Account </b></a></li>	
   <li><a href="create.php"><b>Create User account</b></a></li>
   <li> <a href="#" ><b>View</b></a><ul>	
   <li> <a href="viewactiveuser.php">View Active User</a></li>
   <li> <a href="viewdactiev.php">View Deactivate User</a></li></ul></li> 	
   <li><a href="changepassword.php"><b>Change Password</b></a></li>
<li><a href="logout.php" id="login">Logout (<?php echo"Hi&nbsp;&nbsp;&nbsp;";?><?php echo $_SESSION['b'];?>)</a></li>	
	</div>
	 </td>
     </tr>
	  <!--------body  --->
<td  valign="top" bgcolor=white>
<table ><tr><td valign="top"><iframe name="frame" width=730px height=450px src="slide.html" style="margin-left:100px"align ="right"></iframe></td></tr></table><br>
</td>
<td width=150px>
<table border=0 width=150px height="100" bgcolor=white>
<tr>
<td valign=top bgcolor=white>
<h2><center>
<font color="black" face="monotype corsiva" size="5">wolkite university  distance Office  works for change!!</font><br>
<font color="white"><a href="debre.php"><iframe name="frame" width=300px height=400px src="date.php"></iframe><a></center></h2>
</td>
</tr>

</table>
</td>
</tr>
<tr>
<td colspan=3 bgcolor=gray>
<table align="center" bgcolor=""><tr><td><font face="Times New Roman" color="white" size="3">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
wolkite University of Collage Distance Eduction Office
&nbsp; &nbsp; &nbsp; &nbsp;
</font></td></tr></table>
</td>
</tr>
</table>
</body>
</html>
</html>