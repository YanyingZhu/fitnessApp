<?php
include 'dbConnection.php';

$sql = "SELECT ID, classname FROM classinfo";
$classinfo = $conn->query($sql);
//Check if a beer_id was supplied in the URL Query Parameter
if (isset($_GET['ID'])) {
  $customer_ID = $_GET['ID'];
  //Query DB for details on that customer
  $customerSQL = "SELECT * FROM customer where ID = $customer_ID";
  // ID is the name in customer table for id 
  $customer =  $conn->query($customerSQL)->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="registrator.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet"  href="css/index.css">
    <title>customerApp Customer Form</title>

    

  </head>

  <body>
    <?php include 'nav.php' ?>
    <div class="container">
      <form action="addcustomer.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Add / Update Customer</h2>
        <?php if(isset($customer_ID)) echo "<input type='hidden' name='customer_ID' value=" . $customer_ID ." >"; ?>
          <div class="customerform">
              <label for="classID">Classname:</label>
              <select name="classID" id="classID">
                <?php
                if ($classinfo->num_rows > 0) {
                    // output data of each row
                    while($row = $classinfo->fetch_assoc()) {
                        echo "<option value='" . $row["ID"] ."'";
                        if (isset($customer) and  $customer['classID'] == $row["ID"]) echo "selected";
                        echo ">" . $row["classname"] . "</option>";
                    }
                }
                ?>
              </select>
          </div>

          <div class="customerform">
              <label for="firstname">Firstname:</label>
              <input type="name" name="firstname" value="" required  class="form-control" <?php if (isset($customer['firstname'])) echo "value='" . $customer['firstname'] . "'"; ?> />
          </div>

          <div class="customerform">
              <label for="lastname">Lastname:</label>
              <input type="name" name="lastname" value="" required class="form-control" <?php if (isset($customer['lastname'])) echo "value='" . $customer['lastname'] . "'"; ?> />
          </div>

          <div class="customerform">
              <label for="gender">Gender: </label>
                Male<input type="radio" name="gender" value="male" checked> 
                Female<input type="radio" name="gender" value="female"> 
                Other<input type="radio" name="gender" value="other"  <?php if (isset($customer['gender'])) echo "value='" . $customer['gender'] . "'"; ?> />
          </div>

          <div class="customerform">
              <label for="occupation">Occupation:</label>
              <input type="text" name="occupation" class="form-control" <?php if (isset($customer['occupation'])) echo "value='" . $customer['occupation'] . "'"; ?> />
          </div>

          <div class="customerform">
              <label for="email">Email:</label>
              <input type="email" name="email" required placeholder="Enter a valid email address" class="form-control" <?php if (isset($customer['email'])) echo "value='" . $customer['email'] . "'"; ?> />
          </div>

          <div class="customerform">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="" required placeholder="Enter a valid phone number" class="form-control" <?php if (isset($customer['phone'])) echo "value='" . $customer['phone'] . "'"; ?> />
          </div>

          <div class="customerform">
            <label for="address">Address:</label>
            <input type="text" name="address" value="" required class="form-control" <?php if (isset($customer['address'])) echo "value='" . $customer['address'] . "'"; ?> />
          </div>

          <div class="customerform">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control" <?php if (isset($customer['city'])) echo "value='" . $customer['city'] . "'"; ?> />
          </div>

          <div class="customerform">
            <label for="zip">Zip:</label>
            <input type="text" name="phone" required  value="" class="form-control" <?php if (isset($customer['zip'])) echo "value='" . $customer['zip'] . "'"; ?> />
          </div>

          <div class="customerform">
            <label for="state">State:</label>
            <input type="text" name="state"   class="form-control" <?php if (isset($customer['state'])) echo "value='" . $customer['state'] . "'"; ?> />
          </div>

          <div class="submit-c">
              <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
          </div>
      </form>
    </div>
  </body>
</html>