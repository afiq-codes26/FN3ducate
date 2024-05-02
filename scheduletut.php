<?php 
	session_start();
 include("connection.php");
 include("top_page.php");
 
?>

<h1> Tutor Schedule: </h1>

<table>
 <tr>
  <td> Booking ID: </td>
  <td> Date: </td>
  <td> Time: </td>
  <td> Subject: </td>
 </tr>
 <?php
			$Tutor_ID = $_SESSION["Username"];
			  $sql = "select * from booking_db
				join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
				join allocation_db on booking_db.Allocation_ID = allocation_db.Allocation_ID
				where booking_db.Tutor_ID = '$Tutor_ID'
				";
				
			  $data = mysqli_query($connection, $sql);
			  
			  while ($result = mysqli_fetch_array($data)){
			   
			   echo "<tr>
				 <td> $result[Booking_ID] </td>
				 <td> $result[Booking_Date] </td>
				 <td> $result[Timeslot] </td>
				 <td> $result[Subject_Name] </td>
				</tr>";
			  }
		?>
</table>




