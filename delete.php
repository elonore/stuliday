<?php

    require('inc/connect.php');
    require('assets/head.php');
    require('inc/functions.php');

    $userid = $_SESSION['id'];
    $id = $_GET['id'];
    var_dump($userid);

    delete($id);

    

   header("Location:profile.php");

?>