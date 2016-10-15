

<?php
$servername = "localhost";//PHP Connect to MySQL
$username = "root";
$password = "root";
$dbname = "fitness-member";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";//PHP Insert Data Into MySQL
// move db connection into own file
?>