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
    h2{
        text-align: center;
        color: aliceblue;
    }
div{
    width:300px;
	padding: 2rem 1rem;
	margin: 40px auto;
	background-color:green;
	border-radius: 20px;
}
form {
    padding: 40px 0px;
    text-align: center;
}
form input{
	width: 80%;
    outline: none;
    border: 1px solid #fff;
    padding: 12px 20px;
    margin-bottom: 10px;
    border-radius:5px;
    text-align: center;
    font-size:20px;
}
form input[type="submit"]{
	width:50%;
	font-size: 20px;
	padding: 5px 20px;
}
    
</style>

<?php
include('config.php');
session_start();
?>

<?php


// Check if the form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create connection
    $conn = new mysqli("localhost", "root", "", "kumar");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM admin WHERE name=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count < 1) {
        echo "Wrong Username or Password";
    } else {
        $_SESSION['admin'] = $username;
        header("location: SmartAttendanceSheet.php");
        exit; // Terminate script execution after redirection
    }

    $stmt->close();
    $conn->close();
}
?>

<body>
<header>
        <h1>ATTENDANCE MANAGEMENT SYSTEM!</h1>
        <h2>ADMIN LOGIN </h2>
    </header>
  <div>
  <h1>Admin</h1>
    <form method="post" action="" class="chan">
        <input type="text" placeholder="Admin Name" name="username" required>
        <br>
        <br>
        <input type="password" placeholder="Password" name="password" required>
        <br>
        <br>
        <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
