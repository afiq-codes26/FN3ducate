<?php 
    include('sidebar_student.php');
    session_start();
    include('connection.php');

    $Student_Name = $_SESSION["name"];
    $Student_ID = $_SESSION["username"];
      

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style/dashboard.css">
<title>Dashboard</title>
<center>
<body>
    <section class="dashboard">
        <section class="hello">
            <div class="profile">
                <div class="words">
                    <h1>Welcome, FN3rds !</h1>
                    <p>Let's get into today's lessons!</p>
                </div>
                <?xml version="1.0" ?><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#101820;}</style></defs><title/><g data-name="Layer 19" id="Layer_19"><path class="cls-1" d="M16,17a8,8,0,1,1,8-8A8,8,0,0,1,16,17ZM16,3a6,6,0,1,0,6,6A6,6,0,0,0,16,3Z"/><path class="cls-1" d="M23,31H9a5,5,0,0,1-5-5V22a1,1,0,0,1,.49-.86l5-3a1,1,0,0,1,1,1.72L6,22.57V26a3,3,0,0,0,3,3H23a3,3,0,0,0,3-3V22.57l-4.51-2.71a1,1,0,1,1,1-1.72l5,3A1,1,0,0,1,28,22v4A5,5,0,0,1,23,31Z"/></g></svg>
            </div>
            <div class="container-top">
                <div class="search">
                    <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3  c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2  c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2  c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"/></svg>
                    <p>Search anything...</p>
                </div>
                <div class="subjects-taken">
                    <h2>5</h2>
                    <h3>Subject <br>taken</h3>
                </div>
            </div>
        </section>
        <section class="subjects">
            <div class="container1">
                <div class="container2">
                    <h2>Your subjects :</h2>
                    <div class="menu">
                        <a href="dashboard.php">All Courses</a>
                        <a href="schedule.php">Schedule</a>
                    </div> 
                    <div class="table">
                        <table class="classes">
                        <?php
                            $student_id = $_SESSION["username"];
                            $sql = "select * from booking_db
                                join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
                                JOIN tutor_db ON booking_db.Tutor_ID = tutor_db.Tutor_ID
                                where booking_db.Student_ID = '$student_id'
                                limit 3";
                            $data = mysqli_query($connection, $sql);
                            
                            while ($result = mysqli_fetch_array($data)){
                            
                            echo "
                            <div><span class='li-sub'>". $result["Subject_Name"] ."</span><br><span>". $result["Tutor_Name"] ."</span></div>";
                            }   
            
                        ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="book-container">
                <h2>Class booking</h2>
                <div class="book">
                    <p>Learn even more<span><br>Book your class now!</p>
                    <a href = 'booking.php'> Book now</a>
                </div>
                <h2>Assignments</h2>
                <div class="assignment">
                    <p><li>Calculus 2 work by Sir Aiman</li></p>
                    <p><li>Project Based Learning for Biology</li></p>
                    <p><li>Continous Quiz for Physics</li></p>
                </div>
            </div>

</section>
        

</section>  
</center>
</body>
</html>