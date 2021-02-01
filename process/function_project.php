<?php
    session_start();
    clearstatcache();
    if(isset($_GET["f"])) {
        $_GET["f"]();
    }

    function getproject() {
        include("conn.php");
        $output = '';
        $result_project = mysqli_query($conn, "SELECT * FROM `bcnpb_project`");
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered" id="tb_project" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th width="3%" style="text-align: center;" rowspan="2">ลำดับ</th>
                            <th width="12%" style="text-align: center;" rowspan="2">รหัสโครงการ</th>
                            <th width="25%" style="text-align: center;" rowspan="2">โครงการ</th>
                            <th width="13%" style="text-align: center;" rowspan="2">วงเงินอนุมัติ (บาท)</th>
                            <th width="32%" style="text-align: center;" colspan="3">งบประมาณ</th>
                            <th width="15%" style="text-align: center;" rowspan="2">ดำเนินการ</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">แผนเบิกจ่าย</th>
                            <th style="text-align: center;">เบิกจ่าย</th>
                            <th style="text-align: center;">คงเหลือ (บาท)</th>
                        </tr>
                </thead>
                <tbody>
        ';
        $i = 1;
        while($row = mysqli_fetch_array($result_project)) {
            $output .= '
                    <tr>
                    <td style="text-align: center;">'. $i .'</td>
                    <td style="text-align: center;">'. $row["project_code"] .'</td>
                    <td>'. $row["project_name"] .'</td>
                    <td>'. number_format($row["project_total_amount"],2) .'</td>
                    <td>'. number_format($row["project_plan_amount"],2) .'</td>
                    <td>'. number_format($row["project_disbursement_amount"],2) .'</td>
                    <td>'. number_format($row["project_amount_remain"],2) .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm edit_data" id="'. $row["project_id"] .'"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-flat btn-sm delete_data" id="'. $row["project_id"] .'" name="'. $row["project_name"] .'"><i class="fa fa-trash"></i> ลบ</button>
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

    function getprojectById(){
        include("conn.php");
        if(isset($_POST["project_id"])) {
            $query = "SELECT * FROM bcnpb_project WHERE project_id = '".$_POST["project_id"]."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            echo json_encode($row);
        }
    }

    function insertproject(){
        include("conn.php");
        $project_code = mysqli_real_escape_string($conn, $_POST['project_code']);
        $project_name = mysqli_real_escape_string($conn, $_POST['project_name']);
        $project_total_amount = mysqli_real_escape_string($conn, $_POST['project_total_amount']);
        $project_plan_amount = mysqli_real_escape_string($conn, $_POST['project_plan_amount']);
        $project_disbursement_amount = mysqli_real_escape_string($conn, $_POST['project_disbursement_amount']);
        $project_amount_remain = mysqli_real_escape_string($conn, $_POST['project_amount_remain']);
        $project_type = mysqli_real_escape_string($conn, $_POST['project_type']);
        $project_status = mysqli_real_escape_string($conn, $_POST['project_status']);

        if($_POST["project_id"] != '') {
            $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);
            $query = "UPDATE `bcnpb_project` SET `project_code`='".$project_code."' ,`project_name`= '".$project_name."',`project_total_amount`= ".$project_total_amount.",`project_plan_amount`= ".$project_plan_amount.",`project_disbursement_amount`= ".$project_disbursement_amount.",`project_amount_remain`= ".$project_amount_remain.",`project_type`= '".$project_type."',`project_status`= '".$project_status."' WHERE `project_id`= '".$project_id."'";
            if(mysqli_query($conn, $query)) {
                echo "200";
            }else{
                echo "500";
            }
        }else {
            $query = "INSERT INTO `bcnpb_project`( `project_code`, `project_name`, `project_total_amount`, `project_plan_amount`, `project_disbursement_amount`, `project_amount_remain`, `project_type`, `project_status`) ";
            $query .= "VALUES ('".$project_code."', '".$project_name."', ".$project_total_amount.", ".$project_plan_amount.", ".$project_disbursement_amount.", ".$project_amount_remain.", '".$project_type."' , '".$project_status."')";
            if(mysqli_query($conn, $query)) {
                echo "200";
            }else{
                echo "500";
            }
        }
    }

    function deleteproject() {
        include("conn.php");
        if(isset($_POST["project_id"])) {
            $sql = "DELETE FROM bcnpb_project WHERE project_id = '".$_POST["project_id"]."'";
            if(mysqli_query($conn, $sql)){
            }
            mysqli_close($conn);
       }
    }

    function syncProjectData(){
        include("conn.php");
        if (isset($_POST["data"])) {
            $rec = $_POST["data"];
            $data_year = $_POST["data_year"];
            $arr_length = count($rec['data']);
            $count_success = 0;
            $count_error = 0;
            for ($i=0 ; $i < $arr_length ; $i++){
                $project_id = $rec['data'][$i]['project_id'];
                $project_code = $rec['data'][$i]['project_code'];
                $project_name = $rec['data'][$i]['project_name'];
                $date_between = $rec['data'][$i]['date_between'];
                $project_status = $rec['data'][$i]['project_status_name'];
                $project_total_amount = $rec['data'][$i]['sum_approval_amount'];
                $project_plan_amount = $rec['data'][$i]['allocates'];
                $project_disbursement_amount = $rec['data'][$i]['used'];
                $project_amount_remain = $rec['data'][$i]['total'];
                $project_type = $rec['data'][$i]['type'];
                if ($project_type=="1"){
                    $project_type = "ด้านงานประจำ";
                } else  if ($project_type=="2"){
                    $project_type = "ด้านยุทธศาสตร์/นโยบาย";
                } else  if ($project_type=="3"){
                    $project_type = "ด้านทำนุบำรุงศิลปวัฒนธรรม";
                } else  if ($project_type=="4"){
                    $project_type = "ด้านบริการวิชาการ";
                } else  if ($project_type=="5"){
                    $project_type = "ด้านวิจัยและนวัตกรรม";
                } else  if ($project_type=="6"){
                    $project_type = "ด้านผลิตบัณฑิต";
                } else  if ($project_type=="7"){
                    $project_type = "ด้่านบริหารจัดการ";
                }
                $error_msg = "";
                $query_unique = "SELECT * FROM `bcnpb_project` WHERE `project_id_sync`='".$project_id."'";
                $row = mysqli_query($conn, $query_unique);
                $rowcount = mysqli_num_rows($row);
                if ($rowcount == 0 ) {
                    $query = "INSERT INTO `bcnpb_project`( `project_id_sync`,`project_code`, `project_name`, `date_between`, `project_total_amount`, `project_plan_amount`, `project_disbursement_amount`, `project_amount_remain`, `project_type`, `project_status`, `project_year`) ";
                    $query .= "VALUES ('".$project_id."','".$project_code."','".$project_name."','".$date_between."','".$project_total_amount."','".$project_plan_amount."','".$project_disbursement_amount."','".$project_amount_remain."','".$project_type."','".$project_status."','".$data_year."')";
                    if(mysqli_query($conn, $query)) {
                        $count_success++;
                    }else{
                        $error_msg .= $query."<br/>";
                        $count_error++;
                    }   
                } else{
                    $query = "UPDATE `bcnpb_project` SET ";
                    $query .= "`project_code`= '".$project_code."',`project_name`= '".$project_name."',`date_between`= '".$date_between."',`project_total_amount`= '".$project_total_amount."',`project_plan_amount`= '".$project_plan_amount."',`project_year`= '".$data_year."', ";
                    $query .= "`project_disbursement_amount`= '".$project_disbursement_amount."',`project_amount_remain`= '".$project_amount_remain."',`project_type`= '".$project_type."',`project_status`='".$project_status."' WHERE `project_id`= '".$project_id."'";
                    if(mysqli_query($conn, $query)) {
                        $count_success++;
                    }else{
                        $error_msg .= $query."<br/>";
                        $count_error++;
                    }
                }
            }
            mysqli_close($conn);
            $message_alert = "ทำรายการสำเร็จ ".$count_success." รายการ";
            if ($count_error != 0){
                $message_alert .= "<br/>ทำรายการไม่สำเร็จ ".$count_error." รายการ<br/>".$error_msg;
            }
            echo $message_alert;
        }
    }


?>