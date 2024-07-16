<?php
    session_start();
    $uid = $_SESSION['uid'];
    include '../config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    else if(isset($_POST['update']))
    {
      if(!empty($_FILES['image']['name']))
      {
        $image = "user/".$_FILES["image"]["name"];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_FILES["image"]["name"]))
        {
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $gender = $_POST['gender'];
          $email = $_POST['email'];
          $contact = $_POST['contact'];
          $dob = $_POST['dob'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $district = $_POST['district'];
          if(mysqli_query($conn, "update user_master set image = '$image', first_name = '$fname', last_name = '$lname', gender = '$gender', email = '$email', contact = '$contact', date_of_birth = '$dob', city_id = '$city', state_id = '$state', district_id = '$district' where unique_id = '$uid'"))
          {
            echo "<script>alert('Your profile updated siccessfully..!');</script>";
          }
          else
          {
            echo "<script>alert('Unable to process..!');</script>";
          }
        }
        else
        {
          echo "<script>alert('Unable to upload your image on server..!');</script>";
        }      
      }
      else
      {
        $image = 'user/user_image.jpg';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $dob = $_POST['dob'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $district = $_POST['district'];

        if(mysqli_query($conn, "update user_master set image = '$image', first_name = '$fname', last_name = '$lname', gender = '$gender', email = '$email', contact = '$contact', date_of_birth = '$dob', city_id = '$city', state_id = '$state', district_id = '$district' where unique_id = '$uid'"))
        {
          echo "<script>alert('Your profile updated siccessfully..!');</script>";
        }
        else
        {
          echo "<script>alert('Unable to update your profile on server..!');</script>";
        }
      }
    }
    else if(isset($_POST['updatedoc']))
    {
      if(!empty($_FILES['image']['name']))
      {
        $image = "user/".$_FILES["image"]["name"];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_FILES["image"]["name"]))
        {
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $contact = $_POST['contact'];
          if(mysqli_query($conn, "update doctor_master set image = '$image', first_name = '$fname', last_name = '$lname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
          {
            echo "<script>alert('Your profile updated successfully..!');</script>";
          }
          else
          {
            echo "<script>alert('Unable to update your profile on server..!');</script>";
          }
        }
        else
        {
          echo "<script>alert('Unable to upload your image on server..!');</script>";
        }      
      }
      else
      {
        $image = 'user/doctor_image.jpg';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        if(mysqli_query($conn, "update doctor_master set image = '$image', first_name = '$fname', last_name = '$lname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
        {
          echo "<script>alert('Your profile updated siccessfully..!');</script>";
        }
        else
        {
          echo "<script>alert('Unable to update your profile on server..!');</script>";
        }
      }
    }
    else if(isset($_POST['updatemedc']))
    {
      if(!empty($_FILES['image']['name']))
      {
        $image = "user/".$_FILES["image"]["name"];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_FILES["image"]["name"]))
        {
          $fname = $_POST['fname'];
          $email = $_POST['email'];
          $contact = $_POST['contact'];
          if(mysqli_query($conn, "update medical_master set image = '$image', first_name = '$fname', email = '$email', contact = '$contact', where unique_id = '$uid'"))
          {
            echo "<script>alert('Your profile updated siccessfully..!');</script>";
          }
          else
          {
            echo "<script>alert('Unable to update your profile on server..!');</script>";
          }
        }
        else
        {
          echo "<script>alert('Unable to upload your image on server..!');</script>";
        }      
      }
      else
      {
        $image = 'user/medical_image.jpg';
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        if(mysqli_query($conn, "update medical_master set image = '$image', first_name = '$fname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
        {
          echo "<script>alert('Your profile updated siccessfully..!');</script>";
        }
        else
        {
          echo "<script>alert('Unable to update your profile on server..!');</script>";
        }
      }
    }
    else if(isset($_POST['updateadm']))
    {
      if(!empty($_FILES['image']['name']))
      {
        $image = "user/".$_FILES["image"]["name"];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_FILES["image"]["name"]))
        {
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $contact = $_POST['contact'];
          if(mysqli_query($conn, "update admin_master set image = '$image', first_name = '$fname', last_name = '$lname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
          {
            echo "<script>alert('Your profile updated siccessfully..!');</script>";
          }
          else
          {
            echo "<script>alert('Unable to process your request..!');</script>";
          }
        }
        else
        {
          echo "<script>alert('Unable to upload your image on server..!');</script>";
        }      
      }
      else
      {
        $image = 'user/admin_image.jpg';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        if(mysqli_query($conn, "update admin_master set image = '$image', first_name = '$fname', last_name = '$lname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
        {
          echo "<script>alert('Your profile updated successfully..!');</script>";
        }
        else
        {
          echo "<script>alert('Unable to update your profile on server..!');</script>";
        }
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
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
        
        <div class="card card_border py-2 mb-4">
            <div class="cards__heading">
                <h3>Profile Update <span></span></h3>
            </div>
            <div class="card-body">
            <form class="row g-3" method="post" enctype="multipart/form-data">
              <?php 
                if($_SESSION['type']=='Doctor')
                {
                  $resd = mysqli_query($conn, "select * from doctor_master where unique_id = '$uid'");
                  $rowd = mysqli_fetch_assoc($resd);
                  ?>
              <div class="col-md-4">
                <label for="validationDefault01" class="form-label">First name</label>
                <input type="text" class="form-control input-style" name="fname" id="validationDefault01" value="<?php echo $rowd['first_name'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Last name</label>
                <input type="text" class="form-control input-style" name="lname" id="validationDefault02" value="<?php echo $rowd['last_name'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Unique ID</label>
                <input type="text" class="form-control input-style" id="validationDefault02" value="<?php echo $rowd['unique_id'];?>" required disabled>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Email</label>
                <input type="email" class="form-control input-style" name="email" id="validationDefault02" value="<?php echo $rowd['email'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control input-style" id="validationDefault02" value="<?php echo $rowd['contact'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Profile Image</label>
                <input type="file" class="form-control input-style" id="validatedCustomFile" name="image" accept="image/*">
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Status</label>
                <input type="text" class="form-control input-style" id="validationDefault02" value="<?php if($rowd['status']){echo "Active";}else{echo "In-Active";}?>" required disabled>
              </div>

              <div class="col-12">
                <button class="btn btn-primary" type="submit" name="updatedoc">Submit form</button>
              </div>
                <?php
                }
                else if($_SESSION['type']=='Admin')
                {
                  $resa = mysqli_query($conn, "select * from admin_master where unique_id = '$uid'");
                  $rowa = mysqli_fetch_assoc($resa);
    ?>


              <div class="col-md-4">
                <label for="validationDefault01" class="form-label">First name</label>
                <input type="text" class="form-control input-style" name="fname" id="validationDefault01" value="<?php echo $rowa['first_name'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Last name</label>
                <input type="text" class="form-control input-style" name="lname" id="validationDefault02" value="<?php echo $rowa['last_name'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Email</label>
                <input type="email" class="form-control input-style" name="email" id="validationDefault02" value="<?php echo $rowa['email'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control input-style" id="validationDefault02" value="<?php echo $rowa['contact'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Profile Image</label>
                <input type="file" class="form-control input-style" id="validatedCustomFile" name="image" accept="image/*">
              </div>

              <div class="col-12">
                <button class="btn btn-primary" type="submit" name="updateadm">Submit form</button>
              </div>
              <?php
                }
                else if($_SESSION['type']=='Medical')
                {
                  $resm = mysqli_query($conn, "select * from medical_master where unique_id = '$uid'");
                  $rowm = mysqli_fetch_assoc($resm);
                  ?>
                <div class="col-md-4">
                <label for="validationDefault01" class="form-label">First name</label>
                <input type="text" class="form-control input-style" name="fname" id="validationDefault01" value="<?php echo $rowm['first_name'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Unique ID</label>
                <input type="text" class="form-control input-style" id="validationDefault02" value="<?php echo $rowm['unique_id'];?>" required disabled>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Email</label>
                <input type="email" class="form-control input-style" name="email" id="validationDefault02" value="<?php echo $rowm['email'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control input-style" id="validationDefault02" value="<?php echo $rowm['contact'];?>" required>
              </div>

              <!-- <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Profile Image</label>
                <input type="file" class="form-control input-style" id="validatedCustomFile" name="image" accept="user/*">
              </div> -->

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Status</label>
                <input type="text" class="form-control input-style" id="validationDefault02" value="<?php if($rowm['status']){echo "Active";}else{echo "In-Active";}?>" required disabled>
              </div>

              <div class="col-12">
                <button class="btn btn-primary" type="submit" name="updatemedc">Submit form</button>
              </div>
                <?php
                }
                else if($_SESSION['type']=='User')
                {
                  $resu = mysqli_query($conn, "select * from user_master where unique_id = '$uid'");
                  $rowu = mysqli_fetch_assoc($resu);
                  ?>
              <div class="col-md-4">
                <label for="validationDefault01" class="form-label">First name</label>
                <input type="text" class="form-control input-style" name="fname" id="validationDefault01" value="<?php echo $rowu['first_name'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Last name</label>
                <input type="text" class="form-control input-style" name="lname" id="validationDefault02" value="<?php echo $rowu['last_name'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Unique ID</label>
                <input type="text" class="form-control input-style" id="validationDefault02" value="<?php echo $rowu['unique_id'];?>" required disabled>
              </div>

              <div class="form-group col-md-4">
                  <label for="inputState" class="input__label">Gender</label>
                  <select id="inputState" class="form-control input-style" required name="gender">
                      <option <?php if($rowu['gender']=='Male'){echo 'selected';}?>>Male</option>
                      <option <?php if($rowu['gender']=='Female'){echo 'selected';}?>>Female</option>
                      <option <?php if($rowu['gender']=='Other'){echo 'selected';}?>>Other</option>
                  </select>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Email</label>
                <input type="email" class="form-control input-style" name="email" id="validationDefault02" value="<?php echo $rowu['email'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control input-style" id="validationDefault02" value="<?php echo $rowu['contact'];?>" required>
              </div>

              <div class="form-group col-md-4">
                        <label for="inputPassword3" class="col-sm-12 col-form-label input__label">Choose State</label>
                       
                        <select class="form-control input-style" aria-label="Default select example" required name="state">
                            <option value="">Select State</option>
                            <?php 
                                $res1 = mysqli_query($conn, "select State_id , State_name from state_master where Status = true");
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                    <option value="<?php echo $row1['State_id'];?>" <?php if($rowu['state_id']==$row1['State_id']){echo "selected";}?>><?php echo $row1['State_name'];?></option>
                                    <?php
                                }?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword3" class="col-form-label input__label">Choose District</label>
                  
                        <select class="form-control input-style" aria-label="Default select example" required name="district">
                            <option value="">Select District</option>
                            <?php 
                                $res1 = mysqli_query($conn, "select District_id , District_name from district_master where D_status = true");
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                    <option value="<?php echo $row1['District_id'];?>" <?php if($rowu['district_id']==$row1['District_id']){echo "selected";}?>><?php echo $row1['District_name'];?></option>
                                    <?php
                                }?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputPassword3" class="col-form-label input__label">Choose City</label>
                       
                        <select class="form-control input-style" aria-label="Default select example" required name="city">
                            <option value="">Select City</option>
                            <?php 
                                $res1 = mysqli_query($conn, "select City_id  , City_name from city_master where City_status = true");
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                      <option value="<?php echo $row1['City_id'];?>" <?php if($rowu['city_id']==$row1['City_id']){echo "selected";}?>><?php echo $row1['City_name'];?></option>

                                    <?php
                                }?>
                        </select>
                    </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Date Of Birth</label>
                <input type="date" min="1950-01-01" max="2003-05-13" name="dob" class="form-control input-style" id="validationDefault02" value="<?php echo $rowu['date_of_birth'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Profile Image</label>
                <input type="file" class="form-control input-style" id="validatedCustomFile" name="image" accept="image/*">
              </div>

              <div class="form-group col-md-4">
                <label for="validationDefault02" class="input__label">Status</label>
                <input type="text" class="form-control input-style" id="validationDefault02" value="<?php if($rowu['status']){echo "Active";}else{echo "In-Active";}?>" required disabled>
              </div>

              <div class="col-12">
                <button class="btn btn-primary" type="submit" name="update">Submit form</button>
              </div>
                <?php
                }
              ?>
            </form>
            </div>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
  ?>
  