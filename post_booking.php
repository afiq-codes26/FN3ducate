<?php
  include("sidebar_student.php");
  session_start();
  include("connection.php");
?>

<link rel="stylesheet" href="style/post_booking.css">

<html>
<body>
<section class="main_post">
  <section class="success">
    <center>
    <h2>Your booking is successful!</h2>
    <h4>Here are the details for your booked lesson! Please attend to avoid any further inconveniences! </h4>
    <center>
  </section>
  <section class="table">
  <?php 
    $Student_ID= $_SESSION['Username'];
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
          echo "<div class='class'><svg height='21' viewBox='0 0 21 21' width='21' xmlns='http://www.w3.org/2000/svg'><g fill='none' fill-rule='evenodd' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' transform='translate(3 3)'><path d='m14 1c.8284271.82842712.8284271 2.17157288 0 3l-9.5 9.5-4 1 1-3.9436508 9.5038371-9.55252193c.7829896-.78700064 2.0312313-.82943964 2.864366-.12506788z'/><path d='m12.5 3.5 1 1'/></g></svg>" . $result['Subject_Name'] . "</div>";
          echo "<div class='tutor'><svg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'><defs><style>.cls-1{fill:none;}</style></defs><title/><g data-name='Layer 2' id='Layer_2'><path d='M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z'/><path d='M16,17a5,5,0,1,1,5-5A5,5,0,0,1,16,17Zm0-8a3,3,0,1,0,3,3A3,3,0,0,0,16,9Z'/><path d='M25.55,24a1,1,0,0,1-.74-.32A11.35,11.35,0,0,0,16.46,20h-.92a11.27,11.27,0,0,0-7.85,3.16,1,1,0,0,1-1.38-1.44A13.24,13.24,0,0,1,15.54,18h.92a13.39,13.39,0,0,1,9.82,4.32A1,1,0,0,1,25.55,24Z'/></g><g id='frame'><rect class='cls-1' height='32' width='32'/></g></svg>" . $result['Tutor_Name'] . "</div>";
          echo "<div class='time'><svg data-name='Layer 1' id='Layer_1' viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'><path d='M478,256A222,222,0,0,1,99,413,220.55,220.55,0,0,1,34,256H63.92c0,105.91,86.17,192.08,192.08,192.08S448.08,361.91,448.08,256,361.91,63.92,256,63.92A191.8,191.8,0,0,0,116.58,124H175v29.92H70V49H99.93v49.3A221.93,221.93,0,0,1,478,256ZM250,139V280H373V250H280V139Z'/></svg>" . $result['Timeslot'] ."<br>". $result['Booking_Date'] . "</div>";
        }
      }
      ?>
  </section>
  </center> 
  <a class="back" href = "booking.php"> Return to Booking! </a>
  </center>
</section>
</body>