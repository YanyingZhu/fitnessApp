<?php
include 'dbConnection.php';
$sql = "SELECT
  customer.ID as customer_ID, firstname, lastname, gender, occupation, email, phone, address, city, zip, state,
  classinfo.ID as classinfo_ID, classname
  FROM customer JOIN classinfo ON customer.classID = classinfo.ID";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet"  href="css/index.css">

    
    <title>Fitness class Form</title>

    

  </head>

  <body>
   <?php include 'nav.php' ?>
    <div class="formpart">
      <h2>Please Enter</h2>
      <h3><a href="classForm.php">Add a Fitness Class</a></h3>
      <h3><a href="customerForm.php">Add a Customer</a></h3>

    </div>
    <div class="formlist">

      <?php
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo $row['firstname'] . " | " . $row['lastname'] . " | " . $row['gender'] .
              " | " . $row['occupation'] . " | " . $row['email'] . " | " . $row['phone'] .
               " | " . $row['address'] . " | " . $row['city']. " | " . $row['zip']. " | " . $row['state']. " | " . $row['classname'].
               " | <a href=deletecustomer.php?customer_ID=" . $row['customer_ID']  ."> delete</a>" .
               " | <a href=customerForm.php?customer_ID=" . $row['customer_ID']  ."> update</a>" . "<br>";
          }
      }
      ?>
    </div>
  </body>
</html>