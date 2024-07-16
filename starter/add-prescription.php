<?php
    session_start();
    $unid = $_GET['unid'];
    $uid = $_SESSION['uid'];
    $trano = $_GET['medid'];
    include '../config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    else if(isset($_POST['submit']))
    {
        $time = "";
        if(!empty($_POST['check_list'])){
            foreach($_POST['check_list'] as $selected){
                $time=$time.$selected;
            }
            $presc = $_POST['medicine'];
            $qty = $_POST['quantity'];

            mysqli_query($conn, "INSERT INTO `medicine`( `medicine_id`, `no_of_days`,  `status`, `track_no`, timings) VALUES('$presc','$qty',true, '$trano', '$time')");
        }
        else
        {
            echo "<script>alert('Kindly choose timings..');</script>";
        }
    }
    else if(isset($_POST['submitadd']))
    {
        $time = "";
        if(!empty($_POST['check_list'])){
            foreach($_POST['check_list'] as $selected){
                $time=$time.$selected;
            }

            $presc = $_POST['medicine'];
            $qty = $_POST['quantity'];
    
            if(mysqli_query($conn, "INSERT INTO `medicine`( `medicine_id`, `no_of_days`,  `status`, `track_no`, timings ) VALUES('$presc','$qty',true, '$trano', '$time')")){
                if(mysqli_query($conn, "insert into prescriptions (uid, doctor_id, status, track_no)values('$unid','$uid', false, $trano)"))
                {
                    echo "<script>alert('Prescription sumitted successfully..Thank you');window.location.href='prescrption.php';</script>";
                }
                else
                {
                    echo "<script>alert('Unable to process..');</script>";
                }
            }
            else {
                echo "<script>alert('Unable to process..');</script>";
            }
        }
        else
        {
            echo "<script>alert('Kindly choose timings..');</script>";
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
            <li class="breadcrumb-item"><a href="prescrption.php">Prescription</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>

        <div class="cards__heading">
          <h3>Add Prescription<a href="prescrption.php?submit_search&unid=<?php echo $unid;?>" class="text-primary float-right">Back</a></h3>
        </div>

        <div class="card card_border p-lg-5  mb-4">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12 align-self pr-lg-4">
                <form action="#" method="post">

                    <div class="row">
                        <div class="col-4"><strong>Prescription</strong></div>
                        <div class="col-4"><strong>No. of Days</strong></div>
                        <div class="col-4"><strong>Timings</strong></div>
                    </div>
                    <div class="row mt-4">
                    <?php
                        $res = mysqli_query($conn, "select medicine.no_of_days, medicine.timings, medicine_master.Medcine_name  from medicine join medicine_master on medicine_master.Medicine_id = medicine.medicine_id where track_no = '$trano'");
                        if(mysqli_num_rows($res)>0)
                        {
                            $count=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                ?>
                                <div class="col-4"><strong><?php echo $count.". ".$row['Medcine_name'];?></strong></div>
                                <div class="col-4"><strong><?php echo $row['no_of_days'];?></strong></div>
                                <div class="col-4"><strong><?php echo $row['timings'];?></strong></div>
                            <?php
                            $count++;
                            }
                        }
                    ?>
                    </div>

                    <div class="row mt-5">
                        <div class="col-3">
                        <label for="inputPassword3" class="col-form-label input__label">Choose Medicine</label>
                        
                        <select class="form-control input-style" aria-label="Default select example" required name="medicine">
                            <option value="">Select Medicine</option>
                            <?php 
                                $res = mysqli_query($conn, "select medicine_master.Medicine_id , medicine_master.Medcine_name, company_master.Company_name from medicine_master join company_master on company_master.Company_id = medicine_master.Company_id");
                                while($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <option value="<?php echo $row['Medicine_id'];?>"><?php echo $row['Medcine_name']."(".$row['Company_name'].")";?></option>
                                    <?php
                                }?>
                        </select>        
                    </div>
                    
                    <div class="col-3">
                        <label for="inputPassword3" class="col-form-label input__label">Choose No. of Days</label>
                        <input type="number" placeholder="No. of Days" min="1" class="form-control input-style" name="quantity" id="validationDefault01" required>
                    </div>
                    

                    <div class="col-6">
                        <label for="inputPassword3" class="col-form-label input__label">Timings</label>
                        <br>
                        <input type="checkbox" name="check_list[]" value="Morning, "><label>&nbsp;&nbsp;Morning</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="check_list[]" value="Afternoon, "><label>&nbsp;&nbsp;Afternoon</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="check_list[]" value="Night, "><label>&nbsp;&nbsp;Night</label>
                    </div>
                </div>


                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-style btn-primary mr-2" name="submitadd">Submit</button>                      
                            <button type="submit" class="btn btn-style border-btn" name="submit">Add+</button>
                        </div>
                    </div>
                </form>
                
              </div>
            </div>
          </div>
        </div>

        
    </div>
</div>

<?php
    include 'footer.php';
  ?>
  