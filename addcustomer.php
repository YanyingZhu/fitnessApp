<?php
include 'dbConnection.php';

$classID = $_POST['classID']; 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$occupation = $_POST['occupation'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address= $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$state = $_POST['state'];

//Check if a beer_id was provided if so, we're updating a beer, otherwise we're inserting

if (isset($_POST['customer_ID'])) 
{
  $customer_ID = $_POST['customer_ID']; 

  $sql =  "UPDATE customer SET firstname='$firstname', lastname='$lastname', gender = '$gender', occupation='$occupation', email = '$email', phone = '$phone', address = 'address', city = 'city', zip = 'zip', state = 'state'
  WHERE id = $customer_ID"; 
} else {
  $sql = "INSERT INTO customer (classID, firstname, lastname, gender, occupation, email, phone, address, city, zip, state)
  VALUES ('$classID','$firstname','$lastname','$gender','$occupation','$email','$phone','$address','$city','$zip','$state')";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet"  href="css/index.css">
    <title>customerApp customer Form</title>



  </head>

  <body>
    <?php include 'nav.php' ?>
    <div class="container">
      <div class="starter-template">

      <?php
      if ($conn->query($sql) === TRUE) {
          echo "<h2 class='form-signin-heading''>New record created successfully</h2> <br>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
       ?>

      customer-firstname: <?php echo $firstname ?><br>
      customer-lastname: <?php echo $lastname ?><br>
      gender: <?php echo $gender ?><br>
      occupation: <?php echo $occupation ?><br>
      email: <?php echo $email ?><br>
      phone: <?php echo $phone ?><br>
      address: <?php echo $address ?><br>
      city: <?php echo $city ?><br>
      zip: <?php echo $zip ?><br>
      state: <?php echo $state ?><br>

      </div>
    </div>
  </body>
</html>