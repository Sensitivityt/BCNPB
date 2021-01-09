<?php
session_start();
session_destroy();
if (isset($_SESSION['person'])) {
    header("location:../index.php");
    exit();
} else {
    header("location:../login.php");
    exit();
}
