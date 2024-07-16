<?php
    // session_start();
    include '../config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    
    // include 'link.php';
    // include 'sidebar.php';
    // include 'header.php';
    ?>
    
  <div class="main-content">
    <div class="container-fluid content-top-gap">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="cards__heading ">
            <div class="row">
                <div class="col-3">
                    <h3>Search Patient</h3>
                </div>
                <div class="col-6">
                    <div class="search-box">
                        <form action="#" method="get">
                            <input class="search-input" placeholder="Search Here..." type="search" id="search" name="unid" required>
                            <button class="search-submit" value="" name="submit_search"><span class="fa fa-search"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card_border p-lg-3">
          <div class="card-body p-0">
            <div class="row">
                <?php
                if(isset($_GET['submit_search']))
                {
                    $unid = $_GET['unid'];
                    $res1 = mysqli_query($conn, "select first_name, unique_id, last_name, email, contact from user_master where unique_id = '$unid'");
                    if(mysqli_num_rows($res1)>0)
                    {
                        $row1 = mysqli_fetch_assoc($res1);
                        ?>
                        
                        <div class="card-body">
                            <div class="cards__heading">
                                <h3>Search Results..</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 align-self pr-lg-4">
                                    <h5 class="my-3">Personal Information</h5>
                                    <label for="validationDefault01" class="form-label">Name : </label>
                                    <?php echo "<strong>".$row1['first_name']." ".$row1['last_name']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Unique ID : </label>
                                    <?php echo "<strong>".$row1['unique_id']."</strong>";?>
                                </div>
                                <div class="col-lg-6 align-self pr-lg-4">
                                    <h5 class="my-3">&nbsp;</h5>
                                    <label for="validationDefault02" class="input__label">Email : </label>
                                    <?php echo "<strong>".$row1['email']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Contact Number : </label>
                                    <?php echo "<strong>".$row1['contact']."</strong>";?><br>
                                </div>
                                <div class="col-lg-12 pl-lg-4 mt-lg-0 mt-4">
                                    <h5 class="mt-5">Medical Information</h5>
                                        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User Id</th>
                                                    <th>Doctor Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php 
                                                $query=mysqli_query($conn,"select uid , doctor_id, date, status, track_no from prescriptions where uid = '$unid' and status=false order by id desc");
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($query))
                                                {?>									
                                                    <tr>
                                                        <td><?php echo htmlentities($cnt);?></td>
                                                        <td><?php echo htmlentities($row['uid']);?></td>
                                                        
                                                        <?php 
                                                $drid = $row['doctor_id'];
                                                $ress = mysqli_query($conn, "select first_name, last_name from doctor_master where unique_id = '$drid'");
                                                $rows = mysqli_fetch_assoc($ress);
                                            ?>
                                            <td><?php echo htmlentities($rows['first_name']." ".$rows['last_name']);?></td>

                                                        <td> <?php echo htmlentities($row['date']);?></td>
                                                        <td> <?php if($row['status']){echo 'Purchased';}else{echo 'Pending';}?></td>

                                                        <td>
                                                        <a href="view-medicine-medical.php?id=<?php echo $row['track_no']?>&unid=<?php echo $unid;?>">View</a> |
                                                        <a href="view-bill.php?id=<?php echo $row['track_no']?>&unid=<?php echo $unid;?>">Bill</i></a>
                                                    </td>

                                                    </tr>
                                                    <?php $cnt=$cnt+1; 
                                                } ?>
                                            </tbody>			
                                        </table>
                                </div>
                            </div>
                            
                        </div>
                    <?php
                    }
                    else
                    {?>
                        <div class="cards__heading">
                            <h3>User ID not found..</h3>
                        </div>
                    <?php
                    }
                }
                else
                {?>
                <div class="text-center col-12">
                    <img src="image/search.jpg" alt="" class="img-fluid rounded" />              
                </div>
                <?php   
                }
                ?>
            </div>
          </div>
        </div>

        
    </div>
</div>

  