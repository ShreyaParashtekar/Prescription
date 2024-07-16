<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

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
          $pass = $_POST['password'];
          $cpass = $_POST['cpassword'];
          if($pass==$cpass)
          {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $num = $_POST['contact'];
            $dob = $_POST['dob'];
            
            $uid = "UID".rand(100000,999999);
            if(mysqli_query($conn, "insert into user_master(first_name, last_name, gender, email, contact, date_of_birth, unique_id, status, image)values('$fname', '$lname', '$gender', '$email', '$num', '$dob', '$uid', true, 'user/user_image.jpg')"))
            {
              if(mysqli_query($conn, "insert into login_master(unique_id, user_type, password, status)values('$uid','User','$pass',true)")){
                $name = $fname." ".$lname;
                $appname = "Prescription";

                try 
                {
                  $mail->isSMTP();
                  $mail->Host = 'smtp.gmail.com';
                  $mail->SMTPAuth = true;
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                  $mail->Port = 587;

                  $mail->Username = 'project.shreyaparashtekar@gmail.com'; // YOUR gmail email
                  $mail->Password = 'nkzj ggsb epob whoy'; // YOUR gmail password

                  // Sender and recipient settings
                  $mail->setFrom('project.shreyaparashtekar@gmail.com', $appname);
                  $mail->addAddress($email, $name);
                  $mail->addReplyTo('project.shreyaparashtekar@gmail.com', $appname); // to set the reply to

                  // Setting the email content
                  $mail->IsHTML(true);
                  $mail->Subject = "User Registration : ".$appname;
                  $mail->Body = 'Dear '.$name.'<br> You have recently registered to our webpage.<br> USER ID : '.$uid.'<br><br> Thank you<br>Team '.$appname;
                  $mail->AltBody = 'User Verification Email';

                  $mail->send();
                  // echo "Email message sent.";
                  
                  echo "<script>alert('User registered successfully, and User Id has been sent to your registered email..!');location.href='index.php'</script>";
                } 
                catch (Exception $e) 
                {
                    // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                    echo "<script>alert('Unable to process, Kindly try after sometimes..');</script>";

                }
              }
              else{
                echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
              }

            }
            else
            {
                echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
                // echo mysqli_error($conn);
               
            }
          }
          else
          {
            echo "<script>alert('Password Mis-Match..')</script>";
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

        <title>Prescription - Signup Page</title>
    </head>
<body>
  
<div class="content pt-5">
    <div class="container card shadow pt-5">
        <div class="row">
            <div class="col-md-6 order-md-2 ">
            <img src="images/image2.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <h3>Sign Up to <strong>Prescription</strong></h3>
                    <p class="mb-4">Please fill out the form bellow to register .</p>
                </div>
                
                <form action="#" method="post">

              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="fname" required>
              </div>

              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lname" required>
              </div>

                <div class="form-group pt-3">
                    <label for="username">Gender </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" required type="radio" name="gender" id="inlineRadio1" value="Male">
                    <label class="form-check-label" for="inlineRadio1" style="font-size: 12px;display: block;margin-bottom: 0;color: #b3b3b3;">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                    <label class="form-check-label" for="inlineRadio2" style="font-size: 12px;display: block;margin-bottom: 0;color: #b3b3b3;">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Other">
                    <label class="form-check-label" for="inlineRadio3" style="font-size: 12px;display: block;margin-bottom: 0;color: #b3b3b3;">Other</label>
                </div>

              <div class="form-group first mt-3">
                <label for="username">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>

              <div class="form-group first">
                <label for="username">Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" required class="form-control" name="contact" pattern="[6789][0-9]{9}">
              </div>

                <div class="form-group mt-4">
                    <label for="username">Date Of Birth </label>
                </div>
                <input type="date" class="form-control mb-2" name="dob" min="1950-01-01" max="2003-05-13" required>

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"> 
              </div>

              <div class="form-group last mb-4">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
              </div>
              

              <input type="submit" value="Sign Up" class="btn text-white btn-block btn-primary" name="submit">

              <span class="d-block text-left my-4 text-muted"> Already have an account? <a href="index.php">Sign In</a></span>
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