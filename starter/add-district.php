<?php

    session_start();
    include '../config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    else if(isset($_POST['submit']))
    {
        $state = $_POST['state'];
        $district = $_POST['district'];
        
        if(mysqli_query($conn, "insert into district_master(State_id, District_name,D_status)values('$state', '$district', true)"))
        {
            echo "<script>alert('District added successfully..');</script>";
        }
        else
        {
            echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
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
          <h3>Add District</h3>
        </div>

        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
              <div class="col-lg-6 align-self pr-lg-4">
                <form action="#" method="post">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Choose State</label>
                        <div class="col-sm-8">
                        <select class="form-control" aria-label="Default select example" required name="state">
                            <option value="">Select State</option>
                            <?php 
                                $res = mysqli_query($conn, "select State_id , State_name from state_master where Status = true");
                                while($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <option value="<?php echo $row['State_id'];?>"><?php echo $row['State_name'];?></option>
                                    <?php
                                }?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">District Name</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control input-style" name="district" id="validationDefault01" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary btn-style" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
                
              </div>
              <div class="col-lg-6 pl-lg-4 mt-lg-0 mt-4">
                <img src="image/location.jpg" alt="" class="img-fluid rounded" />
              </div>
            </div>
          </div>
        </div>

        
    </div>
</div>

<?php
    include 'footer.php';
  ?>
  