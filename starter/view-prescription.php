<?php
    session_start();
    $unid = $_GET['unid'];
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
            <li class="breadcrumb-item"><a href="prescrption.php">Prescription</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
            </ol>
        </nav>

        <div class="cards__heading">
        <div></div>
          <h3>View Prescription<a href="prescrption.php?submit_search&unid=<?php echo $unid;?>" class="text-primary float-right">Back</a></h3>
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
										<th>Date</th>
										<th>Medical Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select user_master.first_name, user_master.last_name, user_master.unique_id, prescriptions.doctor_id, prescriptions.track_no, prescriptions.date, prescriptions.status from prescriptions join user_master on user_master.unique_id = prescriptions.uid  where prescriptions.uid = '$unid' and prescriptions.doctor_id = '$uid' order by prescriptions.id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
                                            <td><?php echo htmlentities($row['unique_id']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
                                            <td> <?php if($row['status']){echo 'Purchased';}else{echo 'Pending';}?></td>
                                            <td>
                                                <a href="view-medicine.php?id=<?php echo $row['track_no']?>&unid=<?php echo $unid;?>">View <i class="fa fa-eye"></i></a></td>
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