<?php
// Assuming connection.php is included to establish database connection
include("connection.php");
// Check if subject_id is set and not empty
if(isset($_GET['subject_id']) && !empty($_GET['subject_id'])) {
    // Sanitize input
    $subject_id = mysqli_real_escape_string($connection, $_GET['subject_id']);
    
    // Query to fetch tutors based on subject
    $query = "SELECT * FROM tutorsubject_db WHERE Subject_ID = '$subject_id'";
    $result = mysqli_query($connection, $query);
    
    // Check if there are results
    if(mysqli_num_rows($result) > 0) {
        $tutors = array();
        while($row = mysqli_fetch_assoc($result)) {
            // Add tutors to the array
            $tutors[] = $row;
        }
        // Output tutors as JSON
        echo json_encode($tutors);
    } else {
        // No tutors found for the subject
        echo json_encode(array('message' => 'No tutors found for the selected subject.'));
    }
} else {
    // Invalid request
    echo json_encode(array('message' => 'Invalid request.'));
}
?>