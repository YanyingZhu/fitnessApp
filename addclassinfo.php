<?php


$servername = "localhost";//PHP Connect to MySQL
$username = "root";
$password = "root";
$dbname = "fitness-member";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";//PHP Insert Data Into MySQL

$classname = $_POST['classname'];

$sql = "INSERT INTO classinfo (classname)
VALUES ('$classname')";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet"  href="css/index.css">
    <title>classApp class Form</title>

    

  </head>

  <body>
    <?php include 'nav.php' ?>
    <div class="container">
      <div class="starter-template">
      <?php
        if ($conn->query($sql) === TRUE) {
            echo "<h1>New record created successfully</h1> <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      ?>


      Classname: <?php echo $classname ?><br>
     

    </div>
  </body>
</html>