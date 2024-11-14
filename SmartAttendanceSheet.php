<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>if ( window.history.replaceState ) {
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
    h3{
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
    .con{
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    
</style>
<body>
    <header>
        <h1>ATTENDANCE MANAGEMENT SYSTEM!</h1>
        <h3>STUDENTS ATTENDANCE OF MONTH: <u><?php echo strtoupper(date("F")); ?></u></h3>
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
<?php 
    require_once("config.php");

    $firstDayOfMonth =  date("1-m-Y");
    $totalDaysInMonth = date("t", strtotime($firstDayOfMonth));
   
    // Fetching Students 
    $fetchingStudents = mysqli_query($db, "SELECT * FROM attendance_students") OR die(mysqli_error($db));
    $totalNumberOfStudents = mysqli_num_rows($fetchingStudents);

    $studentsNamesArray = array();
    $studentsIDsArray = array();
    $counter = 0;
    while($students = mysqli_fetch_assoc($fetchingStudents))
    {
        $studentsNamesArray[] = $students['student_name'];
        $studentsIDsArray[] = $students['id'];
    }


?>


<table border="" cellspacing="" class="con">
<?php 
    for($i = 1; $i<=$totalNumberOfStudents + 2; $i++)
    {
        if($i == 1)
        {
            echo "<tr>";
            echo "<td rowspan='2'>Student Id</td>";
            echo "<td rowspan='2'>Names</td>";
            for($j = 1; $j<=$totalDaysInMonth; $j++)
            {
                echo "<td>$j</td>";
            }
            echo "</tr>";
        }else if($i == 2)
        {
            echo "<tr>";
            for($j = 0; $j<$totalDaysInMonth; $j++)
            {
                echo "<td>" . date("D", strtotime("+$j days", strtotime($firstDayOfMonth))) . "</td>";
            }
            echo "</tr>";
        }else 
        {
            echo "<tr>";
            echo "<td>" . $studentsIDsArray[$counter] . "</td>";
            echo "<td>" . $studentsNamesArray[$counter] . "</td>";
            for($j = 1; $j<=$totalDaysInMonth; $j++)
            {
                $dateOfAttendance = date("Y-m-$j");
                $fetchingStudentsAttendance = mysqli_query($db, "SELECT attendance FROM attendance WHERE student_id = '". $studentsIDsArray[$counter] ."' AND curr_date = '". $dateOfAttendance ."'") OR die(mysqli_error($db));
                
                $isAttendanceAdded = mysqli_num_rows($fetchingStudentsAttendance);
                if($isAttendanceAdded > 0)
                {
                    $studentAttendance = mysqli_fetch_assoc($fetchingStudentsAttendance);
                    if($studentAttendance['attendance'] == "P")
                    {
                        $color = "blue";
                    }else if($studentAttendance['attendance'] == "A")
                    {
                        $color = "red";
                    }else if($studentAttendance['attendance'] == "H")
                    {
                        $color = "black";
                    }else if($studentAttendance['attendance'] == "L")
                    {
                        $color = "green";
                    }

                    echo "<td style='background-color: $color; color:white'>" . $studentAttendance['attendance'] . "</td>";
                }else {
                    echo "<td></td>";
                }
               

            }
            echo "</tr>";
            $counter++;
        }
    }
?>
</table>