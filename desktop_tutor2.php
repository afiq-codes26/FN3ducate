<?php 	
	session_start();
	include ('connection.php');
	include ('sidebar.php');
	$Tutor_Name = $_SESSION["Name"];
    $Tutor_ID = $_SESSION["Username"];
?>
<link rel="stylesheet" href="style/class.css">
<title>Tutor Classes</title>
<center>
<body>
	<section class="class-container">
		<h2>Classes</h2>
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
					echo "<tr><div class='container'><div><td>". $result['Subject_Name'] ."</td>
					<br>
					<td><div><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background='new 0 0 32 32' height='32px' id='Layer_1' version='1.1' viewBox='0 0 32 32' width='32px' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><g><polyline fill='none' points='   649,137.999 675,137.999 675,155.999 661,155.999  ' stroke='#FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='2'/><polyline fill='none' points='   653,155.999 649,155.999 649,141.999  ' stroke='#FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='2'/><polyline fill='none' points='   661,156 653,162 653,156  ' stroke='#FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='2'/></g><path d='M21.947,16.332C23.219,14.915,24,13.049,24,11c0-4.411-3.589-8-8-8s-8,3.589-8,8s3.589,8,8,8  c1.555,0,3.003-0.453,4.233-1.224c4.35,1.639,7.345,5.62,7.726,10.224H4.042c0.259-3.099,1.713-5.989,4.078-8.051  c0.417-0.363,0.46-0.994,0.097-1.411c-0.362-0.416-0.994-0.46-1.411-0.097C3.751,21.103,2,24.951,2,29c0,0.553,0.448,1,1,1h26  c0.553,0,1-0.447,1-1C30,23.514,26.82,18.615,21.947,16.332z M10,11c0-3.309,2.691-6,6-6s6,2.691,6,6s-2.691,6-6,6S10,14.309,10,11z '/></svg>" . $result['Tutor_Name'] . "</div></td>
					</div><button class='classes'><a href='class.php'>Enter class</a></button>
					<br></div></tr>
					";
	
				}
			}
			?>
		
				
			</div>
	</section>

</body>	
</center>








