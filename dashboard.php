<?php 
session_start();
  include'top_page.php';
  include'connection.php';

    $Student_Name = $_SESSION["name"];
    $Student_ID = $_SESSION["username"]
      

?>



<link rel="stylesheet" href="top_page.css">


<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>
<center>

<h1>Welcome, FN3rds !</h1>
<p>Let's get into today's lessons!</p>
   

<h2>Your subjects :</h2>

<div class="menu">
    <a href="dashboard.php">All Courses</a>
    <a href="schedule.php">Schedule</a>
</div> 
<table>
<?php
	$student_id = $_SESSION["username"];
    $sql = "select * from booking_db
        join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
        JOIN tutor_db ON booking_db.Tutor_ID = tutor_db.Tutor_ID
        where booking_db.Student_ID = '$student_id'
        limit 3";
    $data = mysqli_query($connection, $sql);
     
    while ($result = mysqli_fetch_array($data)){
     
     echo "<tr> $result[Subject_Name] </tr><br>
			<tr> $result[Tutor_Name] </tr><br>";
    }

?>
</table>

<h2>Class booking</h2>
<p>Learn even more</p>
<p>Book your class now!</p>
<button class = 'Link'> <a href = 'booking.php'> Book now</a> </button>
<h2>Assignments</h2>
<p><li>Calculus 2 work by Sir Aiman</li></p>
<p><li>Project Based Learning for Biology</li></p>
<p><li>Continous Quiz for Physics</li></p>

</center>
</body>
</html>