<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  <script>if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}</script>   
</head>
<style>
    header{
        padding: 5px 10px;
        background-color: red;
    }
    h1{
        text-align: center;
        color: aliceblue;
    }
    div{
        text-align: left;
    }
    ul{
        background-color: green;
        padding: 20px 100px;
    }
    ul li {
        padding: 5px 10px ;
        display: flex;
        display: inline;
        font-size: 18px;
        background-color: blue;
        border-radius: 20px;
    }
    ul li a{
        text-decoration: none;
        color: white;
        padding: 5px 10px ;
    }
    .count{
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    
</style>
<body>
    <header>
        <h1>ATTENDANCE MANAGEMENT SYSTEM!</h1>
    </header>
    
    <div>
    <ul>
            <li><a href="http://localhost/Student/addAttendance.php">ATTENDANCE</a></li>
            <li><a href="http://localhost/Student/SmartAttendanceSheet.php">ATTENDANCE SHEET</a></li>
            <li><a href="http://localhost/Student/addingStudents.php">ADD STUDENTS</a></li>
            <li><a href="http://localhost/Student/showrecord.php">SHOW RECORD</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
    
</body>
</html>
<table border="1" cellspacing="0" class="count">
    <form method="POST">
        <tr>
            <th>Student Name</th>
            <th> P </th>
            <th> A </th>
            <th> L </th>
            <th> H </th>
        </tr>
        <?php
            require_once("config.php");
            $fetchingStudents = mysqli_query($db, "SELECT * FROM attendance_students") OR die(mysqli_error($db));
            while($data = mysqli_fetch_assoc($fetchingStudents))
            {
                $student_name = $data['student_name'];
                $student_id = $data['id'];
        ?>
                <tr>
                    <td><?php echo $student_name; ?></td>
                    <td> <input type="checkbox" name="studentPresent[]" value="<?php echo $student_id; ?>" /></td>
                    <td> <input type="checkbox" name="studentAbsent[]" value="<?php echo $student_id; ?>" /></td>
                    <td> <input type="checkbox" name="studentLeave[]" value="<?php echo $student_id; ?>" /></td>
                    <td> <input type="checkbox" name="studentHoliday[]" value="<?php echo $student_id; ?>" /></td>
                </tr>
        <?php

            }
            $date = date("Y-m-d");
        ?>
        <tr>
            <td> Today </td>
            <td colspan="4"> <input  type="date" name="selected_date" hidden /><?php echo $date ?></td>
        </tr>
        <tr>
            <th colspan="5"> <input type="submit" name="addAttendanceBTN" /></th>
        </tr>
    </form>
</table>


<?php 
    if(isset($_POST['addAttendanceBTN']))
    {
        date_default_timezone_set("Asia/Karachi");

        // Date Logic Starts 
        if($_POST['selected_date'] == NULL)
        {
            $selected_date = date("Y-m-d");
        }else {
            $selected_date = $_POST['selected_date'];
        }
        // Date Logic Ends
        $attendance_month = date("M", strtotime($selected_date));
        $attendance_year = date("Y", strtotime($selected_date));

        if(isset($_POST['studentPresent']))
        {
            $studentPresent = $_POST['studentPresent'];
            $attendance = "P";

            foreach($studentPresent as $atd)
            {
                mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('" . $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") OR die(mysqli_error($db));
            }

        }

        if(isset($_POST['studentAbsent']))
        {
            $studentAbsent = $_POST['studentAbsent'];
            $attendance = "A";

            foreach($studentAbsent as $atd)
            {
                mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('" . $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") OR die(mysqli_error($db));
            }
        }

        if(isset($_POST['studentLeave']))
        {
            $studentLeave = $_POST['studentLeave'];
            $attendance = "L";

            foreach($studentLeave as $atd)
            {
                mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('" . $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") OR die(mysqli_error($db));
            }
        }

        if(isset($_POST['studentHoliday']))
        {
            $studentHoliday = $_POST['studentHoliday'];
            $attendance = "H";

            foreach($studentHoliday as $atd)
            {
                mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('" . $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") OR die(mysqli_error($db));
            }
        }



        echo "Attendance added successfully";

    }
?>






