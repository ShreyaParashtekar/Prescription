<?php
    session_start();
    $uid = $_SESSION['uid'];
    include '../config.php';
    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
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
            <li class="breadcrumb-item active" aria-current="page">Patient</li>
            </ol>
        </nav>

        <div class="cards__heading">
        <div></div>
          <h3>View Prescription<a href="index.php" class="text-primary float-right">Back</a></h3>
        </div>
        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Name</th>
										<th>unique_id</th>
										<th>Email</th>
										<th>Contact</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select distinct user_master.first_name, user_master.last_name, user_master.unique_id, user_master.email, user_master.contact from user_master join prescriptions on prescriptions.uid = user_master.unique_id ");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
                                            <td><?php echo htmlentities($row['unique_id']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td><?php echo htmlentities($row['contact']);?></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; 
                                    } ?>
                                </tbody>			
                            </table>
            </div>
          </div>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
  ?>