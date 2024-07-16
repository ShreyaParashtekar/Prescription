<?php
  $uid = $_SESSION['uid'];
  include '../config.php';

  if($_SESSION['type']=='User'){
    $res = mysqli_query($conn, "select first_name, last_name, image, unique_id from user_master where unique_id = '$uid'");
    $row = mysqli_fetch_assoc($res);
    $image = $row['image'];
    $ulname = $row['last_name'];
    $ufname = $row['first_name'];
    $unique_id = $row['unique_id'];
  }
  else if($_SESSION['type']=='Admin'){
    $res = mysqli_query($conn, "select first_name, last_name, image, unique_id from admin_master where unique_id = '$uid'");
    $row = mysqli_fetch_assoc($res);
    $image = $row['image'];
    $ulname = $row['last_name'];
    $ufname = $row['first_name'];
    $unique_id = $row['unique_id'];
  }
  else if($_SESSION['type']=='Doctor'){
    $res = mysqli_query($conn, "select first_name, last_name, image, unique_id from doctor_master where unique_id = '$uid'");
    $row = mysqli_fetch_assoc($res);
    $image = $row['image'];
    $ulname = $row['last_name'];
    $ufname = $row['first_name'];
    $unique_id = $row['unique_id'];
  }
  else if($_SESSION['type']=='Medical'){
    $res = mysqli_query($conn, "select first_name, last_name, image, unique_id from medical_master where unique_id = '$uid'");
    $row = mysqli_fetch_assoc($res);
    $image = $row['image'];
    $ulname = $row['last_name'];
    $ufname = $row['first_name'];
    $unique_id = $row['unique_id'];
  }

  
?>

<!-- header-starts -->
<div class="header sticky-header">

<!-- notification menu start -->
<div class="menu-right">
  <div class="navbar user-panel-top">
    <div class="user-dropdown-details d-flex">
      <div class="profile_details_left">
        <ul class="nofitications-dropdown">
          <li>
            <a href="index.php"><i class="fa fa-home"></i></span></a>
          </li>
          <li>
            <a href="logout.php"><i class="fa fa-power-off"></i></span></a>
          </li>
          
        </ul>
      </div>
      <div class="profile_details">
        <ul>
          <li class="dropdown profile_details_drop">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
              aria-expanded="false">
              <div class="profile_img">
                <img src="<?php echo $image; ?>" class="rounded-circle" alt="" />
                <div class="user-active">
                  <span></span>
                </div>
              </div>
            </a>
            <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
              <li class="user-info">
                <span class="user-name text-light h3"><?php echo $ufname." ".$ulname; ?></span><br>
                <span class="user-name text-light"><?php echo "UID: ".$unique_id; ?></span>
                <span class="status ml-2">Online</span>
              </li>
              <li> <a href="profile.php"><i class="lnr lnr-user"></i>My Profile</a> </li>
              <li> <a href="change_password.php"><i class="lnr lnr-cog"></i>Setting</a> </li>
              <li class="logout"> <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a> </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--notification menu end -->
</div>
<!-- //header-ends -->