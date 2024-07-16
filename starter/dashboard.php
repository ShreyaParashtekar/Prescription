  <?php
  $uid = $_SESSION['uid'];
  include '../config.php';
  $res = mysqli_query($conn, "select first_name, last_name, image from admin_master where unique_id = '$uid'");
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
                <a href="user-list.php">
                  <i class="fa fa-user" style="color:blue"> </i>
                  <?php $res1 = mysqli_query($conn, "select count(*) as count from user_master");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                  <p class="stat-text">Total Users</p>
                  </a>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="medical-list.php">
                <i class="fa fa-plus-circle" style="color:green"> </i>
                <?php $res1 = mysqli_query($conn, "select count(*) as count from medical_master");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                <p class="stat-text">Medicals</p>
                </a>
              </div>
            </div>
            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="doctor-list.php">
                <i class="fa fa-user-md" style="color:red"> </i>
                <?php $res1 = mysqli_query($conn, "select count(*) as count from doctor_master");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                <p class="stat-text">Doctors</p>
                </a>
              </div>
            </div>

            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="view-company.php">
                <i class="fa fa-building" style="color:purple"> </i>
                <?php $res1 = mysqli_query($conn, "select count(*) as count from Company_master where Company_status=true");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                <p class="stat-text">Company</p>
                </a>
              </div>
            </div>

            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="medicine-list.php">
                <i class="fa fa-plus-square" style="color:blue"> </i>
                <?php $res1 = mysqli_query($conn, "select count(*) as count from Medicine_master where Medicine_status=true");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                <p class="stat-text">Medicine</p>
                </a>
              </div>
            </div>

            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="view-complaints.php">
                <i class="fa fa-clipboard" style="color:green"> </i>
                <?php $res1 = mysqli_query($conn, "select count(*) as count from complaint_master");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                <p class="stat-text">Complaints</p>
                </a>
              </div>
            </div>

            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="view-state.php">
                <i class="fa fa-map-marker" style="color:red"> </i>
                <?php $res1 = mysqli_query($conn, "select count(*) as count from state_master");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                <p class="stat-text">State</p>
                </a>
              </div>
            </div>

            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="view-district.php">
                <i class="fa fa-map" style="color:purple"> </i>
                <?php $res1 = mysqli_query($conn, "select count(*) as count from district_master");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                <p class="stat-text">District</p>
                </a>
              </div>
            </div>

            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="view-city.php">
                <i class="fa fa-street-view" style="color:blue"> </i>
                <?php $res1 = mysqli_query($conn, "select count(*) as count from city_master");
                  $row1 = mysqli_fetch_assoc($res1);
                  ?>
                  <h3 class="text-primary number"><?php echo $row1['count'];?></h3>
                <p class="stat-text">City</p>
                </a>
              </div>
            </div>

            <div class="col-sm-6 pl-sm-2 statistics-grid">
              <div class="card card_border border-primary-top p-4">
              <a href="logout.php">
                <i class="fa fa-power-off" style="color:green"> </i>
                  <h3 class="text-primary number">Logout</h3>
                  <p class="stat-text">Signout</p>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
              <img src="image/admin.png" alt="" class="img-fluid rounded" />
        </div>
      </div>
    </div>
  <!-- //statistics data -->
</div>
<!-- //content -->
</div>
<!-- main content end-->