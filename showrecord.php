<?php


?>
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
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
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
    <form method="POST" class="co">
    <input type="text" name="student_id" placeholder="Student id" required autofocus />
    
    <input type="submit" value="Search" name="submit">
</form>


  

<?php

if(isset($_POST['submit']))
{
   
    require_once("config.php");
    $student_id = $_POST['student_id'];
    

    $query1 ="SELECT * FROM attendance_students WHERE id='$student_id'";

    $query2 ="SELECT * FROM attendance WHERE student_id='$student_id' ";
    $execQuery1 = mysqli_query($db, $query1) or die(mysqli_error($db));
    $execQuery2 = mysqli_query($db, $query2) or die(mysqli_error($db));
    $num1=mysqli_num_rows($execQuery1);
    $num2=mysqli_num_rows($execQuery2);
    
    if($num1<1)
    {
        ?>

    <script>
    alert("no data found");
    </script>
        <?php
    }
    else {
          while($row1=mysqli_fetch_assoc($execQuery1))
           {
            ?>
            <h2> STUDENT INFORMATION</h2>
            <table>
            <th>STUDENT ID</th>
            <th> STUDENT NAME</th>
            <tr>
            <td><?php echo $row1['id'];?></td>
            <td><?php echo $row1['student_name'];?></td>
            </tr>
            </table>
        
            <?php
              }
          }
          ?>
          <h2> ATTENDANCE TABLE</h2>

<table>
  <tr>
    
    <th>DATE</th>
    <th>ATTENDANCE</th>
  </tr>
          <?php
          if($num2<1)
    {
        ?>

        <tr>
        <td>no record found</td>
        </tr>

        <?php
    }
    else{
        while($row2=mysqli_fetch_assoc($execQuery2))
           {
            ?>
          
            <td><?php echo $row2['curr_date']?></td>
            <td><?php echo $row2['attendance']?></td>
          </tr>
           
        
            <?php
              }

            

    }

    ?>
    </table>
    <?php
    
    
    
}

?>

</body>
</html>
