<?php
    session_start();
    include '../config.php';
    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }

    if(isset($_GET['del']))
    {
        if(mysqli_query($conn,"delete from medicine_master where Medicine_id = '".$_GET['id']."'"))
        {
            echo "<script>alert('Medicine deleted successfully..!');location.href='medicine-list.php';</script>";
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
            <li class="breadcrumb-item active" aria-current="page">Medicine</li>
            </ol>
        </nav>
        <div class="cards__heading">
        <div></div>
          <h3>Manage Medicine <a href="add-medicine.php"><span class="float-right text-primary"><i class="fa fa-plus-square"></i> Add Medicine</span></a></h3>
        </div>
        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Company Name</th>
										<th>Medicine Name</th>
										<th>Description</th>
										<th>Status</th>
										<th>Created On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select medicine_master.Medicine_id, medicine_master.Medcine_name, medicine_master.Description, medicine_master.Medicine_status, medicine_master.MCreated_date, company_master.Company_name from medicine_master join company_master on company_master.Company_id = medicine_master.Company_id order by medicine_master.Medicine_id desc ");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['Company_name']);?></td>
                                            <td><?php echo htmlentities($row['Medcine_name']);?></td>
                                            <td><?php echo htmlentities($row['Description']);?></td>
                                            <td> <?php if($row['Medicine_status']){echo 'Active';}else{echo 'In-Active';}?></td>
                                            <td> <?php echo htmlentities($row['MCreated_date']);?></td>
                                            <td>
                                                <a href="medicine-list.php?id=<?php echo $row['Medicine_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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