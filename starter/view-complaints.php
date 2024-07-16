<?php
    session_start();
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
            <li class="breadcrumb-item active" aria-current="page">Complaints</li>
            </ol>
        </nav>
        <div class="cards__heading">
        <div></div>
          <h3>Manage Complaints </h3>
        </div>
        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>User Name</th>
										<th>User Phone</th>
										<th>Complaint</th>
										<th>Description</th>
										<th>Created On</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select user_master.first_name, user_master.last_name, user_master.contact, complaint_master.complaint_title, complaint_master.complaint_description, complaint_master.posted_on from complaint_master join user_master on user_master.unique_id = complaint_master.user_id order by complaint_master.complaint_id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
                                            <td><?php echo htmlentities($row['contact']);?></td>
                                            <td><?php echo htmlentities($row['complaint_title']);?></td>
                                            <td><?php echo htmlentities($row['complaint_description']);?></td>
                                            <td> <?php echo htmlentities($row['posted_on']);?></td>
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