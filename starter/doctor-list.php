<?php
    session_start();
    include '../config.php';
    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }

    if(isset($_GET['del']))
    {
        if(mysqli_query($conn,"delete from doctor_master where id = '".$_GET['id']."'"))
        {
            echo "<script>alert('Doctor deleted successfully..!')</script>";
        }
        else
        {
            echo "<script>alert('Unable to delete doctor..!')</script>";
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
            <li class="breadcrumb-item active" aria-current="page">Doctor</li>
            </ol>
        </nav>
        <div class="cards__heading">
        <div></div>
          <h3>Manage Doctors <a href="add-doctor.php"><span class="float-right text-primary"><i class="fa fa-user-md"></i> Add Doctor</span></a></h3>
        </div>
        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Specialization</th>
										<th>Email</th>
										<th>Contact no</th>
										<th>Status</th>
										<th>unique_id</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select specialization, id ,last_name, unique_id, first_name, email, contact, status from doctor_master order by id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']);?></td>
                                            <td><?php echo htmlentities($row['last_name']);?></td>
                                            <td><?php echo htmlentities($row['specialization']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td> <?php echo htmlentities($row['contact']);?></td>
                                            <td> <?php if($row['status']){echo 'Active';}else{echo 'In-Active';}?></td>
                                            <td> <?php echo htmlentities($row['unique_id']);?></td>
                                            <td>
                                                <a href="doctor-list.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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