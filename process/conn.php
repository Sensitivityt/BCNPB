<?php
    $conn = mysqli_connect('localhost','root','','manage_2020');
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
        return;
    }
    // แก้ภาษาต่างด้าว
    mysqli_query($conn, "SET NAMES  UTF8");
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_query($conn, "SET character_set_client=utf8");
    error_reporting(0);
    ini_set("memory_limit","2048M");
?>