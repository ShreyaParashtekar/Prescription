<?php

    $conn = mysqli_connect("localhost", "root", "", "prescription");
    if(!$conn)
    {
        die ("Unable to connect database : ".mysqli_connect_error());
    }
?>