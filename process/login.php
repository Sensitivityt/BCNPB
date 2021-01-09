<?php
    session_start();
    include("conn.php");

    $sql = "SELECT * FROM dev_hrperson WHERE Teacher_code = '" . $conn->real_escape_string($_POST['teacher_code']) . "'
    and id = '" . $conn->real_escape_string($_POST['teacher_card_id']) . "'";
    $result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($row) {
        $_SESSION['person'] = $row;
        header("location:../index.php");
    } else {
        header("location:../login.php");
    }
    session_write_close();
    $conn->close();
?>