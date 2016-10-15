<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" type="text/css" href="fitnessinfo.css">

    <title>classForm class Form</title>
    
    <link rel="stylesheet"  href="css/index.css">
 

  </head>

  <body>
  <?php include 'nav.php' ?>
    <div class="container">
      <form action="addclassinfo.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Add a Fitness Class</h2>

        <label for="classname">Classname:</label>
        <input type="text" name="classname" value="" required pattern="[A-Za-z]+\s[A-Za-z]+"/>

        

        <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>

      </form>
    </div>
  </body>
</html>