<?php

    session_start();
    include '../config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: ../index.php");
    }
    else if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $company = $_POST['company'];
        if(mysqli_query($conn, "insert into medicine_master(Company_id, Medcine_name,Description, Medicine_status)values('$company', '$name', '$description', true)"))
        {
            echo "<script>alert('Medicine added successfully..');</script>";
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
            <li class="breadcrumb-item active" aria-current="page">Medicine</li>
            </ol>
        </nav>

        <div class="cards__heading">
          <h3>Add Medicine</h3>
        </div>

        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
              <div class="col-lg-6 align-self pr-lg-4">
                <form action="#" method="post">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Choose Company</label>
                        <div class="col-sm-8">
                        <select class="form-control" aria-label="Default select example" required name="company">
                            <option value="">Select Company</option>
                            <?php 
                                $res = mysqli_query($conn, "select Company_name, Company_id from company_master where Company_Status = true");
                                while($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <option value="<?php echo $row['Company_id'];?>"><?php echo $row['Company_name'];?></option>
                                    <?php
                                }?>
                        </select>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Medicine Name</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control input-style" name="name" id="validationDefault01" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Description</label>
                        <div class="col-sm-8">
                          <textarea name="description" class="form-control" required></textarea>
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
                <img src="image/medicine.jpg" alt="" class="img-fluid rounded" />
              </div>
            </div>
          </div>
        </div>

        
    </div>
</div>

<?php
    include 'footer.php';
  ?>
  `