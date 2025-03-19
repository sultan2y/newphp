<?php
include("connection.php");
session_start();

// Check if the user is logged in
if (isset($_SESSION['User_Id'])) {
    $mail = $_SESSION['User_Id'];
} else {
    echo "<script>
            alert('You are not logged in! Please login to access this page');
            window.location = 'login.php';
          </script>";
    exit();
}
?>

<html>
<head>
    <link style="text/css" href="3.css" rel="stylesheet">
    <script language="javascript">
        function check() {
            if (document.getElementById("fname").value == "") {
                alert("Enter your first name!!");
                document.getElementById("fname").focus();
                return false;
            }
            if (document.getElementById("mname").value == "") {
                alert("Enter your middle name!!");
                document.getElementById("mname").focus();
                return false;
            }
            if (document.getElementById("lname").value == "") {
                alert("Enter your last name!!");
                document.getElementById("lname").focus();
                return false;
            }
            if (document.getElementById("studid").value == "") {
                alert("Enter your student ID!!");
                document.getElementById("studid").focus();
                return false;
            }
            if (document.getElementById("dept").value == "") {
                alert("Select your department!!");
                document.getElementById("dept").focus();
                return false;
            }
            if (document.getElementById("sems").value == "") {
                alert("Select your semester!!");
                document.getElementById("sems").focus();
                return false;
            }
            if (document.getElementById("year").value == "") {
                alert("Enter your year!!");
                document.getElementById("year").focus();
                return false;
            }
            if (document.getElementById("cname").value == "") {
                alert("Enter your course name!!");
                document.getElementById("cname").focus();
                return false;
            }
            if (document.getElementById("ccode").value == "") {
                alert("Enter your course code!!");
                document.getElementById("ccode").focus();
                return false;
            }
            if (document.getElementById("credit_hour").value == "") {
                alert("Select your credit hour!!");
                document.getElementById("credit_hour").focus();
                return false;
            }
            if (document.getElementById("prrqust").value == "") {
                alert("Enter your request!!");
                document.getElementById("prrqust").focus();
                return false;
            }
        }
    </script>
</head>
<body bgcolor="white">
    <table align="center" width="1000px" bgcolor="white">
        <tr>
            <td height="20px" colspan="4">
                <img src="2.jpg" width="120px" height="50">
                <img src="ima/c12.png" width="1000px" height="50">
                <img src="2.jpg" width="120px" height="50">
            </td>
        </tr>
        <tr>
            <td height="20px" colspan="3" bgcolor="#737CA1">
                <div id="dropdown">
                    <ul>
                        <li><a href="student.php">&nbsp;&nbsp;Home</a></li>
                        <li><a href="#">Download</a>
                            <ul>
                                <li><a href="download.php">Download Module</a></li>
                                <li><a href="download2.php">Download Assignment</a></li>
                            </ul>
                        </li>
                        <li><a href="assignmentsubmit.php">Upload Assignment</a></li>
                        <li><a href="#">View Basic</a>
                            <ul>
                                <li><a href="info.php">View Announcement</a></li>
                                <li><a href="gpa.php">View Grade</a></li>
                                <li><a href="Viewcurriclum1.php">View Curriculum</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Send Request</a>
                            <ul>
                                <li><a href="Course_Add.php">Course Add</a></li>
                                <li><a href="dropcourse.php">Drop Course</a></li>
                            </ul>
                        </li>
                        <li><a href="feedback3.php">Give Comment</a></li>
                        <li><a href="changepassword4.php">Change Password</a></li>
                        <li><a href="logout.php" id="login">Logout (<?php echo "Hi&nbsp;&nbsp;&nbsp;".$_SESSION['b']; ?>)</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr>
            <td bgcolor="WHITE" height="520">
                <center>
                    <table bgcolor="gray">
                        <?php
                        if (isset($_POST['submit'])) {
                            $e = $_POST['dept'];
                            $f = $_POST['sems'];
                            $g = $_POST['year'];
                            $h = $_POST['cname'];
                            $i = $_POST['ccode'];
                            $j = $_POST['prrqust'];
                            $addc = $_POST['accode'];
                            $addn = $_POST['adcname'];

                            // Fetch the start and end date for the selected semester
                            $select = "SELECT start_date, end_date FROM date WHERE semister = '$f'";
                            $ttt = mysqli_query($connection, $select) or die(mysqli_error($connection));
                            while ($row = mysqli_fetch_array($ttt)) {
                                $date1 = $row['start_date'];
                                $date2 = $row['end_date'];
                            }

                            $current_date = date('Y-m-d');

                            if ($current_date >= $date1 && $date2 >= $current_date) {
                                // Check if the course code exists in the database
                                $select1 = "SELECT credit_hour, course_code FROM student_course WHERE course_code = '$i'";
                                $result1 = mysqli_query($connection, $select1);
                                if (mysqli_num_rows($result1) > 0) {
                                    while ($row = mysqli_fetch_array($result1)) {
                                        $course_code = $row['course_code'];
                                        $credit_hour = $row['credit_hour'];
                                    }

                                    // Calculate total credit hours for the student
                                    $select2 = "SELECT credit_hour FROM student_course WHERE stud_id = '$_SESSION[a]' AND year = '$g' AND semister = '$f'";
                                    $result2 = mysqli_query($connection, $select2);
                                    $totalcredithour = 0;
                                    while ($row = mysqli_fetch_array($result2)) {
                                        $credit = $row['credit_hour'];
                                        $totalcredithour += $credit;
                                    }

                                    $totalcredithour1 = $totalcredithour - $credit_hour;

                                    // Check grade and add course if needed
                                    $select2 = "SELECT grade FROM result WHERE stud_id = '$_SESSION[a]' AND course_code = '$addc'";
                                    $result2 = mysqli_query($connection, $select2);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row = mysqli_fetch_array($result2)) {
                                            $grade = $row['grade'];
                                        }

                                        if ($grade == 'F') {
                                            $select1 = "SELECT * FROM student_course WHERE course_code = '$addc'";
                                            $result1 = mysqli_query($connection, $select1);
                                            if (mysqli_num_rows($result1) > 0) {
                                                while ($row = mysqli_fetch_array($result1)) {
                                                    $course_code1 = $row['course_code'];
                                                    $credit_hour1 = $row['credit_hour'];
                                                }

                                                $totalcredithour2 = $credit_hour1 + $totalcredithour1;

                                                if ($totalcredithour2 < 22) {
                                                    // Insert new course
                                                    $res = mysqli_query($connection, "INSERT INTO acourse (stud_id, dept, semister, year, course_name, course_code, request) VALUES ('$_SESSION[a]', '$e', '$f', '$g', '$addn', '$addc', '$j')");
                                                    if ($res) {
                                                        echo "<font color='green' size='5px'><center>Successfully Added Course</center></font>";
                                                    } else {
                                                        echo "<font color='red' size='5px'><center>Failed to Add Course</center></font>";
                                                    }

                                                    // Add to dropped course table
                                                    $res = mysqli_query($connection, "INSERT INTO dcourse (stud_id, dept, semister, year, course_name, course_code, request) VALUES ('$_SESSION[a]', '$e', '$f', '$g', '$addn', '$addc', '$j')");
                                                } else {
                                                    echo "<font color='red' size='5px'><center>You can't register for more than 22 credit hours.</center></font>";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </table>
                </center>
            </td>
        </tr>
    </table>
</body>
</html>
