<?php
  $uid = $_SESSION['uid'];
  include '../config.php';
  $res = mysqli_query($conn, "select first_name, last_name, image from user_master where unique_id = '$uid'");
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
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <a href="your-prescrption.php">
                  <i class="fa fa-user-md" style="color:blue"> </i>
                  <h3 class="text-primary number">Prescription</h3>
                  </a>
              </div>
            </div>
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <a href="add-complaints.php">
                  <i class="fa fa-clipboard" style="color:green"> </i>
                  <h3 class="text-primary number">Complaints</h3>
                  </a>
              </div>
            </div>
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <a href="profile.php">
                  <i class="fa fa-user" style="color:green"> </i>
                  <h3 class="text-primary number">Profile</h3>
                  </a>
              </div>
            </div>
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <a href="change_password.php">
                  <i class="fa fa-cog" style="color:purple"> </i>
                  <h3 class="text-primary number">Settings</h3>
                  </a>
              </div>
            </div>
            <div class="col-sm-6 pr-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
                <a href="logout.php">
                  <i class="fa fa-power-off" style="color:red"> </i>
                  <h3 class="text-primary number">Logout</h3>
                  </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
              <img src="image/user.png" alt="" class="img-fluid rounded" />
        </div>
      </div>
    </div>
  <!-- //statistics data -->
</div>
<!-- //content -->
</div>
<!-- main content end-->