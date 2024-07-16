<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

    session_start();
    include '../config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    else if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $specialization = $_POST['specialization'];
        $num = $_POST['contact'];
        $uid = "UID".rand(100000,999999);
        $pass = "PAss".rand(100000,999999);
        if(mysqli_query($conn, "insert into doctor_master(first_name, last_name,email, contact, unique_id, status, image, specialization)values('$fname', '$lname','$email', '$num', '$uid', true, 'user/doctor_image.jpg', '$specialization')"))
        {
          if(mysqli_query($conn, "insert into login_master(unique_id, user_type, password, status)values('$uid','Doctor','$pass',true)")){
            $name = $fname." ".$lname;
            $appname = "Prescription";

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
                  $mail->Subject = "User Registration : ".$appname;
                  $mail->Body = 'Dear '.$name.'<br> You have recently registered to our webpage.<br> USER ID : '.$uid.'<br>Password: '.$pass.'<br><br> Thank you<br>Team '.$appname;
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
            echo "<script>alert('Unable to process, Kindly try after sometimes..')</script>";
          }
        }
        else
        {
            echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
            // echo mysqli_error($conn);
        }          
    }
    include 'link.php';
    include 'sidebar.php';
    include 'header.php';
    ?>
    
  <div class="main-content">
    <div class="container-fluid content-top-gap">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctor</li>
            </ol>
        </nav>

        <div class="cards__heading">
          <h3>Add Doctor</h3>
        </div>

        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
              <div class="col-lg-6 align-self pr-lg-4">
                <form action="#" method="post">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">First Name</label>
                        <div class="col-sm-8">
                        <input type="text" placeholder="Enter First Name" class="form-control input-style" name="fname" id="validationDefault01" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Last Name</label>
                        <div class="col-sm-8">
                        <input type="text" placeholder="Enter Last Name" class="form-control input-style" name="lname" id="validationDefault01" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Specialization</label>
                        <div class="col-sm-8">
                        <input type="text" placeholder="Enter Specialization" class="form-control input-style" name="specialization" id="validationDefault01" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Email</label>
                        <div class="col-sm-8">
                        <input type="email" placeholder="Enter Email Id" class="form-control input-style" name="email" id="validationDefault02" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Contact No</label>
                        <div class="col-sm-8">
                        <input type="text" placeholder="Enter Contact Number" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control input-style" id="validationDefault02" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary btn-style" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
                
              </div>
              <div class="col-lg-6 pl-lg-4 mt-lg-0 mt-4">
                <img src="image/doctor.jpg" alt="" class="img-fluid rounded" />
              </div>
            </div>
          </div>
        </div>

        
    </div>
</div>

<?php
    include 'footer.php';
  ?>
  