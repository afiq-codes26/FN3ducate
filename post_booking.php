<html>
<link rel="stylesheet" href="forms.css">
<body>
<table>
<?php
	session_start();
	include("connection.php");
?>

<link rel="stylesheet" href="forms.css">

<body>
<center>
<caption><h2>YOUR BOOKING IS SUCCESSFUL</h2>
<h4>here are the details of your booking,please be present to avoid any problems</h4></caption>

<table>
<?php 
	$Student_ID=$_SESSION['Student_ID'];
	$sql = "select * from booking_db
        join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
        JOIN tutor_db on booking_db.Tutor_ID = tutor_db.Tutor_ID
        join allocation_db on booking_db.Allocation_ID = allocation_db.Allocation_ID
		join student_db on booking_db.Student_ID = student_db.Student_ID
        where booking_db.Student_ID = '$Student_ID'
		ORDER BY booking_db.Booking_ID DESC
        limit 1";
      
        $data = mysqli_query($connection, $sql);
        
        if (!$data) {
        // If there's an error in the SQL query, display an error message
      echo "Error: " . mysqli_error($connection);
      } else {
      // If the query executed successfully, proceed with fetching and displaying the data
      while ($result = mysqli_fetch_assoc($data)) {
        echo "<tr>". $result['Subject_Name'] ."</tr>
        <br>
        <tr>" . $result['Tutor_Name'] . "</tr>
        <br>
		<tr>" . $result['Timeslot'] . "</tr>
		<br>
		<tr>" . $result['Booking_Date'] . "</tr>";

      }
    }
    ?>
</table>	
</center>
</body>

