<?php
include("connection.php");  
session_start();
?>

<html>
<head>
<link style="text/css" href="3.css" rel="stylesheet">
<script language="javascript">
  function check()
  {
   if(document.getElementById("txt_username").value == "")
   {
    alert("please Enter User name !!");
    document.getElementById("txt_username").focus();
    return false;
   }
        if(document.getElementById("txt_password").value =="")
   {
    alert('Please Enter your password !!');
    document.getElementById("txt_password").focus();
    return false;
   }
   return true;}
</script>
</head>
<body>
<table align=center width=1000px height= border="" bgcolor=white>
<tr>
<td height=20px  colspan=4>
<img src="2.jpg" width="120px" height="50" ><img src="ima/c12.png" width="1000px" height="50" ><img src="2.jpg" width="120px" height="50" >
</td>
</tr>
<tr>
<td  height=20px colspan=3 bgcolor=#737CA1 >
  <div id="dropdown">
   <li><a href="index.php">Home</a></li>
   <li><a href="About.php">About Us</a></li>
   <li><a href="register.php">Apply</a></li>
  <li><a href="#">Departments</a>
      <ul>
	    <li><a href="Accounting.php">Accounting</a></li>
		<li><a href="Managment.php">Managment</a></li>
		<li><a href="Marketing.php">Marketing Managment</a></li>
		<li><a href="Economics.php">Economics</a></li>		  
		<li><a href="English.php">English</a></li>
        <li><a href="Mathematics.php">Mathematics</a></li>
        <li><a href="Educational.php">Educational Planning managment</a></li>
		</ul>	
	<li><a href="Contact.php">Contact as</a>
	</li>
	<li><a href="feedback.php">Feedback</a>
	</li>
	<li><a href="help.php">Help</a>
	</li>
	</li>
	<li><a href="new1.php">Anounncment</a><li><a href="login.php">Login</a>
	</li>
	</div>	 
    </td>
    </tr>
<tr>
<td  height=250px width=150px bgcolor="#E5E4E2" valign=top>
<table   bgcolor="#E5E4E2" border=0  width="150" height="400" class="menu-bar" align="center">
<tr >
<td width="110" height="20"><b><font color="white">
<tr>
<td width="110" height="20"><b><font color="white">
<a href="dir.php" link="white" >office director </a></font></b></td>
<tr>
 <td width="150" height="20">
 <a href="regulation.php" id="drop"><b>Rule and Regulation</b></a></td>
</tr>
<tr>
<td>
<img src="b3.gif" width="200" height="150">
    </td>
   </tr>
   </table>
</td>
<td style="background-color:;>
<!--------body  ---> 
<script type='text/javascript'>
 function formValidation(){
    //assign the fields     
    var txt_username = document.getElementById('txt_username');	
    var txt_password = document.getElementById('txt_password');
    if(emailValidator(txt_username,"check your e-mail format")){
        if(isAlphanumeric(txt_password,"check your passoword format")){	
            return true;
        }
    }
    return false;		
}
function emailValidator(elem, helperMsg){
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if(elem.value.match(emailExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
</script>
<form action="login.php" method="post" align=top >
<table bgcolor=""  style="  background-color:#E5E4E2; border:1px solid #336699;width:450px;height:190px;border-radius:15px;box-shadow:1px 10px 10px gray" align="center">
<center><image src="aa.jpg" width="250" height="80"></center>
<tr>
<td colspan=2 align=center><b><h3 color="green"> <font size='5px' color="black">First Login </font></h3></b></td>
</tr>
<tr>
<td><font>  </font><font size='5px' color="black"><b>Username:</font></td><td><input type="text" name="mail" value="" size="20%" id="txt_username" placeholder="Username" display="none"></td>
</tr>
<tr>
<td><font>  </font> <font size='5px' color="black"><b>Password:</font></td><td>
<input type="password" name="pass" value="" size="20%" id="txt_password" placeholder="Password"></td>
</tr>
<tr><td colspan=2 align=center><input type='submit' value='login' name='submitMain' Onclick="return check(this.form);" color="white"/>
<input type='reset' value='Reset' color="white"/></td></tr>
</table>	
</form>
<?php
if (isset($_POST['submitMain'])) {
    $user = $_POST['mail'];
    $password = $_POST['pass'];
    $pass = base64_encode($password);
    $query = "SELECT * FROM account WHERE username = '{$user}' AND password = '{$pass}';";
    $result = mysqli_query($conn, $query);
    $rowCheck = mysqli_num_rows($result);
    if ($rowCheck > 0) {
        $row = mysqli_fetch_array($result);
        $_session['a'] = $row['User_id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $account = $row['accounttype'];
        $_session['d'] = $fname;
        $_session['b'] = $account;
        $_session['c'] = $lname;
        if ($row['status'] == 1) {
            echo "<script>window.location='admin.php';</script>";
        } else if ($row['status'] == 2) {
            echo "<script>window.location='registrar.php';</script>";
        } else if ($row['status'] == 3) {
            echo "<script>window.location='Coordinator.php';</script>";
        } else if ($row['status'] == 7) {
            echo "<script>window.location='Instructor.php';</script>";
        } else if ($row['status'] == 10) {
            echo "<script>window.location='DeP-Head.php';</script>";
        } else if ($row['status'] == 6) {
            echo '<meta content="6;student.php" http-equiv="refresh" />';
        } else {
            echo "<p class='wrong'>User Name & Password is not match try again !!</p>";
            echo '<meta content="3;login.php" http-equiv="refresh" />';
        }
    } else {
        echo "<p class='wrong'>User Name & Password is not match try again !!</p>";
        echo '<meta content="3;login.php" http-equiv="refresh" />';
    }
}
mysqli_close($conn);
?>
</td>
<td width=150px>
<table border=0 width=100px height="450" bgcolor=white>
<tr>
<td valign=top bgcolor=white>
<h2><center>
<font color="black" face="monotype corsiva" size="5">wolkite university  distance Office  works for change!!</font><br>
<font color="white"><iframe name="frame" width=350px height=385px src="date.php"></iframe><a></center></h2>
<a href="https://www.facebook.com">  <img src="f.png" width="60" height="25"></a>
<a href="https://www.youtube.com"><img src="y.png" width="60" height="25"></a>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan=3 bgcolor=gray>
<table align="center" bgcolor=""><tr><td><font face="Times New Roman" color="white" size="3">
             
wolkite University of Collage Distance Eduction Office All Right are Reserved © 2010 E.C. 
       
</font></td></tr></table>
</td>
</tr>
</table>
</body>
</html>