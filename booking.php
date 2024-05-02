<?php
    include("connection.php");
    include("top_page.php");
    session_start();
    if(isset($_POST["submit"])){
        $student_id = mysqli_real_escape_string($connection, $_POST["Student_ID"]);
        $tutor_id = mysqli_real_escape_string($connection, $_POST["Tutor_ID"]);
        $level_code = mysqli_real_escape_string($connection, $_POST["Level_Code"]);
        $booking_date = mysqli_real_escape_string($connection, $_POST["Booking_Date"]);
        
        // Check if Subject_ID and Allocation_ID are set
        if(isset($_POST["Subject_ID"]) && isset($_POST["Allocation_ID"])){
            $subject_id = mysqli_real_escape_string($connection, $_POST["Subject_ID"]);
            $allocation_id = mysqli_real_escape_string($connection, $_POST["Allocation_ID"]);
            
            // Validate Allocation_ID existence
            $allocation_check_query = "SELECT * FROM allocation_db WHERE Allocation_ID = '$allocation_id'";
            $allocation_result = mysqli_query($connection, $allocation_check_query);
            if(mysqli_num_rows($allocation_result) == 0){
                echo "<br><center> Error: Invalid Allocation ID! </center>";
                exit(); // Stop further execution
            }
            
            $sql = "INSERT INTO booking_db (Student_ID, Tutor_ID, Level_Code, Subject_ID, Allocation_ID, Booking_Date) VALUES ('$student_id', '$tutor_id', '$level_code', '$subject_id', '$allocation_id', '$booking_date')";
        } else {
            echo "<br><center> Error: Subject ID or Allocation ID not provided! </center>";
            exit(); // Stop further execution
        }
        
        $result = mysqli_query($connection, $sql);
        
        if ($result == TRUE){
            echo "<br><center> Booking Successful! Please recheck your schedule! </center>";
        }
        else {
            echo "<br><center> Error Occurred! ".mysqli_error($connection)." </center>";
        }
    }
?>
<head>
<title> FN3Ducate: Student Booking </title>
<style>
	.dropdown-button {
		appearance: none;
		-webkit-appearance: none;
		-moz-appearance: none;
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 5px;
		padding: 8px 16px;
		font-size: 14px;
		cursor: pointer;
	}

	.dropdown-button:hover {
		background-color: #f0f0f0;
	}

	.dropdown-button:focus {
		outline: none;
		border-color: #999;
	}

	.dropdown-button option {
		padding: 8px 16px;
		font-size: 14px;
	}  
</style>
</head>
<link rel = "stylesheet" href = "forms.css">
<link rel = "stylesheet" href = "button.css">
<link rel = "stylesheet" href = "main.css">
<div class = "booking">


<center>
<section class = "form">
<form class = "simple" action = "booking.php" method = "post">
	<h1> Class Booking </h1>
	<table>
		<tr>
			<td> Student ID: </td>
			<td> <input required type = "text" name = "Student_ID"> </td>
		</td>
		</tr>
		
		<tr>
			<td> Subject: </td>
			<td>
			<select name="Subject_ID" id="subject_select" class="dropdown-button" onchange="updateTutorsAndAllocations()">
				<option value="">Select Subject</option>
				<?php
					$sql = "SELECT * FROM subject_db";
					$data = mysqli_query($connection, $sql);
					while ($code = mysqli_fetch_array($data)){
						echo "<option value='$code[Subject_ID]'>$code[Subject_Name]</option>";
					}
				?>
			</select>
			</td>
		</tr>

		<tr>
			<td> Tutor: </td>
			<td>
				<select name="Tutor_ID" id="tutor_select" class="dropdown-button" onchange="fetchAllocations(this.value)">
				<option value="">Select Tutor</option>
				</select>
			</td>
		</tr>

		<tr>
			<td> Timeslot Allocation: </td>
			<td>
				<select name="Allocation_ID" class="dropdown-button">
				<option value="">Select Timeslot</option>
				<?php
					$sql = "SELECT * FROM allocation_db
							join timeslot_db on allocation_db.Timeslot_Code = timeslot_db.Timeslot_Code";
					$data = mysqli_query($connection, $sql);
					while ($code = mysqli_fetch_array($data)){
						echo "<option value='$code[Allocation_ID]'>$code[Timeslot]</option>";
					}
				?>
				
				</select>
			</td>
		</tr>
		
		<tr>
				<td> Level: </td>
				<td> 
					<select name="Level_Code">
						<?php
							$sql = "SELECT * FROM level_db";
							$data = mysqli_query($connection, $sql);
							while ($code = mysqli_fetch_array($data)){
								echo "<option value='$code[Level_Code]'>$code[Student_Level]</option>";
							}
						?>
					</select>
				</td>
		</tr>
		
		<tr>
			<td> Date Selection: </td>
			<td>
			<input type="date" name="Booking_Date" placeholder = "Date of Class" min="2023-01-01" max="2025-12-31">
			</td>
		</tr>
	</table>
	<button class="Add" type="submit" name="submit"> Submit! </button>
	</form> 
</section>
</section>
<br>
</center>

<script>
    function updateTutorsAndAllocations() {
        var subjectID = document.getElementById("subject_select").value;
        if (subjectID !== "") {
            fetchTutors(subjectID);
            // Since we need the tutor ID to fetch allocations, clear the allocations dropdown when updating tutors
            clearDropdown("allocation_select");
        } else {
            clearDropdown("tutor_select");
            clearDropdown("allocation_select");
        }
    }

    function fetchTutors(subjectID) {
        fetch('get_tutors.php?subject_id=' + subjectID)
            .then(response => response.json())
            .then(data => {
                var tutorSelect = document.getElementById("tutor_select");
                tutorSelect.innerHTML = '<option value="">Select Tutor</option>';
                data.forEach(tutor => {
                    tutorSelect.innerHTML += '<option value="' + tutor.Tutor_ID + '">' + tutor.Tutor_Name + '</option>';
                });
            });
    }

    function fetchAllocations(tutorID) {
        if (tutorID !== "") {
            fetch('get_allocations.php?tutor_id=' + tutorID)
                .then(response => response.json())
                .then(data => {
                    var allocationSelect = document.getElementById("allocation_select");
                    allocationSelect.innerHTML = '<option value="">Select Timeslot</option>';
                    data.forEach(allocation => {
                        allocationSelect.innerHTML += '<option value="' + allocation.Allocation_ID + '">' + allocation.Timeslot + '</option>';
                    });
                });
        } else {
            clearDropdown("allocation_select");
        }
    }

    function clearDropdown(dropdownID) {
        document.getElementById(dropdownID).innerHTML = '<option value="">Select</option>';
    }
</script>




