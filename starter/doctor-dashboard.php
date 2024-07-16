<?php
  $uid = $_SESSION['uid'];
  include '../config.php';
  $res = mysqli_query($conn, "select first_name, last_name, image from doctor_master where unique_id = '$uid'");
  $row = mysqli_fetch_assoc($res);
  $image = $row['image'];
  $ulname = $row['last_name'];
  $ufname = $row['first_name'];
  ?>
  
  <!-- main content start -->
  <div class="main-content">

<!-- content -->
<div class="container-fluid content-top-gap">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb my-breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
  <div class="welcome-msg pt-3 pb-4">
    <h1>Hi <span class="text-primary"><?php echo $ufname;?></span>, Welcome back</h1>
  </div>

  <!-- statistics data -->
  <div class="statistics">
      <div class="row">
        <div class="col-xl-6 pr-xl-2">
          <div class="row">
            <div class="col-sm-9 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <a href="prescrption.php">
                  <i class="fa fa-user-md" style="color:blue"> </i>
                  <h3 class="text-primary number">Prescription</h3>
                  <p class="mt-4">Doctor's written authorization for a patient to purchase a prescription drug from a pharmacist.</p>
                  </a>
              </div>
            </div>

            <div class="col-sm-9 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <a href="view-patient.php">
                  <i class="fa fa-user" style="color:blue"> </i>
                  <h3 class="text-primary number">View Patients</h3>
                  <p class="mt-4">Doctor's ca view thier patients list.</p>
                  </a>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
              <img src="image/doctor_home.png" alt="" class="img-fluid rounded" />
        </div>
      </div>
    </div>
  <!-- //statistics data -->
</div>
<!-- //content -->
</div>
<!-- main content end-->