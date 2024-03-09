<?php
require "Components/dbconnect.php";


//GLOBAL VARIABLES
$passwordmatching = true; //If false shows alert password & confirm password doesn't match!!
$signupStatus = false; //If true showing shows alert that account has been created successfully!!
$exists = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username =  $_POST["username"];
  $password =  $_POST["password"];
  $confirmpassword =  $_POST["confirmpassword"];


  $existsSql = "SELECT * FROM users WHERE username = '$username'";
  $existsSqlResult = mysqli_query($conn, $existsSql);
  $numexistsrows = mysqli_num_rows($existsSqlResult);

  if ($numexistsrows > 0) {
    $exists = true;
  } else {
    if ($password == $confirmpassword) {

      $hash = password_hash($password,PASSWORD_DEFAULT);
     
      
      $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ( '$username' , '$hash' , current_timestamp())";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $signupStatus = true;
      }
    } else {
      $passwordmatching = false;
    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGN-UP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <?php
  require "Components/navbar.php";

  if ($signupStatus) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your account is created you can login..!!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  } else if (!$passwordmatching) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Password & Confirm Password is not matching..!!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  } else if ($exists) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Username already Exists..!!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }




  ?>





  <div class="container mt-4">
    <h3 class="text-center">Signup to our website</h3>

    <form action="/LoginSystem/signup.php" id="myForm" method="post" class="mt-4">
      <div class="form-group">
        <label for="username">Enter Username</label>
        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" required>

      </div>
      <div class="form-group">
        <label for="password">Enter Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
      <div class="form-group">
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" required>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button> 
    </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>