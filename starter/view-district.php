<?php
    session_start();
    include '../config.php';
    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }

    if(isset($_GET['del']))
    {
        if(mysqli_query($conn,"delete from district_master where District_id = '".$_GET['id']."'"))
        {
            echo "<script>alert('District deleted successfully..!');location.href='view-district.php';</script>";
        }
        else
        {
            echo "<script>alert('Unable to delete medicine..!')</script>";
            // echo mysqli_error($conn);
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
            <li class="breadcrumb-item active" aria-current="page">District</li>
            </ol>
        </nav>
        <div class="cards__heading">
        <div></div>
          <h3>Manage District <a href="add-district.php"><span class="float-right text-primary"><i class="fa fa-plus-square"></i> Add District</span></a></h3>
        </div>
        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>State</th>
										<th>District</th>
										<th>Status</th>
										<th>Created On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select  district_master.District_id, state_master.State_name, district_master.District_name, district_master.D_status, district_master.DCreated_date from district_master join state_master on state_master.State_id = district_master.State_id order by district_master.District_id  desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['State_name']);?></td>
                                            <td><?php echo htmlentities($row['District_name']);?></td>
                                            <td> <?php if($row['D_status']){echo 'Active';}else{echo 'In-Active';}?></td>
                                            <td> <?php echo htmlentities($row['DCreated_date']);?></td>
                                            <td>
                                                <a href="view-district.php?id=<?php echo $row['District_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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