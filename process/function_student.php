<?php
    session_start();
    clearstatcache();
    if(isset($_GET["f"])) {
        $_GET["f"]();
    }

    function getstudent() {
        include("conn.php");
        $output = '';
        $result_student = mysqli_query($conn, "SELECT * FROM `bcnpb_student` std ORDER BY stdclass");
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered" id="tb_student" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th width="10%" style="text-align: center;">ลำดับ</th>
                            <th width="15%" style="text-align: center;">รหัสนักเรียน</th>
                            <th width="30%" style="text-align: center;">ชื่อ - สกุล</th>
                            <th width="15%" style="text-align: center;">ปีการศึกษา</th>
                            <th width="15%" style="text-align: center;">สถานะ</th>
                            <th width="15%" style="text-align: center;">ดำเนินการ</th>
                        </tr>
                </thead>
                <tbody>
        ';
        $i = 1;
        while($row = mysqli_fetch_array($result_student)) {
            $output .= '
                    <tr>
                    <td style="text-align: center;">'. $i .'</td>
                    <td style="text-align: center;">'. $row["stdCode"] .'</td>
                    <td>'. $row["stdfullname"] .'</td>
                    <td style="text-align: center;">'. $row["stdclass"] .'</td>
                    <td>'. $row["sstName"] .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm edit_data" id="'. $row["std_id"] .'"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-flat btn-sm delete_data" id="'. $row["std_id"] .'" name="'. $row["stdfullname"] .'"><i class="fa fa-trash"></i> ลบ</button>
                    </td>
                </tr>
            ';
            $i++;
        }
        $output .= '
                </tbody>
            </table>
        </div>
        ';
        echo $output;
        mysqli_close($conn);
    }

    function getstudentById(){
        include("conn.php");
        if(isset($_POST["std_id"])) {
            $query = "SELECT * FROM bcnpb_student WHERE std_id = '".$_POST["std_id"]."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            echo json_encode($row);
        }
    }

    function insertstudent(){
        include("conn.php");
        $stdCode = mysqli_real_escape_string($conn, $_POST['stdCode']);
        $stdfullname = mysqli_real_escape_string($conn, $_POST['stdfullname']);
        $sstName = mysqli_real_escape_string($conn, $_POST['sstName']);

        if($_POST["std_id"] != '') {
            $std_id = mysqli_real_escape_string($conn, $_POST['std_id']);
            $query_unique = "SELECT * FROM `bcnpb_student` WHERE `stdCode`='".$stdCode."'";
            $row = mysqli_query($conn, $query_unique);
            $rowcount = mysqli_num_rows($row);
            if ($rowcount == 0 ) {
                $query = "UPDATE `bcnpb_student` SET `stdCode`='".$stdCode."', `stdfullname`='".$stdfullname."', `sstName`='".$sstName."' WHERE `std_id`= '".$std_id."'";
                if(mysqli_query($conn, $query)) {
                    echo "200";
                }else{
                    echo "500";
                }
            } else{
                echo "400";
            }
        }else {
            $query_unique = "SELECT * FROM `bcnpb_student` WHERE `stdCode`='".$stdCode."'";
            $row = mysqli_query($conn, $query_unique);
            $rowcount = mysqli_num_rows($row);
            if ($rowcount == 0 ) {
                $query = "INSERT INTO `bcnpb_student`( `stdCode`, `stdfullname`, `sstName`, `sync_type`) ";
                $query .= "VALUES ('".$stdCode."','".$stdfullname."','".$sstName."', 0)";
                if(mysqli_query($conn, $query)) {
                    echo "200";
                }else{
                    echo "500";
                }   
            } else{
                echo "400";
            }
        }
    }

    function deletestudent() {
        include("conn.php");
        if(isset($_POST["std_id"])) {
            $sql = "DELETE FROM bcnpb_student WHERE std_id = '".$_POST["std_id"]."'";
            if(mysqli_query($conn, $sql)){
            }
            mysqli_close($conn);
       }
    }

    function syncStudentData(){
        include("conn.php");
        if (isset($_POST["data"])) {
            $rec = $_POST["data"];
            $stdclass = $_POST["data_year"];
            $arr_length = count($rec);
            $count_success = 0;
            $count_error = 0;
            for ($i=0 ; $i < $arr_length ; $i++){
                $stdCode = $rec[$i]['stdCode'];
                $stdfullname = $rec[$i]['stdfullname'];
                $sstName = $rec[$i]['sstName'];
                
                $query_unique = "SELECT * FROM `bcnpb_student` WHERE `stdCode`='".$stdCode."'";
                $row = mysqli_query($conn, $query_unique);
                $rowcount = mysqli_num_rows($row);
                if ($rowcount == 0 ) {
                    $query = "INSERT INTO `bcnpb_student`( `stdCode`, `stdfullname`, `stdclass`, `sstName`, `sync_type`) ";
                    $query .= "VALUES ('".$stdCode."','".$stdfullname."','".$stdclass."','".$sstName."', 1)";
                    if(mysqli_query($conn, $query)) {
                        $count_success++;
                    }else{
                        $count_error++;
                    }   
                } else{
                    $query = "UPDATE `bcnpb_student` SET `stdfullname`= '".$stdfullname."',`stdclass`= '".$stdclass."',`sstName`= '".$sstName."',`sync_type`= '1' WHERE `stdCode`= '".$stdCode."' ";
                    if(mysqli_query($conn, $query)) {
                        $count_success++;
                    }else{
                        $count_error++;
                    }
                }
            }
            mysqli_close($conn);
            $message_alert = "ทำรายการสำเร็จ ".$count_success." รายการ";
            if ($count_error != 0){
                $message_alert .= "<br/>ทำรายการไม่สำเร็จ ".$count_error." รายการ";
            }
            echo $message_alert;
        }
    }


?>