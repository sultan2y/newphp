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

</head>
<body>
<table align=center width=1000px height= border="6">
<tr>
<td height=20px  colspan=4>
<img src="2.jpg" width="140px" height="50" ><img src="ima/c12.png" width="1000px" height="50" ><img src="2.jpg" width="140px" height="50" >
</td>
</tr>
<tr>
<td  height=20px colspan=3 bgcolor=#737CA1 >
  <div id="dropdown">
<li><a href="Addcurrculm.php" id="drop">Add Curriclum</a></li>
<li> <a href="Upload.php" id="drop">Upload Module</a></li>
<li><a href="#" link="white" >Assign </a>

<ul>
<!---<li><a href="assign.php" link="white" >Assign Insturacor</a></li>-->
<li><a href="assigncourse_student.php" link="white" >Assign student</a></li>
</ul></li>
<li><a href="#" link="white" >Announcment</a>
      <ul>
<li><a href="new.php" link="white" >Post Announcment</a></li>
<li><a href="notice.php" link="white" >Post notice </a></li>
<li><a href="new2.php" link="white" >Delet Announcment</a></li>
		</ul>
		</li>
				<li><a href="#">View</a>
      <ul>
<!--<li><a href="rep11.php" >View Report</a></li>-->
<li><a href="viewcomment.php" >View Comments</a></li>
<li><a href="assigncourse.php" >View Assigned course</a></li>
<li><a href="assigninsturactor.php" >View Assign Instructor</a></li>

</ul>
</li>
<li><a href="changepassword5.php" >Change Password</a></li>   
<li><a href="logout.php" id="login">Logout (<?php echo"Hi&nbsp;&nbsp;&nbsp;";?><?php echo $_SESSION['b'];?>)</a></li>	
    </div>
</td>
</tr>
<!--------body  --->
<td  valign="top" bgcolor="white">
<br><br>
<table bgcolor="#F0F8FF"  style="border:1px solid #336699;width:550px;height:15px;border-radius:15px;box-shadow:1px 10px 10px gray" align="center">
<tr>
<td>
<h3><center>View Assigned Insturactor<center></h3>
<form action="assigninsturactor.php" method="post"  onsubmit="return Form1_Validator(this)" name="Form1">
<label><font size="4px">Department</font></label>
 <select name="department" id="department">
  <option>Accounting</option>
  <option>Managment</option>
  <option>Markating Managment</option>
  <option>Economices</option>
  <option>Englshe</option>
  <option>Mathmatices</option>
  <option>Educational Planning</option></select>
Batch<select name="year">
<?php
for ($i=1;$i<=3;$i++)
{
?>
<option><?php echo $i?></option>
<?php }?>
</select>
Semester<select name="semister">
<?php
for ($i=1;$i<=2;$i++)
{
?>
<option><?php echo $i?></option>
<?php }?>
</select> <input type="submit" value="Search" name="save" style="font-size:16px" align="center"><br>

</form>
</tr></td></table>

<?php
/* header("Content-Type:application/msword");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=report.docx");
//include("rep1.php");*/
$con=mysql_connect("localhost","root","") or die ("unable to connect");
$db=mysql_select_db("cde",$con);
if(isset($_POST['save'])){
@$dept=$_POST['department'];
@$d=$_POST['year'];
@$det=$_POST['semister'];
 
$rs = mysql_query("SELECT  * FROM  account, assign_instrctur_course
 where    assign_instrctur_course.depname='$dept' and  assign_instrctur_course.year='$d' and   assign_instrctur_course.semister='$det' ");
echo"<table border='0' align='center'><tr><td><br><br>";
print "In  ".$dept." Department  the following Insturactor are Assigend  : ".'<br><br>';
$r = mysql_query("SELECT * FROM curriculem,account,assign_instrctur_course where account.accounttype='Instructor'
 and curriculem.course_code=assign_instrctur_course.course_code and assign_instrctur_course.year='$d' and assign_instrctur_course.semister='$det' ");

print"<table border='2' width='655'  bgcolor='' align='center' >";
print"<tr color='green'>";
print"<th>First Name</th>";
print"<th>Last Name</th>";
print"<th>phone</th>";
print"<th>Course name </th>";
print"<th>Course code </th>";
print"<th>semister</th>";
print"<th>year </th>";

print"</tr>";
$num=1;
while($row = mysql_fetch_array($r))
  {
  $even="#ccc";
 $odd="#f5f5f5";
  $bg=$odd;
if($num%2==0){
$bg=$even;
  }
    print ("<tr>");
 print ("<td>" . $row['fname'] . "</td>"); 
 print ("<td>" . $row['lname'] . "</td>"); 
  print ("<td>" . $row['phone'] . "</td>"); 
 print ("<td>" . $row['course_name'] . "</td>");
 print ("<td>" . $row['course_code'] . "</td>");
 print ("<td>" . $row['semister'] . "</td>");
 print ("<td>" . $row['year'] . "</td>");
  print ("</tr>");
  }
print( "</table>");

mysql_close($conn);
echo"</tr>";
echo"</td>";
echo"</table>";
}
?>
</td>

<td width=150px>
<table border=0 width=150px height="100" bgcolor=white>
<tr>
<td valign=top bgcolor=white>
<h2><center>
<font color="black" face="monotype corsiva" size="5">Admass university  distance Office  works for change!!</font><br>
<font color="white"><a href="debre.php"><iframe name="frame" width=300px height=405px src="date.php"></iframe><a></center></h2>
</td>
</tr>

</table>
</td>
</tr>

<tr>
<td colspan=3 bgcolor=gray>
<table align="center" bgcolor=""><tr><td><font face="Times New Roman" color="white" size="3">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Admass University of Collage Distance Eduction Office All Right are Reservd &copy; 2010 E.C. 
 &nbsp; &nbsp; &nbsp; &nbsp;
</font></td></tr></table>
</td>
</tr>
</table>
</body>
</html>
