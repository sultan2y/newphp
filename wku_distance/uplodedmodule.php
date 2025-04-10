<?php
include("connection.php");  
session_start();

// Check if the user is logged in
if (isset($_SESSION['User_Id'])) {
    $mail = $_SESSION['User_Id'];
} else {
    echo "<script>
            alert('You Are Not Logged In !! Please Login to access this page');
            window.location.href = 'login.php';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Uploaded Module</title>
    <link rel="stylesheet" href="3.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="JS/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/addcurriclum.js"></script>
    <script>
    function check() {
        if (document.getElementById("department").value == "") {
            alert("Select your department !!");
            document.getElementById("department").focus();
            return false;
        }
        if (document.getElementById("course_name").value == "") {
            alert('First Enter your course name!');
            document.getElementById("course_name").focus();
            return false;
        }
        if (document.getElementById("course_code").value == "") {
            alert('First Enter your course code!');
            document.getElementById("course_code").focus();
            return false;
        }
        if (document.getElementById("crdite_houre").value == "") {
            alert('First Enter credit hours in numbers only!');
            document.getElementById("crdite_houre").focus();
            return false;
        }
        if (document.getElementById("Pre_requst").value == "") {
            alert('First enter prerequisites!');
            document.getElementById("Pre_requst").focus();
            return false;
        }
        if (document.getElementById("semister").value == "") {
            alert('First enter semester!');
            document.getElementById("semister").focus();
            return false;
        }
        if (document.getElementById("year").value == "") {
            alert('First enter year!');
            document.getElementById("year").focus();
            return false;
        }
    }
    </script>
</head>
<body>
    <table align="center" width="1000px" border="6">
        <tr>
            <td height="20px" colspan="4">
                <img src="2.jpg" width="120px" height="50" alt="Logo">
                <img src="ima/c12.png" width="1000px" height="50" alt="Banner">
                <img src="2.jpg" width="120px" height="50" alt="Logo">
            </td>
        </tr>
        <tr>
            <td height="20px" colspan="3" bgcolor="#737CA1">
                <div id="dropdown">
                    <ul>
                        <li><a href="Addcurrculm.php" id="drop">Add Curriculum</a></li>
                        <li><a href="Upload.php" id="drop">Upload Module</a></li>
                        <li><a href="#">Assign</a>
                            <ul>
                                <li><a href="assign.php">Assign Instructor</a></li>
                                <li><a href="assigncourse_student.php">Assign Student</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Announcement</a>
                            <ul>
                                <li><a href="new.php">Post Announcement</a></li>
                                <li><a href="new2.php">Delete Announcement</a></li>
                            </ul>
                        </li>
                        <li><a href="#">View</a>
                            <ul>
                                <li><a href="rep11.php">View Report</a></li>
                                <li><a href="viewcomment.php">View Comments</a></li>
                                <li><a href="uplodedmodule.php">Uploaded Module</a></li>
                            </ul>
                        </li>
                        <li><a href="changepassword5.php">Change Password</a></li>
                        <li><a href="logout.php">Logout(<?php echo $_SESSION['a']; ?>)</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr>
            <td valign="top" bgcolor="white">
                <font color="#8A2BE2"><h3 align="center">Delete Uploaded Module</h3></font>
                <?php
                // Using mysqli with prepared statements to avoid SQL injection
                $conn = new mysqli("localhost", "root", "", "your_database_name");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to select modules based on department
                $stmt = $conn->prepare("SELECT * FROM module WHERE department = ?");
                $dept = 'Accounting'; // Change based on your requirements
                $stmt->bind_param("s", $dept);
                $stmt->execute();
                $result = $stmt->get_result();

                echo "<table id='vtable' style='width:500px; border:1px solid #336699; border-radius:10px;' align='center'>
                        <tr>
                            <th bgcolor='#336699'><font color='white' size='2'>Module Name</th>
                            <th bgcolor='#336699'><font color='white' size='2'>Department</th>
                            <th bgcolor='#336699'><font color='white' size='2'>Term</th>
                            <th bgcolor='#336699'><font color='white' size='2'>Year</th>
                            <th bgcolor='#336699'><font color='white' size='2'>Delete</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    $ctrl = $row['modulenum'];
                    echo "<tr>";
                    echo "<td><font size='2'>" . $row['coursename'] . "</td>";
                    echo "<td><font size='2'>" . $row['department'] . "</td>";
                    echo "<td><font size='2'>" . $row['term'] . "</td>";
                    echo "<td><font size='2'>" . $row['year'] . "</td>";
                    echo "<td align='center'><a href='d.php?key=" . $ctrl . "'><img src='remove.png' border='0' title='Delete'></a></td>";
                    echo "</tr>";
                }

                echo "</table>";
                $stmt->close();
                $conn->close();
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" bgcolor="gray">
                <table align="center">
                    <tr>
                        <td><font face="Times New Roman" color="white" size="3">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Admass University of College Distance Education Office. All rights reserved &copy; 2010 E.C.
                        </font></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
