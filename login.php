<?php
session_start();
include('connection.php');
include('top_page_singup.php');

if(isset($_POST['submit'])){
    $userid = $_POST["username"];
    $password = $_POST["password"];

    $jumpa = FALSE;
    if($jumpa == FALSE ){
        $sql= "SELECT * FROM student_db";
        $result = mysqli_query($connection,$sql);
        while($student = mysqli_fetch_array($result)) {
            if($student["Student_ID"] == $userid && $student["Password_Stud"] == $password) {
                $jumpa = TRUE;
                $_SESSION['username'] = $student["Student_ID"];
                $_SESSION['name'] = $student["Student_Name"];
                $_SESSION['status'] = 'student';
                break;
            }
        }
    }

    if($jumpa == FALSE){
        $sql = "SELECT * FROM tutor_db";
        $result = mysqli_query($connection,$sql);
        while($tutor = mysqli_fetch_array($result)){
            if($tutor["Tutor_ID"] == $userid && $tutor["Password_Tut"] == $password){
                $jumpa = TRUE;
                $_SESSION['Username'] = $tutor["Tutor_ID"];
                $_SESSION['Name'] = $tutor["Tutor_Name"];
                $_SESSION['status'] = 'tutor';
                break;
            }
        }
    }

    if($jumpa == TRUE){
        if($_SESSION['status'] == 'student')
            header("Location: dashboard.php");
        else if ($_SESSION['status'] == 'tutor')
            header("Location: desktop_tutor.php");
    }
    else {
        echo "<script>alert('error on username or password'); window.location='login.php'</script>";
    }
}
?>


<html>
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="style/forms.css">
<link rel="stylesheet" href="main.css">

<body>
<center>
<img src='picture/1.png'><br>
<img src='picture/2.png'>
<section class="form">
<body>
    <form class="simple" action="login.php" method="post">
        <table>
            <tr>
                <td><input type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
        </table>
        <section class="register">
            <button class="login" type="submit" name="submit">LOGIN</button>
        </section>
        <a href="signup.php" class="bttn-rgstr">
                Don't have an account?<br>
                Register now.
            </button>
        <a href="main_page.php" class="forgot">
            Forgot password?
        </a>
    </form>
</body>
</html>
</section>
</body>
</html>