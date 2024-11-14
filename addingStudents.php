<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    .co{
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        padding: 20px ;
    }
    input{
        font-size:20px;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}</script>
</head>
<body>
    
<form method="POST" class="co">
    <input type="text" name="student_name" placeholder="Student Name" required autofocus />
    <input type="submit" value="Add Student" name="submit">
</form>

<?php 

    if(isset($_POST['submit']))
    {
        require_once("config.php");
        $student_name = $_POST['student_name'];

        $query = "INSERT INTO attendance_students(student_name) VALUE('$student_name')";
        $execQuery = mysqli_query($db, $query) or die(mysqli_error($db));

        echo "Student has been added Successfully!";
    }

?>
</body>
</html>