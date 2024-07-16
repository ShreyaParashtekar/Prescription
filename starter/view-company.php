<?php
    session_start();
    include '../config.php';
    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }

    if(isset($_GET['del']))
    {
        if(mysqli_query($conn,"delete from company_master where Company_id = '".$_GET['id']."'"))
        {
            echo "<script>alert('Company deleted successfully..!');location.href='view-company.php';</script>";
        }
        else
        {
            echo "<script>alert('Unable to delete company..!')</script>";
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
            <li class="breadcrumb-item active" aria-current="page">Company</li>
            </ol>
        </nav>
        <div class="cards__heading">
        <div></div>
          <h3>Manage Company <a href="add-company.php"><span class="float-right text-primary"><i class="fa fa-building"></i> Add Company</span></a></h3>
        </div>
        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Company Name</th>
										<th>Address</th>
										<th>Contact no</th>
										<th>Status</th>
										<th>Created On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select * from company_master order by Company_id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['Company_name']);?></td>
                                            <td><?php echo htmlentities($row['Company_Address']);?></td>
                                            <td><?php echo htmlentities($row['Company_Contact']);?></td>
                                            <td> <?php if($row['Company_Status']){echo 'Active';}else{echo 'In-Active';}?></td>
                                            <td> <?php echo htmlentities($row['Created_date']);?></td>
                                            <td>
                                                <a href="view-company.php?id=<?php echo $row['Company_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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