<?php 	
	session_start();
	include 'connection.php';
	include 'sidebar.php';
	$Tutor_Name = $_SESSION["Name"];
    $Tutor_ID = $_SESSION["Username"];
	
	
	$sql = "SELECT * FROM booking_db
			JOIN tutor_db ON tutorsubject_db.Tutor_ID = tutor_db.Tutor_ID
			JOIN tutor_db ON booking_db.Tutor_ID = tutor_db.Tutor_ID
			JOIN subject_db ON tutorsubject_db.Subject_ID = subject_db.Subject_ID";
	
	
			
?>

<link rel="stylesheet" href="style/tutor_dashboard.css">
<title>Tutor Dashboard</title>
<body class="dashboard">
	<section class="tuto-dash">
		<section class="container">
			<div class="intro">
				<h2 class="welcome">Welcome back, <?php echo $Tutor_Name ?>!</h2>
				<p>You can navigate all of your schedules, students, and recently updated notifications here</p>
			</div>
			<div class="img">
				<img src="resources/aaron.jpg">
			</div>
		</section>
		<section class="classes">
			<div class="words">
				<table>
				<h2>Classes</h2>
					<tr>
						<td align="right">
							<button class="desktop_tutor2"><a href="desktop_tutor2.php">View all ></a></button>
						</td>
					</tr>
				</table>
			</div>
			<div class="class-container">
				
				<?php
						$Tutor_ID = $_SESSION["Username"];
						
						$sql = "select * from booking_db
						join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
						JOIN tutor_db ON booking_db.Tutor_ID = tutor_db.Tutor_ID
						join allocation_db on booking_db.Allocation_ID = allocation_db.Allocation_ID
						where booking_db.Tutor_ID = '$Tutor_ID'
						limit 3";
					
						$data = mysqli_query($connection, $sql);
						
						if (!$data) {
						// If there's an error in the SQL query, display an error message
					echo "Error: " . mysqli_error($connection);
					} else {
					// If the query executed successfully, proceed with fetching and displaying the data
					while ($result = mysqli_fetch_array($data)) {
						echo "<tr><div><td><span class='name'>". $result['Subject_Name'] ."</span></td><br>
						<td><span>" . $result['Tutor_Name'] . "</span></div></td></tr>";
			
					}
				}
				?>
			
				
				
			</div>
		</section>
		<section class="schedule">
			<div class="words">
			<table>
			<h2>Schedule</h2>
				<tr>
					<td align="right">
						<button class="desktop_tutor2"><a href="scheduletut.php">View all ></a></button>
					</td>
				</tr>
			</table>
			</div>
			<div class="time">
				<?php
					$sql = "select * from booking_db
					join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
					join allocation_db on booking_db.Allocation_ID = allocation_db.Allocation_ID
					where booking_db.Tutor_ID = '$Tutor_ID'
					limit 3";
					
					$data = mysqli_query($connection, $sql);
					
					while ($result = mysqli_fetch_array($data)){
					
					echo "<tr><div>
						<td> $result[Booking_Date] </td>
					</div></tr>";
					}
					?>
			</div>	
			<br>
		</section>
		<button class="logout"><a href="logout.php">Log Out</a></button>
	</section>
</body>

	

