<link rel="stylesheet" href="style/schedule.css">
<?php 
 include("connection.php");
 include("sidebar_student.php");
 session_start();
?>
<center>
<section class="schedule">
  <h1> Student's Schedule </h1>
  <div class="placeholder">
    <tr>
      <span>Date</span>
      <span>Time</span>
      <span>Subject</span>
      <span>ID</span>
    </tr>
  </div>
  <div class="table">
    <table>
    <?php
      $student_id = $_SESSION["username"];
      $sql = "select * from booking_db
        join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
        join allocation_db on booking_db.Allocation_ID = allocation_db.Allocation_ID
        where Student_ID = '$student_id' ";
      $data = mysqli_query($connection, $sql);
      
      while ($result = mysqli_fetch_array($data)){
      
      echo "<tr>
          <td> $result[Booking_Date] </td>
          <td> $result[Timeslot] </td>
          <td> $result[Subject_Name] </td>
          <td> $result[Booking_ID] </td>
        </tr>";
      }
    ?>
    </table>
  </div>
</section>

</center>