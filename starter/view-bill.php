<?php

    session_start();
    include '../config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    
?>

<!doctype html>
<html lang="en">
  <head>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>

body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

    </style>
    <title>Prescription</title>
  </head>
  <body>
      
  <div class="page-content container" id="printableArea">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #<?php echo $_GET['id'];?>
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print" onclick="printDiv('printableArea')">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="index.php" data-title="PDF">
                    <i class="mr-1 fa fa-home text-danger-m1 text-120 w-2"></i>
                    Home
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <span class="text-default-d3">Prescription</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />
                <?php
                    $res = mysqli_query($conn, "select user_master.first_name, user_master.last_name, user_master.contact, state_master.State_name, district_master.District_name, city_master.City_name  from user_master join state_master on state_master.State_id = user_master.state_id join district_master on district_master.District_id = user_master.district_id join city_master on city_master.City_id = user_master.city_id where user_master.unique_id = '$_GET[unid]'");
                    if(mysqli_num_rows($res)>0){
                        $row = mysqli_fetch_assoc($res);
                    }
                    else{
                        echo "<script>alert('Unable to process..');location.href='index.php';</script>";
                    }
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle"><?php echo $row['first_name']." ".$row['last_name'];?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                            <?php echo $row['City_name'];?>
                            </div>
                            <div class="my-1">
                            <?php echo $row['District_name'];?>, <?php echo $row['State_name'];?>
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?php echo $row['contact'];?></b></div>
                        </div>
                    </div>
                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>
                            <?php
                                $res3 = mysqli_query($conn, "select * from prescriptions where track_no = '$_GET[id]'");
                                if(mysqli_num_rows($res3)>0){
                                    $row3 = mysqli_fetch_assoc($res3);
                                }
                                else{
                                    echo "<script>alert('Unable to process..');location.href='index.php';</script>";
                                }
                            ?>
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Date:</span> <?php echo $row3['date'];?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status: PAID</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Medicine Name</th>
										<th>No. of Days</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select company_master.Company_name, medicine.no_of_days, medicine.timings, medicine.date from medicine join company_master on company_master.Company_id = medicine.medicine_id where medicine.track_no = '$_GET[id]' order by medicine.id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['Company_name']);?></td>
                                            <td><?php echo htmlentities($row['no_of_days']." Days");?></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; 
                                    } ?>
                                </tbody>			
                            </table>

                            
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                        
                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2"><?php echo "Rs. ".$row3['price']." /-";?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>