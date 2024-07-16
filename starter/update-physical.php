<?php
    session_start();
    $unid = $_GET['unid'];
    include '../config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    else if(isset($_POST['submit']))
    {
        $hei = $_POST['height'];
        $wei = $_POST['weight'];
        $blood = $_POST['blood'];
        $bp = $_POST['bp'];
        $pulse = $_POST['pulse'];
        if(mysqli_query($conn, "update user_master set blood_pressure = '$bp', pulse = '$pulse', blood_group = '$blood', height = '$hei', weight = '$wei' where unique_id = '$unid'"))
        {
          echo "<script>alert('Physical data updated siccessfully..!');</script>";
        }
        else
        {
          echo "<script>alert('Unable to update data on server..!');</script>";
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
            <li class="breadcrumb-item"><a href="prescrption.php">Prescription</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>

        <div class="cards__heading">
          <h3>Update Physical Information<a href="prescrption.php?submit_search&unid=<?php echo $unid;?>" class="text-primary float-right">Back</a></h3>
        </div>
        <?php
        $res1 = mysqli_query($conn, "select first_name,unique_id,status, last_name, gender, email, contact, date_of_birth, height, weight,blood_group,blood_pressure, pulse from user_master where unique_id = '$unid' ");
        $row1 = mysqli_fetch_assoc($res1);?>

        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
              <div class="col-lg-6 align-self pr-lg-4">
                <form action="#" method="post" class="g-3">
                <div class="col-md-8 form-group">
                    <label for="validationDefault01" class="form-label">Heaight(Inches)</label>
                    <input type="number" step="0.01" class="form-control input-style" name="height" id="validationDefault01" value="<?php echo $row1['height'];?>" required>
                </div>
                    <div class="col-md-8 form-group">
                        <label for="validationDefault01" class="form-label">Weight(KG)</label>
                        <input type="number" step="0.01" class="form-control input-style" name="weight" id="validationDefault01" value="<?php echo $row1['weight'];?>" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputState" class="input__label">Blood Group</label>
                        <select id="inputState" class="form-control input-style" required name="blood">
                            <option>Choose..</option>
                            <option <?php if($row1['blood_group']=='O+'){echo 'selected';}?>>O+</option>
                            <option <?php if($row1['blood_group']=='O-'){echo 'selected';}?>>O-</option>
                            <option <?php if($row1['blood_group']=='A+'){echo 'selected';}?>>A+</option>
                            <option <?php if($row1['blood_group']=='A-'){echo 'selected';}?>>A-</option>
                            <option <?php if($row1['blood_group']=='B+'){echo 'selected';}?>>B+</option>
                            <option <?php if($row1['blood_group']=='B-'){echo 'selected';}?>>B-</option>
                            <option <?php if($row1['blood_group']=='AB+'){echo 'selected';}?>>AB+</option>
                            <option <?php if($row1['blood_group']=='AB-'){echo 'selected';}?>>AB-</option>
                        </select>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="validationDefault01" class="form-label">Blood Pressure</label>
                        <input type="text" class="form-control input-style" name="bp" id="validationDefault01" value="<?php echo $row1['blood_pressure'];?>" required>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="validationDefault01" class="form-label">Pulse</label>
                        <input type="text" class="form-control input-style" name="pulse" id="validationDefault01" value="<?php echo $row1['pulse'];?>" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <button type="submit" class="btn btn-primary btn-style" name="submit">Submit</button>
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
  