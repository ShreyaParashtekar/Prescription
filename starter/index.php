
  <?php 
  session_start();
  if(!isset($_SESSION['login']))
  {
    header ("Location: ../index.php");
  }
  
  include 'link.php';
  include 'sidebar.php';
  include 'header.php';
  if($_SESSION['type']=='Admin')
  {
    include 'dashboard.php';
  }
  else if($_SESSION['type']=='Doctor')
  {
    include 'doctor-dashboard.php';
  }
  else if($_SESSION['type']=='Medical')
  {
    include 'medical-dashboard.php';
  }
  else
  {
    include 'user-dashboard.php';
  }
  include 'footer.php';
    
  ?>
  