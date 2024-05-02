<link rel="stylesheet" href="top_page.css">
<?php 
 include("connection.php");
 include("top_page.php);
 session_start();
?>
<center>
<h1> Your Schedule: </h1>

<table>
 <tr>
  <td> Booking ID: </td>
  <td> Date: </td>
  <td> Time: </td>
  <td> Subject: </td>
 </tr>
 <?php
 $student_id = $_SESSION["username"];
  $sql = "select * from booking_db
    join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
    join allocation_db on booking_db.Allocation_ID = allocation_db.Allocation_ID
    where Student_ID = '$student_id' ";
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
</center>