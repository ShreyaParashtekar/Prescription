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
            <li class="breadcrumb-item active" aria-current="page">Your Priscription</li>
            </ol>
        </nav>

        <div class="cards__heading">
        <div></div>
          <h3>Your Prescription<a href="index.php" class="text-primary float-right">Back</a></h3>
        </div>
        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Name</th>
										<th>Doctor Name</th>
										<th>Date</th>
										<th>Medical Status</th>
										<th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select user_master.first_name, user_master.last_name, prescriptions.doctor_id, prescriptions.track_no, prescriptions.date, prescriptions.status, prescriptions.price from prescriptions join user_master on user_master.unique_id = prescriptions.uid  where prescriptions.uid = '$uid' order by prescriptions.id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
                                            <?php 
                                                $drid = $row['doctor_id'];
                                                $ress = mysqli_query($conn, "select first_name, last_name from doctor_master where unique_id = '$drid'");
                                                $rows = mysqli_fetch_assoc($ress);
                                            ?>
                                            <td><?php echo htmlentities($rows['first_name']." ".$rows['last_name']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
                                            <td> <?php if($row['status']){echo 'Purchased';}else{echo 'Pending';}?></td>
                                            <td><?php echo htmlentities($row['price']);?></td>
                                            <td>
                                                <a href="view-medicine-user.php?id=<?php echo $row['track_no']?>">View </a>|
                                                <a href="view-bill.php?id=<?php echo $row['track_no']?>&unid=<?php echo $uid;?>">Bill</i></a>
                                            </td>
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