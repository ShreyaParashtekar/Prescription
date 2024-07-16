<?php
    session_start();
    include '../config.php';
    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }

    if(isset($_GET['del']))
    {
        if(mysqli_query($conn,"delete from city_master where City_id = '".$_GET['id']."'"))
        {
            echo "<script>alert('City deleted successfully..!');location.href='view-city.php';</script>";
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
            <li class="breadcrumb-item active" aria-current="page">City</li>
            </ol>
        </nav>
        <div class="cards__heading">
        <div></div>
          <h3>Manage City <a href="add-city.php"><span class="float-right text-primary"><i class="fa fa-plus-square"></i> Add City</span></a></h3>
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
										<th>City</th>
										<th>Status</th>
										<th>Created On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select state_master.State_name, district_master.District_name, city_master.City_id, city_master.City_name, city_master.City_status, city_master.City_created_date from city_master join district_master on city_master.District_id = district_master.District_id join state_master on state_master.State_id = city_master.District_id order by city_master.City_id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['State_name']);?></td>
                                            <td><?php echo htmlentities($row['District_name']);?></td>
                                            <td><?php echo htmlentities($row['City_name']);?></td>
                                            <td> <?php if($row['City_status']){echo 'Active';}else{echo 'In-Active';}?></td>
                                            <td> <?php echo htmlentities($row['City_created_date']);?></td>
                                            <td>
                                                <a href="view-city.php?id=<?php echo $row['City_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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