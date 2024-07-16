<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
  require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
  require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

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
        $uid = $_POST['uid'];
        $res = mysqli_query($conn, "select user_type, password from login_master where unique_id = '$uid'");
        if(mysqli_num_rows($res)>0)
        {
          $row = mysqli_fetch_assoc($res);
          $sql = "";
          $password = $row['password'];
          $appname = "Prescription";

          if($row['user_type']=='User'){
            $sql = "select first_name, last_name, email from user_master where unique_id = '$uid'";
          }
          else if($row['user_type']=='Doctor'){
            $sql = "select first_name, last_name, email from doctor_master where unique_id = '$uid'";
          }
          else if($row['user_type']=='Medical'){
            $sql = "select first_name, last_name, email from medical_master where unique_id = '$uid'";
          }
          else if($row['user_type']=='Admin'){
            $sql = "select first_name, last_name, email from admin_master where unique_id = '$uid'";
          }
          else{
            echo "<script>alert('Unable to process your request..!');</script>";
          }

          $res1 = mysqli_query($conn, $sql);
          if(mysqli_num_rows($res1)>0){
            $row1 = mysqli_fetch_assoc($res1);
            $name = $row1['first_name']." ".$row1['last_name'];
            $email = $row1['email'];

            try 
            {
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
              $mail->Port = 587;

              $mail->Username = 'shreyaparashtekar@gmail.com'; // YOUR gmail email
              $mail->Password = 'nkzj ggsb epob whoy'; // YOUR gmail password

              // Sender and recipient settings
              $mail->setFrom('project.head1994@gmail.com', $appname);
              $mail->addAddress($email, $name);
              $mail->addReplyTo('project.head1994@gmail.com', $appname); // to set the reply to

              // Setting the email content
              $mail->IsHTML(true);
              $mail->Subject = "Forgot Password : ".$appname;
              $mail->Body = 'Dear '.$name.'<br> You recently requested reset your password<br> Password : '.$password.'<br><br> Thank you<br>Team '.$appname;
              $mail->AltBody = 'Forgot password reset email';

              $mail->send();
              // echo "Email message sent.";
              
              echo "<script>alert('Password has been sent to your registered email..!');location.href='index.php'</script>";
            } 
            catch (Exception $e) 
            {
                // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                echo "<script>alert('Unable to process your request..!');</script>";

            }
          }
          else{
            echo "<script>alert('Unable to process your request..!');</script>";
          }
        }
        else
        {
          echo "<script>alert('Invalid data you provided..!');</script>";
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

    <title>Prescription - Forgot Page</title>
  </head>
  <body>

  <div class="content ">
    <div class="container card shadow pt-5">
      <div class="row">
        <div class="col-md-6 order-md-2 ">
          <img src="images/forgot.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Password <strong>Reset</strong></h3>
              <p class="mb-4">We can help you reset your password.</p>
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">User ID</label>
                <input type="text" class="form-control" id="userid" name="uid" required>
              </div>
              
              <div class="d-flex mb-5 align-items-center">
              </div>

              <input type="submit" value="Submit" class="btn text-white btn-block btn-primary" name="submit">

              <span class="d-block text-left my-4 text-muted"> Remember your password? <a href="index.php">Sign In</a></span>
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