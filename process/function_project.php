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

    function getprojectObjective() {
        include("conn.php");
        $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);

        $output = '';
        $result_project = mysqli_query($conn, "SELECT * FROM `bcnpb_project_objective` WHERE project_id=".$project_id);
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered" id="tb_project_objective" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th width="10%" style="text-align: center;">ลำดับ</th>
                            <th width="70%" style="text-align: center;">วัตถุประสงค์โครงการ</th>
                            <th width="20%" style="text-align: center;">ดำเนินการ</th>
                        </tr>
                </thead>
                <tbody>
        ';
        $i = 1;
        while($row = mysqli_fetch_array($result_project)) {
            $output .= '
                    <tr>
                    <td style;="text-align: center;">'. $i .'</td>
                    <td style="text-align: left;">'. $row["project_objective_name"] .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm edit_data" id="'. $row["project_objective_id"] .'"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-flat btn-sm delete_data" id="'. $row["project_objective_id"] .'" name="'. $row["project_objective_name"] .'"><i class="fa fa-trash"></i> ลบ</button>
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

    function getprojectTarget() {
        include("conn.php");
        $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);

        $output = '';
        $result_project = mysqli_query($conn, "SELECT * FROM `bcnpb_project_traget` WHERE project_id=".$project_id);
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered" id="tb_project_target" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th width="10%" style="text-align: center;">ลำดับ</th>
                            <th width="70%" style="text-align: center;">กลุ่มเป้าหมาย</th>
                            <th width="20%" style="text-align: center;">ดำเนินการ</th>
                        </tr>
                </thead>
                <tbody>
        ';
        $i = 1;
        while($row = mysqli_fetch_array($result_project)) {
            $output .= '
                    <tr>
                    <td style="text-align: center;">'. $i .'</td>
                    <td style="text-align: left;">'. $row["project_target_name"] .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm edit_data" id="'. $row["project_target_id"] .'"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-flat btn-sm delete_data" id="'. $row["project_target_id"] .'" name="'. $row["project_target_name"] .'"><i class="fa fa-trash"></i> ลบ</button>
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

    function getprojectProduct() {
        include("conn.php");
        $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);

        $output = '';
        $result_project = mysqli_query($conn, "SELECT * FROM `bcnpb_project_product` WHERE project_id=".$project_id);
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered" id="tb_project_product" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th width="10%" style="text-align: center;">ลำดับ</th>
                            <th width="70%" style="text-align: center;">กลุ่มเป้าหมาย</th>
                            <th width="20%" style="text-align: center;">ดำเนินการ</th>
                        </tr>
                </thead>
                <tbody>
        ';
        $i = 1;
        while($row = mysqli_fetch_array($result_project)) {
            $output .= '
                    <tr>
                    <td style="text-align: center;">'. $i .'</td>
                    <td style="text-align: left;">'. $row["project_product_name"] .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm edit_data" id="'. $row["project_product_id"] .'"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-flat btn-sm delete_data" id="'. $row["project_product_id"] .'" name="'. $row["project_product_name"] .'"><i class="fa fa-trash"></i> ลบ</button>
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

    function getprojectBenefits() {
        include("conn.php");
        $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);

        $output = '';
        $result_project = mysqli_query($conn, "SELECT * FROM `bcnpb_project_benefits` WHERE project_id=".$project_id);
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered" id="tb_project_product" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th width="10%" style="text-align: center;">ลำดับ</th>
                            <th width="70%" style="text-align: center;">ประโยชน์ที่คาดว่าจะได้รับ</th>
                            <th width="20%" style="text-align: center;">ดำเนินการ</th>
                        </tr>
                </thead>
                <tbody>
        ';
        $i = 1;
        while($row = mysqli_fetch_array($result_project)) {
            $output .= '
                    <tr>
                    <td style="text-align: center;">'. $i .'</td>
                    <td style="text-align: left;">'. $row["project_benefits_name"] .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm edit_data" id="'. $row["project_benefits_id"] .'"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-flat btn-sm delete_data" id="'. $row["project_benefits_id"] .'" name="'. $row["project_benefits_name"] .'"><i class="fa fa-trash"></i> ลบ</button>
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
            $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);
            $query = "SELECT * FROM bcnpb_project WHERE project_id=".$project_id;
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            echo json_encode($row);
        }
    }

    function insertproject(){
        include("conn.php");
        $project_code = mysqli_real_escape_string($conn, $_POST['project_code']);
        $project_name = mysqli_real_escape_string($conn, $_POST['project_name']);
        $project_name_en = mysqli_real_escape_string($conn, $_POST['project_name_en']);
        $fiscal_year = mysqli_real_escape_string($conn, $_POST['fiscal_year']);
        $date_begin = mysqli_real_escape_string($conn, $_POST['date_begin']);
        $date_end = mysqli_real_escape_string($conn, $_POST['date_end']);
        $plan_type_id = mysqli_real_escape_string($conn, $_POST['plan_type_id']);
        $project_status_id = mysqli_real_escape_string($conn, $_POST['project_status_id']);
        $project_type_id = mysqli_real_escape_string($conn, $_POST['project_type_id']);
        $rationale = mysqli_real_escape_string($conn, $_POST['rationale']);
        $procedures = mysqli_real_escape_string($conn, $_POST['procedures']);
        $operation_location = mysqli_real_escape_string($conn, $_POST['operation_location']);

        if($_POST["project_id"] != '') {
            $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);
            $query = "UPDATE `bcnpb_project` SET ";
            $query .= "`project_code`= '".$project_code."',`project_name`= '".$project_name."',`project_name_en`= '".$project_name_en."',`fiscal_year`= '".$fiscal_year."',`date_begin`= '".$date_begin."',`date_end`= '".$date_end."',`plan_type_id`= '".$plan_type_id."', ";
            $query .= "`project_status_id`= '".$project_status_id."',`project_type_id`= '".$project_type_id."',`rationale`= '".$rationale."',`procedures`='".$procedures."',`operation_location`='".$operation_location."' ";
            $query .= "WHERE `project_id`= '".$project_id."'";
            if(mysqli_query($conn, $query)) {
                echo "200";
            }else{
                echo "500";
            }
        }else {
            $query = "INSERT INTO `bcnpb_project`( `project_code`, `project_name`, `project_name_en`, `fiscal_year`, `date_begin`, `date_end`, `plan_type_id`, `project_status_id`, `project_type_id`, `rationale`, `procedures`, `operation_location`, `is_active`, `is_delete`) ";
            $query .= "VALUES ('".$project_code."','".$project_name."','".$project_name_en."','".$fiscal_year."','".$date_begin."','".$date_end."','".$plan_type_id."','".$project_status_id."','".$project_type_id."','".$rationale."','".$procedures."','".$operation_location."',true,false)";
            if(mysqli_query($conn, $query)) {
                echo "200";
            }else{
                echo "500";
            }
        }
        echo $query;
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
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        // CURLOPT_URL => 'http://dot.pi.ac.th/api//pi_project_activity/getByProjectId/8460?CurrentCollegeId=37',
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => '',
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => 'GET',
        // CURLOPT_HTTPHEADER => array(
        //     'Authorization: Bearer '. $_POST["access_token"]
        // ),
        // ));

        // $response = curl_exec($curl);
        // curl_close($curl);
        // $obj_activity = json_decode($response);
        // echo $obj_activity[1]->project_activity_id;

        if (isset($_POST["data"])) {
            $rec = $_POST["data"];
            $project_id = $rec['project_id'];
            $project_code = $rec['project_code'];
            $project_name = $rec['project_name'];
            $fiscal_year = $rec['fiscal_year'];
            $date_begin = $rec['date_begin'];
            $date_end = $rec['date_end'];
            $plan_type_id = $rec['plan_type_id'];
            $project_status_id = $rec['project_status_id'];
            $project_type_id = $rec['project_type_id'];
            $rationale = $rec['rationale'];
            $procedures = $rec['procedures'];
            $operation_location = $rec['operation_location'];
            $is_active = $rec['is_active'];
            $is_delete = $rec['is_delete'];

            $query_unique = "SELECT * FROM `bcnpb_project` WHERE `project_id_sync`='".$project_id."'";
            $row = mysqli_query($conn, $query_unique);
            $rowcount = mysqli_num_rows($row);
            if ($rowcount == 0 ) {
                $query = "INSERT INTO `bcnpb_project`( `project_id_sync`, `project_code`, `project_name`, `fiscal_year`, `date_begin`, `date_end`, `plan_type_id`, `project_status_id`, `project_type_id`, `rationale`, `procedures`, `operation_location`, `is_active`, `is_delete`) ";
                $query .= "VALUES ('".$project_id."','".$project_code."','".$project_name."','".$fiscal_year."','".$date_begin."','".$date_end."','".$plan_type_id."','".$project_status_id."','".$project_type_id."','".$rationale."','".$procedures."','".$operation_location."',".$is_active.",".$is_delete.")";
            }else{
                $query = "UPDATE `bcnpb_project` SET ";
                $query .= "`project_code`= '".$project_code."',`project_name`= '".$project_name."',`fiscal_year`= '".$fiscal_year."',`date_begin`= '".$date_begin."',`date_end`= '".$date_end."',`plan_type_id`= '".$plan_type_id."', ";
                $query .= "`project_status_id`= '".$project_status_id."',`project_type_id`= '".$project_type_id."',`rationale`= '".$rationale."',`procedures`='".$procedures."',`operation_location`='".$operation_location."',`is_active`='".$is_active."',`is_delete`='".$is_delete."' ";
                $query .= "WHERE `project_id_sync`= '".$project_id."'";
            }
            if(mysqli_query($conn, $query)){
                // Page Obj
                $last_id = $conn->insert_id;
                $query_unique = "SELECT * FROM `bcnpb_project_objective` WHERE `project_objective_sync_id`='".$project_id."'";
                $row = mysqli_query($conn, $query_unique);
                $rowcount = mysqli_num_rows($row);
                if ($rowcount == 0 ) {
                    $project_objective = $rec['pi_project_objective'];
                    for ($i=0 ; $i < count($project_objective); $i++){
                        $query_obj = "INSERT INTO `bcnpb_project_objective`(`project_id`, `project_objective_sync_id`, `project_objective_name`) ";
                        $query_obj .= "VALUES ('".$last_id."','".$project_id."','".$project_objective[$i]['project_objective_name']."')";
                        mysqli_query($conn, $query_obj);
                    }

                    $project_target = $rec['pi_project_target'];
                    for ($i=0 ; $i < count($project_target); $i++){
                        $query_target= "INSERT INTO `bcnpb_project_traget`(`project_id`, `project_target_sync_id`, `project_target_name`) ";
                        $query_target .= "VALUES ('".$last_id."','".$project_id."','".$project_target[$i]['project_target_name']."')";
                        mysqli_query($conn, $query_target);
                    }

                    $project_product = $rec['pi_project_product'];
                    for ($i=0 ; $i < count($project_product); $i++){
                        $query_product = "INSERT INTO `bcnpb_project_product`(`project_id`, `project_product_sync_id`, `project_product_name`) ";
                        $query_product .= "VALUES ('".$last_id."','".$project_id."','".$project_product[$i]['project_product_name']."')";
                        mysqli_query($conn, $query_product);
                    }

                    $project_benefits = $rec['pi_project_benefits'];
                    for ($i=0 ; $i < count($project_benefits); $i++){
                        $query_benefits = "INSERT INTO `bcnpb_project_benefits`(`project_id`, `project_benefits_sync_id`, `project_benefits_name`) ";
                        $query_benefits .= "VALUES ('".$last_id."','".$project_id."','".$project_benefits[$i]['project_benefits_name']."')";
                        mysqli_query($conn, $query_benefits);
                    }
                }
                // Page Activity
            }
            mysqli_close($conn);
        }
    }
?>