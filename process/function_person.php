<?php
    session_start();
    clearstatcache();
    if(isset($_GET["f"])) {
        $_GET["f"]();
    }

    function gethrperson() {
        include("conn.php");
        $output = '';
        $result_person = mysqli_query($conn, "SELECT hr.perid,hr.`Teacher_code`,hr.`id`,hr.`sex`,concat(pf.prefixName,hr.fname,' ',hr.lname) as fullname,hr.cerid 
                                            FROM `dev_hrperson` hr 
                                            INNER JOIN dev_cprefix pf on hr.pcode = pf.pcode order by hr.Teacher_code");
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered" id="tb_person" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th width="10%" style="text-align: center;">เลขรหัสครู</th>
                            <th width="15%" style="text-align: center;">เลขบัตรประชาชน</th>
                            <th width="30%" style="text-align: center;">ชื่อ - สกุล</th>
                            <th width="10%" style="text-align: center;">เพศ</th>
                            <th width="15%" style="text-align: center;">เลขใบอนุญาต</th>
                            <th width="20%" style="text-align: center;">ดำเนินการ</th>
                        </tr>
                </thead>
                <tbody>
        ';
        while($row = mysqli_fetch_array($result_person)) {
            if($row["sex"] == "1"){
                $sex = "ชาย";
            }else if($row["sex"] == "2"){
                $sex = "หญิง";
            }else{
                $sex = "ไม่ระบุ";
            }
            $output .= '
                    <tr>
                    <td style="text-align: center;">'. $row["Teacher_code"] .'</td>
                    <td style="text-align: center;">'. $row["id"] .'</td>
                    <td>'. $row["fullname"] .'</td>
                    <td>'. $sex .'</td>
                    <td>'. $row["cerid"] .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm edit_data" id="'. $row["perid"] .'"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-flat btn-sm delete_data" id="'. $row["perid"] .'" name="'. $row["Fullname"] .'"><i class="fa fa-trash"></i> ลบ</button>
                    </td>
                </tr>
            ';
        }
        $output .= '
                </tbody>
            </table>
        </div>
        ';
        echo $output;
        mysqli_close($conn);
    }

    function gethrpersonById(){
        include("conn.php");
        if(isset($_POST["perid"])) {
            $query = "SELECT * FROM dev_hrperson WHERE perid = '".$_POST["perid"]."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            echo json_encode($row);
        }
    }

    function insertperson(){
        include("conn.php");
        $teacher_code = mysqli_real_escape_string($conn, $_POST['teacher_code']);
        $id_card = mysqli_real_escape_string($conn, $_POST['id_card']);
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);
        $pcode = mysqli_real_escape_string($conn, $_POST['pcode']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $cercode = mysqli_real_escape_string($conn, $_POST['cercode']);
        $cerid = mysqli_real_escape_string($conn, $_POST['cerid']);
        $levelcode = mysqli_real_escape_string($conn, $_POST['levelcode']);
        $statusId = mysqli_real_escape_string($conn, $_POST['statusId']);
        $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
        $appointdate = mysqli_real_escape_string($conn, $_POST['appointdate']);

        if($_POST["perid"] != '') {
            $perid = mysqli_real_escape_string($conn, $_POST['perid']);
            $query_unique = "SELECT * FROM `dev_hrperson` WHERE `Teacher_code`='".$teacher_code."'";
            $row = mysqli_query($conn, $query_unique);
            $rowcount = mysqli_num_rows($row);
            if ($rowcount == 0 ) {
                $query = "UPDATE `dev_hrperson` SET `Teacher_code`='".$teacher_code."', `id`='".$id_card."', `sex`='".$sex."', `pcode`='".$pcode."', `fname`='".$fname."', `lname`='".$lname."', `cercode`='".$cercode."', `cerid`='".$cerid."', `levelcode`='".$levelcode."', `birthdate`='".$birthdate."',`appointdate`='".$appointdate."' WHERE `perid`= '".$perid."'";
                if(mysqli_query($conn, $query)) {
                    echo "200";
                }else{
                    echo "500";
                }
            } else{
                echo "400";
            }
        }else {
            $query_unique = "SELECT * FROM `dev_hrperson` WHERE `Teacher_code`='".$teacher_code."'";
            $row = mysqli_query($conn, $query_unique);
            $rowcount = mysqli_num_rows($row);
            if ($rowcount == 0 ) {
                $query = "INSERT INTO `dev_hrperson`(`Teacher_code`, `id`, `sex`, `pcode`, `fname`, `lname`, `cercode`, `cerid`, `levelcode`, `statusId`, `birthdate`, `appointdate`, `schstartdate`, `schstopdate`, `Dev_type`, `startdate`) ";
                $query .= "VALUES ('".$teacher_code."','".$id_card."','".$sex."','".$pcode."','".$fname."','".$lname."','".$cercode."','".$cerid."','".$levelcode."','".$statusId."','".$birthdate."','".$appointdate."',NOW(),NOW(),'N',NOW())";
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

    function deleteperson() {
        include("conn.php");
        if(isset($_POST["teacher_id"])) {
            $sql = "DELETE FROM dev_hrperson WHERE perid = '".$_POST["teacher_id"]."'";
            if(mysqli_query($conn, $sql)){
            }
            mysqli_close($conn);
       }
    }


?>