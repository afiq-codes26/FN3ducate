<?php
    include("connection.php");
    include("top_page.php");

    if (isset($_POST["submit"])){
        $tutor_id = $_POST["Tutor_ID"];
        $timeslot_code = $_POST["Timeslot_Code"];
        $type = $_POST["Type"]; 
        
        $sql = "INSERT INTO allocation_db (Tutor_ID, Timeslot_Code, Type) VALUES('$tutor_id', '$timeslot_code', '$type');";
        $result = mysqli_query($connection, $sql);
        
        if ($result == TRUE){
            echo "<br><center> Timeslot successfully allocated! Please recheck your schedule! </center>";
        }
        else {
            echo "<br><center> Error Occurred! $sql <br> ".mysqli_error($connection)." </center>";
        }
    }
?>

<link rel="stylesheet" href="forms.css">
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="main.css">


<center>
	<section class = "form">
    <form class="simple" action="allocation.php" method="post"> 
	<h1> Timeslot Allocation </h1>
        <table>
            <tr>
                <td> Tutor ID: </td>
                <td> <input required type="text" name="Tutor_ID"> </td>
            </tr>
            <tr>
                <td> Timeslot: </td>
                <td> 
                    <select name="Timeslot_Code" id="timeslot_code">
                        <?php
                            $sql = "SELECT * FROM timeslot_db";
                            $data = mysqli_query($connection, $sql);
                            while ($code = mysqli_fetch_array($data)){
                                echo "<option value='$code[Timeslot_Code]'>$code[Timeslot]</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Type of Class: </td>
                <td> 
                    <select name="Type">
                        <option value="Personal"> Personal Lesson </option>
                        <option value="Grouped"> Grouped Lesson </option>
                    </select>
                </td>
            </tr>
        </table>
        <button class="Add" type="submit" name="submit"> Submit! </button>
    </form>
	</section>
    <br>
</center>

<script>
    // Function to fetch and display timeslots based on selected timeslot code
    document.getElementById('timeslot_code').addEventListener('change', function()) {
        var selectedCode = this.value;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('timeslot_time').innerHTML = this.responseText;
            }
        };
        xhr.open("GET", "get_timeslot.php?code=" + selectedCode, true);
        xhr.send();
    });
</script>




