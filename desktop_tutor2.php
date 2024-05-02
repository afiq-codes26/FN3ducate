<?php 	
	session_start();
	include 'connection.php';
	include 'top_page.php';
	$Tutor_Name = $_SESSION["Name"];
    $Tutor_ID = $_SESSION["Username"];
?>
<link rel="stylesheet" href="top_page.css">


<body>

	<table>
	<h2>Classes</h2>
    
	</table>
	<div class="class">
		<?php
				$Tutor_ID = $_SESSION["Username"];
				
				$sql = "select * from booking_db
				join subject_db on booking_db.Subject_ID = subject_db.Subject_ID
				JOIN tutor_db ON booking_db.Tutor_ID = tutor_db.Tutor_ID
				join allocation_db on booking_db.Allocation_ID = allocation_db.Allocation_ID
				where booking_db.Tutor_ID = '$Tutor_ID'";
			
			  $data = mysqli_query($connection, $sql);
			  
			  if (!$data) {
				// If there's an error in the SQL query, display an error message
			echo "Error: " . mysqli_error($connection);
			} else {
			// If the query executed successfully, proceed with fetching and displaying the data
			while ($result = mysqli_fetch_array($data)) {
				echo "<tr><td>". $result['Subject_Name'] ."</td>
				<br>
				<td>" . $result['Tutor_Name'] . "</td>
				<br></tr>
				";

			}
		}
		?>
		
				<button class="classes"><a href="class.php">Enter class</a></button>
		
			
		</div>

</body>	









