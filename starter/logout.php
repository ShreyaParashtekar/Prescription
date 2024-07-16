<?php
session_start();
    $_SESSION['first_name'] = "";
    $_SESSION['email'] = "";
    $_SESSION['user_type'] = "";
    $_SESSION['unique_id'] = "";
    $_SESSION['last_name'] = "";
    $_SESSION['image'] = "";
    $_SESSION['login'] = false;

    unset($_SESSION['first_name']);
    unset($_SESSION['email']);
    unset($_SESSION['user_type']);
    unset($_SESSION['unique_id']);
    unset($_SESSION['last_name']);
    unset($_SESSION['image']);
    unset($_SESSION['login']);

    header("Location: ../index.php");

?>