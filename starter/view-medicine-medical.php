<?php
    session_start();
    $trno = $_GET['id'];
    $unid = $_GET['unid'];
    include '../config.php';
    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    else if(isset($_POST['submit']))
    {
        $price = $_POST['price'];
        if(mysqli_query($conn, "update prescriptions set price = '$price', status = true where track_no = '$trno' and uid = '$unid'"))
        {
            echo "<script>alert('Medicine purchased successfully..');location.href='view-bill.php?id=$trno&unid=$unid'</script>";
        }
        else
        {
            echo "<script>alert('Unable to purchase medicine..');</script>";
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
            <li class="breadcrumb-item active" aria-current="page">View Medicine</li>
            </ol>
        </nav>

        <div class="cards__heading">
        <div></div>
          <h3>View Medicine<a href="index.php?submit_search&unid=<?php echo $unid;?>" class="text-primary float-right">Back</a></h3>
        </div>
        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                    <th>#</th>
										<th>Medicine Name</th>
										<th>No. of Days</th>
										<th>Timings</th>
										<th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select company_master.Company_name, medicine.no_of_days, medicine.timings, medicine.date from medicine join company_master on company_master.Company_id = medicine.medicine_id where medicine.track_no = '$trno' order by medicine.id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                        <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['Company_name']);?></td>
                                            <td><?php echo htmlentities($row['no_of_days']." Days");?></td>
                                            <td><?php echo htmlentities($row['timings']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; 
                                    } ?>
                                </tbody>			
                            </table>
                        </div>
                        <form method="post" action="#">
                            <div class="row mt-5">
                                    <div class="col-5">
                                        <input type="number" placeholder="Total Price" min="1" class="form-control input-style" name="price" required>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-style btn-primary mr-2" name="submit">Purchase</button> 
                                    </div>
                            </div>
                        </form>
          </div>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
  ?>