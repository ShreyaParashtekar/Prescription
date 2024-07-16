<?php
    include 'config.php';
    session_start();
    if(isset($_SESSION['login']))
    {
        header ("Location: starter/index.php");
    }
    else
    {
        if(isset($_POST['submit']))
        {
            $uid = $_POST['uid'];
            $pass = $_POST['password'];

            $res = mysqli_query($conn, "select unique_id, user_type, password from login_master where status = true and unique_id = '$uid' and password ='$pass'");
            if(mysqli_num_rows($res)>0)
            {
                $row = mysqli_fetch_assoc($res);
                $_SESSION['type'] = $row['user_type'];
                $_SESSION['uid'] = $row['unique_id'];
                $_SESSION['login'] = true;

                header("Location: starter/index.php");
            }
            else
            {
                echo "<script>alert('Invalid credentials..Kindly try with valid data')</script>";
            }
            
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Prescription - Login Page</title>
  </head>
  <body>
    
  <div class="content ">
    <div class="container card shadow pt-5">
      <div class="row">
        <div class="col-md-6 order-md-2 ">
          <img src="images/image.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In to <strong>Prescription</strong></h3>
              <p class="mb-4">To keep connected with us please login with your personal info.</p>
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">User Id</label>
                <input type="text" class="form-control" name="uid" required>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                
                <span class="ml-auto"><a href="forgot.php" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Sign In" class="btn text-white btn-block btn-primary" name="submit">

              <span class="d-block text-left my-4 text-muted"> Don't have an account? <a href="signup.php">Sign Up</a></span>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>