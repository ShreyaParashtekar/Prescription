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
        
        if(mysqli_query($conn, "insert into state_master(State_name, Status)values('$name', true)"))
        {
            echo "<script>alert('State added successfully..');</script>";
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
            <li class="breadcrumb-item active" aria-current="page">State</li>
            </ol>
        </nav>

        <div class="cards__heading">
          <h3>Add State</h3>
        </div>

        <div class="card card_border p-lg-5 p-3 mb-4">
          <div class="card-body py-3 p-0">
            <div class="row">
              <div class="col-lg-6 align-self pr-lg-4">
                <form action="#" method="post">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label input__label">State Name</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control input-style" name="name" id="validationDefault01" required>
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
  