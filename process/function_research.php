<?php
    session_start();
    clearstatcache();
    if(isset($_GET["f"])) {
        $_GET["f"]();
    }

    function getresearch() {
        include("conn.php");
        $output = '';
        $result_research = mysqli_query($conn, "SELECT * FROM `bcnpb_research`");
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered" id="tb_research" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th width="6%" style="text-align: center;">ลำดับ</th>
                            <th width="15%" style="text-align: center;">ปีที่เผยแพร่</th>
                            <th width="25%" style="text-align: center;">ชื่อบทความ</th>
                            <th width="25%" style="text-align: center;">ผู้แต่ง</th>
                            <th width="14" style="text-align: center;">ประเภทบทความ</th>
                            <th width="15%" style="text-align: center;">ดำเนินการ</th>
                        </tr>
                </thead>
                <tbody>
        ';
        $i = 1;
        while($row = mysqli_fetch_array($result_research)) {
            if($row["research_type"] == "1"){
                $research_type = "บทความวิจัย";
            } else {
                $research_type = "บทความวิชาการ";
            }
            $output .= '
                    <tr>
                    <td style="text-align: center;">'. $i .'</td>
                    <td style="text-align: center;">'. $row["publish_year_be"] .'</td>
                    <td>'. $row["research_name_th"] .'</td>
                    <td></td>
                    <td style="text-align: center;">'. $research_type .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm edit_data" id="'. $row["research_id"] .'"><i class="fa fa-edit"></i> แก้ไข</button>
                        <button type="button" class="btn btn-danger btn-flat btn-sm delete_data" id="'. $row["research_id"] .'" name="'. $row["research_name_th"] .'"><i class="fa fa-trash"></i> ลบ</button>
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

    function getresearchById(){
        include("conn.php");
        if(isset($_POST["research_id"])) {
            $query = "SELECT * FROM bcnpb_research WHERE research_id = '".$_POST["research_id"]."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            echo json_encode($row);
        }
    }

    function insertresearch(){
        include("conn.php");
        $research_type = mysqli_real_escape_string($conn, $_POST['research_type']);
        $research_name_th = mysqli_real_escape_string($conn, $_POST['research_name_th']);
        $research_name_en = mysqli_real_escape_string($conn, $_POST['research_name_en']);
        $research_journal_id = mysqli_real_escape_string($conn, $_POST['research_journal_id']);
        $research_base_id = mysqli_real_escape_string($conn, $_POST['research_base_id']);
        $at_year = mysqli_real_escape_string($conn, $_POST['at_year']);
        $at_no = mysqli_real_escape_string($conn, $_POST['at_no']);
        $at_page = mysqli_real_escape_string($conn, $_POST['at_page']);
        $publish_year_be = mysqli_real_escape_string($conn, $_POST['publish_year_be']);
        $publish_year_ad = mysqli_real_escape_string($conn, $_POST['publish_year_ad']);
        $publish_date = mysqli_real_escape_string($conn, $_POST['publish_date']);
        $research_branch_group_id_lv1 = mysqli_real_escape_string($conn, $_POST['research_branch_group_id_lv1']);
        $research_branch_group_id = mysqli_real_escape_string($conn, $_POST['research_branch_group_id']);
        $research_multidisciplinary_id = mysqli_real_escape_string($conn, $_POST['research_multidisciplinary_id']);
        $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
        $reference = mysqli_real_escape_string($conn, $_POST['reference']);
        $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);

        if($_POST["research_id"] != '') {
            $research_id = mysqli_real_escape_string($conn, $_POST['research_id']);
            $query = "UPDATE `bcnpb_research` SET `research_type`='".$research_type."' ,`research_name_th`= '".$research_name_th."',";
            $query .= "`research_name_en`= '".$research_name_en."',`research_journal_id`= '".$research_journal_id."',";
            $query .= "`research_base_id`= '".$research_base_id."',`at_year`= '".$at_year."',";
            $query .= "`at_no`= '".$at_no."',`at_page`= '".$at_page."',";
            $query .= "`publish_year_be`= '".$publish_year_be."',`publish_year_ad`= '".$publish_year_ad."',";
            $query .= "`publish_date`= '".$publish_date."',`research_branch_group_id_lv1`= '".$research_branch_group_id_lv1."',";
            $query .= "`research_branch_group_id`= '".$research_branch_group_id."',`research_multidisciplinary_id`= '".$research_multidisciplinary_id."',";
            $query .= "`keyword`= '".$keyword."',`reference`= '".$reference."',`project_id`= '".$project_id."'";
            $query .= " WHERE `research_id`= '".$research_id."'";
            if(mysqli_query($conn, $query)) {
                echo "200";
            }else{
                echo "500";
            }
        }else {
            $query = "INSERT INTO `bcnpb_research`(`research_type`, `research_name_th`, `research_name_en`, `research_journal_id`, `research_base_id`, `at_year`, `at_no`, `at_page`, `publish_year_be`, `publish_year_ad`, `publish_date`, `research_branch_group_id_lv1`, `research_branch_group_id`, `research_multidisciplinary_id`, `keyword`, `reference`, `project_id`) ";
            $query .= "VALUES ('".$research_type."', '".$research_name_th."','".$research_name_en."', '".$research_journal_id."','".$research_base_id."', '".$at_year."','".$at_no."', '".$at_page."','".$publish_year_be."', '".$publish_year_ad."','".$publish_date."', '".$research_branch_group_id_lv1."','".$research_branch_group_id."', '".$research_multidisciplinary_id."','".$keyword."', '".$reference."','".$project_id."')";
            if(mysqli_query($conn, $query)) {
                echo "200";
            }else{
                echo "500";
            }
        }
    }

    function deleteresearch() {
        include("conn.php");
        if(isset($_POST["research_id"])) {
            $sql = "DELETE FROM bcnpb_research WHERE research_id = '".$_POST["research_id"]."'";
            if(mysqli_query($conn, $sql)){
            }
            mysqli_close($conn);
       }
    }

    function syncResearchData(){
        include("conn.php");
        if (isset($_POST["data"])) {
            $rec = $_POST["data"];
            $research_year = $_POST["data_year"];
            $research_id_sync = $rec['research_result_detail_academic_journal_id'];
            $research_type = $rec['type'];
            $research_name_th = $rec['title_th'];
            $research_name_en = $rec['title_en'];
            $research_journal_id = $rec['research_journal_id'];
            $research_base_id = $rec['research_base_id'];
            $at_year = $rec['at_year'];
            $at_no = $rec['at_no'];
            $at_page = $rec['at_page'];
            $publish_year_be = $rec['publish_year_be'];
            $publish_year_ad = $rec['publish_year_ad'];
            $publish_date = $rec['publish_date'];
            $research_branch_group_id_lv1 = $rec['research_branch_group_id_lv1'];
            $research_branch_group_id = $rec['research_branch_group_id'];
            $research_multidisciplinary_id = $rec['research_multidisciplinary_id'];
            $keyword = $rec['keyword'];
            $reference = $rec['reference'];
            $project_id = $rec['project_id'];
            
            $query_unique = "SELECT * FROM `bcnpb_research` WHERE `research_id_sync`='".$research_id_sync."'";
            $row = mysqli_query($conn, $query_unique);
            $rowcount = mysqli_num_rows($row);
            if ($rowcount == 0 ) {
                $query = "INSERT INTO `bcnpb_research`(`research_id_sync`, `research_type`, `research_name_th`, `research_name_en`, `research_journal_id`, `research_base_id`, `at_year`, `at_no`, `at_page`, `publish_year_be`, `publish_year_ad`, `publish_date`, `research_branch_group_id_lv1`, `research_branch_group_id`, `research_multidisciplinary_id`, `keyword`, `reference`, `project_id`, `research_year`) ";
                $query .= "VALUES ('".$research_id_sync."','".$research_type."','".$research_name_th."','".$research_name_en."','".$research_journal_id."','".$research_base_id."','".$at_year."','".$at_no."','".$at_page."','".$publish_year_be."','".$publish_year_ad."','".$publish_date."','".$research_branch_group_id_lv1."','".$research_branch_group_id."','".$research_multidisciplinary_id."','".$keyword."','".$reference."','".$project_id."','".$research_year."')";
                mysqli_query($conn, $query);
            } else{
                $query = "UPDATE `bcnpb_research` SET ";
                $query .= "`research_type`= '".$research_type."',`research_name_th`= '".$research_name_th."',`research_name_en`= '".$research_name_en."',`research_journal_id`= '".$research_journal_id."',`research_base_id`= '".$research_base_id."',`at_year`= '".$at_year."', ";
                $query .= "`at_no`= '".$at_no."',`at_page`= '".$at_page."',`publish_year_be`= '".$publish_year_be."',`publish_year_ad`='".$publish_year_ad."',`publish_date`='".$publish_date."',`research_branch_group_id_lv1`='".$research_branch_group_id_lv1."', ";
                $query .= "`research_branch_group_id`= '".$research_branch_group_id."',`keyword`= '".$keyword."',`reference`= '".$reference."',`project_id`= '".$project_id."' ";
                $query .= " WHERE `research_id_sync`= '".$research_id_sync."' ";
                mysqli_query($conn, $query);
            }
        }
    }


?>