<?php
session_start();
include('process/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>วิทยาลัยพยาบาลบรมราชชนนี พระพุทธบาท</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico" type="image/ico" sizes="16x16">

    <!-- Tab -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style type="text/css">
        .text-red {
            color: #dd4b39 !important;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include('inc/sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include('inc/topbar.php'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div id="alert_main"></div>
                    <div class="card shadow mb-4" id="card_form">
                        <div class="card-header py-3">
                            <span class="badge badge-default float-right m-2">
                                <button type="button" class="btn btn-outline-secondary btn-md" id="btn-back"><i class="fa fa-arrow-left"></i> กลับ</button>
                            </span>
                            <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลโครงการ</h6>
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="nav-item liDetail">
                                <a class="nav-link active" data-toggle="tab" href="#project_detail">รายละเอียด</a>
                            </li>
                            <li class="nav-item liActivity">
                                <a class="nav-link" data-toggle="tab" href="#project_activity">กิจกรรม</a>
                            </li>
                            <li class="nav-item liOper">
                                <a class="nav-link" data-toggle="tab" href="#">ผู้ดำเนินการ</a>
                            </li>
                            <li class="nav-item liDisbursementPlan">
                                <a class="nav-link" data-toggle="tab" href="#">แผนเบิกจ่าย</a>
                            </li>
                            <li class="nav-item liDisbursement">
                                <a class="nav-link" data-toggle="tab" href="#">เบิกจ่าย</a>
                            </li>
                            <li class="nav-item liBligation">
                                <a class="nav-link" data-toggle="tab" href="#">ยุทธศาสตร์</a>
                            </li>
                            <li class="nav-item liMeasure">
                                <a class="nav-link" data-toggle="tab" href="#">ตัวชี้วัด</a>
                            </li>
                            <li class="nav-item liAttach">
                                <a class="nav-link" data-toggle="tab" href="#">แนปไฟล์</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="project_detail">
                                <?php include('manage_project_detail.php') ?>
                            </div>
                            <div class="tab-pane fade" id="project_activity">
                                <?php include('manage_project_activity.php') ?>
                            </div>
                        </div>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" id="card_tree">
                        <div class="card-header py-3">
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> เพิ่มโครงการ</button></span>
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-info btn-sm" name="btn-sync" id="btn-sync"><i class="fa fa-sync"></i> Sync ข้อมูลโครงการ</button></span>
                            <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลโครงการ</h6>
                        </div>
                        <div class="card-body" id="tb_project_tag">
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Modal confirm -->
            <div class="modal modal-danger fade" id="confirmModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ลบข้อมูลโครงการ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="confirmMessage">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" id="confirmCancel">ยกเลิก</button>
                            <button type="button" class="btn btn-danger" id="confirmOk">ลบ</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- Alert Modal-->
            <div class="modal fade" id="calAlertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ผิดพลาด</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="alert_text"></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Sync -->
            <div id="div_modelSync"></div>
            <div class="modal modal-danger fade" id="SyncModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">เลือกปีที่ Sync</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="syncMessage">
                            <div class="form-group">
                                <label for="project_plan_amount">ปี พ.ศ. <span class="text-red">*</span></label>
                                <select class="form-control" id="year_sync" name="year_sync" required>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" id="syncOk">Sync Data</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- Modal confirm -->
            <div class="modal modal-danger fade" id="loadModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">กำลังโหลดข้อมูล</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" id="loadMessage">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <?php include('inc/footer.php'); ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <?php include('inc/modal.php'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Datetime Thai -->
    <!-- <script src="//getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
    <script src="//getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-datepicker-thai.js"></script>
    <script src="js/locales/bootstrap-datepicker.th.js"></script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            var lang = {
                "sProcessing": "กำลังดำเนินการ...",
                "sLengthMenu": "แสดง _MENU_ รายการ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "sInfo": "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ รายการ)",
                "sInfoPostFix": "",
                "sSearch": "<b>ค้นหา</b> ",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                }
            };

            LoadData();

            function LoadData() {
                getproject();
                LoadYear();
                LoadStatus();
                LoadPlane();
                LoadProjectType();
                $('#card_form').hide();
            }

            function getproject() {
                $.ajax({
                    url: "process/function_project.php?f=getproject",
                    method: "GET",
                    success: function(data) {
                        $('#' + 'tb_project_tag').html(data);
                        setTableProject();
                        $('#card_form').hide();
                    }
                });
            }

            function LoadYear() {
                var settings = {
                    "url": "http://dot.pi.ac.th/api//authentication/login",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify({
                        "username": "usercode37",
                        "password": "usercode37"
                    }),
                };
                $.ajax(settings).done(function(response) {
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//sfs/fin/fin0021/getAllYearForDropdown?CurrentCollegeId=37",
                        "method": "GET",
                        "timeout": 0,
                        "headers": {
                            "Authorization": "Bearer " + response.access_token,
                            "Content-Type": "application/json"
                        }
                    };

                    $.ajax(settings).done(function(response) {
                        var fiscal_year = "";
                        for (var i = 0; i < response.length; i++) {
                            fiscal_year += "<option value=" + response[i].value + ">" + response[i].text + "</option>";
                        }
                        $('#fiscal_year').html(fiscal_year);
                        $('#year_sync').html(fiscal_year);
                    });
                });
            }

            function LoadStatus() {
                var settings = {
                    "url": "http://dot.pi.ac.th/api//authentication/login",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify({
                        "username": "usercode37",
                        "password": "usercode37"
                    }),
                };
                $.ajax(settings).done(function(response) {
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//sfs/pms/pms001/getAllForDropdown?CurrentCollegeId=37",
                        "method": "GET",
                        "timeout": 0,
                        "headers": {
                            "Authorization": "Bearer " + response.access_token,
                            "Content-Type": "application/json"
                        }
                    };

                    $.ajax(settings).done(function(response) {
                        var response = response.sort(function(a, b) {
                            return a.value - b.value;
                        });
                        var select_status = "";
                        for (var i = 0; i < response.length; i++) {
                            select_status += "<option value=" + response[i].value + ">" + response[i].text + "</option>";
                        }
                        $('#project_status_id').html(select_status);
                    });
                });
            }

            function LoadPlane() {
                var settings = {
                    "url": "http://dot.pi.ac.th/api//authentication/login",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify({
                        "username": "usercode37",
                        "password": "usercode37"
                    }),
                };
                $.ajax(settings).done(function(response) {
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//sfs/sms/sms005/getAll/null?CurrentCollegeId=37",
                        "method": "GET",
                        "timeout": 0,
                        "headers": {
                            "Authorization": "Bearer " + response.access_token,
                            "Content-Type": "application/json"
                        }
                    };

                    $.ajax(settings).done(function(response) {
                        var select_plan_type = "";
                        var fiscal_year = $('#fiscal_year').val();
                        for (var i = 0; i < response.data.length; i++) {
                            // if (response.data[i].fiscal_year == fiscal_year) {
                            select_plan_type += "<option value=" + response.data[i].plan_type_id + ">" + response.data[i].plan_type_name + "</option>";
                            // }
                        }
                        $('#plan_type_id').html(select_plan_type);
                    });
                });
            }

            function LoadProjectType() {
                var settings = {
                    "url": "http://dot.pi.ac.th/api//authentication/login",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify({
                        "username": "usercode37",
                        "password": "usercode37"
                    }),
                };
                $.ajax(settings).done(function(response) {
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//pi_project_type/getForDropdown?CurrentCollegeId=37",
                        "method": "GET",
                        "timeout": 0,
                        "headers": {
                            "Authorization": "Bearer " + response.access_token,
                            "Content-Type": "application/json"
                        }
                    };

                    $.ajax(settings).done(function(response) {
                        var project_type_id = "";
                        for (var i = 0; i < response.length; i++) {
                            project_type_id += "<option value=" + response[i].value + ">" + response[i].text + "</option>";
                        }
                        $('#project_type_id').html(project_type_id);
                    });
                });
            }

            function setTableProject() {
                $("#tb_project").DataTable({
                    autoWidth: true,
                    pageLength: 10,
                    lengthChange: true,
                    searching: true,
                    order: [],
                    processing: true,
                    serverSide: false,
                    language: lang
                });
            }

            function setTableProjectObj() {
                $("#tb_project_objective").DataTable({
                    autoWidth: true,
                    pageLength: 10,
                    lengthChange: true,
                    searching: true,
                    order: [],
                    processing: true,
                    serverSide: false,
                    language: lang
                });
            }

            function setTableProjectTarget() {
                $("#tb_project_target").DataTable({
                    autoWidth: true,
                    pageLength: 10,
                    lengthChange: true,
                    searching: true,
                    order: [],
                    processing: true,
                    serverSide: false,
                    language: lang
                });
            }

            function setTableProjectProduct() {
                $("#tb_project_product").DataTable({
                    autoWidth: true,
                    pageLength: 10,
                    lengthChange: true,
                    searching: true,
                    order: [],
                    processing: true,
                    serverSide: false,
                    language: lang
                });
            }

            function setTableProjectBenefits() {
                $("#tb_project_benefits").DataTable({
                    autoWidth: true,
                    pageLength: 10,
                    lengthChange: true,
                    searching: true,
                    order: [],
                    processing: true,
                    serverSide: false,
                    language: lang
                });
            }

            function setTableProjectActivity() {
                $("#tb_project_activity").DataTable({
                    autoWidth: true,
                    pageLength: 10,
                    lengthChange: true,
                    searching: true,
                    order: [],
                    processing: true,
                    serverSide: false,
                    language: lang
                });
            }

            $(document).on('click', '#add', function(event) {
                event.preventDefault();
                $('#insert').html("<i class='fa fa-save'></i> บันทึก");
                $('#project_id').val('');
                $('#card_tree').hide();
                $('#card_form').show();

                $('#tb_project_objective_tag').html('');
                $('#tb_project_target_tag').html('');
                $('#tb_project_product_tag').html('');
                $('#tb_project_benefits_tag').html('');

                $('#divObj').hide();
                $('#divTraget').hide();
                $('#divProduct').hide();
                $('#divBenefits').hide();

                $('.liDetail').addClass('active');
                $('.liActivity').hide();
                $('.liOper').hide();
                $('.liDisbursementPlan').hide();
                $('.liDisbursement').hide();
                $('.liBligation').hide();
                $('.liMeasure').hide();
                $('.liAttach').hide();
            });

            $(document).on('click', '.edit_data', function() {
                $('#tb_project_objective_tag').html('');
                $('#tb_project_target_tag').html('');
                $('#tb_project_product_tag').html('');
                $('#tb_project_benefits_tag').html('');

                $('#divObj').show();
                $('#divTraget').show();
                $('#divProduct').show();
                $('#divBenefits').show();

                $('.liDetail').addClass('active');
                $('.liActivity').show();
                $('.liOper').show();
                $('.liDisbursementPlan').show();
                $('.liDisbursement').show();
                $('.liBligation').show();
                $('.liMeasure').show();
                $('.liAttach').show();

                var project_id = $(this).attr("id");
                $('#project_id').val(project_id);
                $.ajax({
                    url: "process/function_project.php?f=getprojectById",
                    method: "POST",
                    data: {
                        project_id: project_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#project_code').val(data.project_code);
                        $('#project_name').val(data.project_name);
                        $('#project_name_en').val(data.project_name_en);
                        $('#fiscal_year').val(data.fiscal_year);
                        $('#date_begin').val(data.date_begin);
                        $('#date_end').val(data.date_end);
                        $('#plan_type_id').val(data.plan_type_id);
                        $('#project_status_id').val(data.project_status_id);
                        $('#project_type_id').val(data.project_type_id);
                        $('#rationale').val(data.rationale);
                        $('#procedures').val(data.procedures);
                        $('#operation_location').val(data.operation_location);
                        $('#insert').html("<i class='fa fa-edit'></i> แก้ไข");
                        $('#title-activity').html("แก้ไข");

                        // get Objective
                        $.ajax({
                            url: "process/function_project.php?f=getprojectObjective",
                            method: "POST",
                            data: {
                                project_id: project_id
                            },
                            success: function(data) {
                                $('#tb_project_objective_tag').html(data);
                                setTableProjectObj();
                            }
                        });

                        // get Target
                        $.ajax({
                            url: "process/function_project.php?f=getprojectTarget",
                            method: "POST",
                            data: {
                                project_id: project_id
                            },
                            success: function(data) {
                                $('#tb_project_target_tag').html(data);
                                setTableProjectTarget();
                            }
                        });

                        // get Product
                        $.ajax({
                            url: "process/function_project.php?f=getprojectProduct",
                            method: "POST",
                            data: {
                                project_id: project_id
                            },
                            success: function(data) {
                                $('#tb_project_product_tag').html(data);
                                setTableProjectProduct();
                            }
                        });

                        // get Benefits
                        $.ajax({
                            url: "process/function_project.php?f=getprojectBenefits",
                            method: "POST",
                            data: {
                                project_id: project_id
                            },
                            success: function(data) {
                                $('#tb_project_benefits_tag').html(data);
                                setTableProjectBenefits();
                            }
                        });

                        // get activity
                        $.ajax({
                            url: "process/function_project.php?f=getprojectActivity",
                            method: "POST",
                            data: {
                                project_id: project_id
                            },
                            success: function(data) {
                                $('#tb_project_activity_tag').html(data);
                                setTableProjectActivity();
                            }
                        });
                    }
                });

                $('#card_tree').hide();
                $('#card_form').show();
            });

            $(document).on('click', '#btn-back', function() {
                $('#project_id').val('');
                $('#card_tree').show();
                $('#card_form').hide();
                $('#form_project')[0].reset();
            });

            $(document).on('click', '#btn-sync', function() {
                CreateModal('div_modelSync');
                var modalSyncHtml = '<div class="form-group">';
                modalSyncHtml += '<label for="project_plan_amount">ปี พ.ศ. <span class="text-red">*</span></label>';
                modalSyncHtml += '<select class="form-control" id="year_sync" name="year_sync" required>';
                modalSyncHtml += '</select>';
                modalSyncHtml += '</div>';
                $('#modalbody').html(modalSyncHtml);
                $('.modalbtn').html('Sync');
                $('#modaltitle').html('เลือกปีที่ Sync');
                var modal = $('#modalO2M');
                LoadYear();
                
                $('.modalbtn').click(function() {
                    modal.modal("toggle");
                    $year_sync = $('#year_sync').val();
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//authentication/login",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({
                            "username": "usercode37",
                            "password": "usercode37"
                        }),
                    };
                    $.ajax(settings).done(function(response) {
                        var access_token = response.access_token;
                        var modal = $('#' + 'loadModal');
                        modal.modal("show");
                        $('#' + 'loadMessage').empty().append('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">กำลังโหลข้อมูลนักศึกษา กรุณารอสักครู่...</span></div></div><p style="text-align: center; margin-top: 20px;">กำลังโหลข้อมูลโครงการปี ' + $year_sync + ' กรุณารอสักครู่...</p>');
                        var settings = {
                            "url": "http://dot.pi.ac.th/api//sfs/pms/pms002/getAll?CurrentCollegeId=37",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Authorization": "Bearer " + access_token,
                                "Content-Type": "application/json"
                            },
                            "data": JSON.stringify({
                                "year": $year_sync,
                                "project_search": null,
                                "project_status_id": null,
                                "project_type_id": null,
                                "project_department_id": null,
                                "college_id": "37",
                                "YearType": "fiscal_year"
                            }),
                        };
                        $.ajax(settings).done(function(response) {
                            for (var key in response.data) {
                                var obj = response.data[key];
                                var settings = {
                                    "url": "http://dot.pi.ac.th/api//sfs/pms/pms0021/get/" + obj.project_id + "?CurrentCollegeId=37",
                                    "method": "GET",
                                    "timeout": 0,
                                    "headers": {
                                        "Authorization": "Bearer " + access_token,
                                        "Content-Type": "application/json"
                                    }
                                };
                                $.ajax(settings).done(function(response) {
                                    $.ajax({
                                        url: "process/function_project.php?f=syncProjectData",
                                        method: "POST",
                                        data: {
                                            data: response,
                                            data_year: $year_sync,
                                            access_token: access_token
                                        },
                                        success: function(data) {
                                            $('#' + 'loadMessage').empty().append('<p style="text-align: center;"><i class="fa fa-check-circle" aria-hidden="true"></i> โหลข้อมูลโครงการเสร็จสิ้น</p>');
                                            $('#alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>Sync ข้อมูลโครงการสร็จสิ้น</div>');
                                            getproject();
                                        },
                                        error: function(e) {
                                            $('#' + 'loadMessage').empty().append('<p style="text-align: center; margin-top: 20px;">โหลข้อมูลโครงการล้มเหลว</p>');
                                            $('#alert_main').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> ล้มเหลว!</h4>' + e.message + '</div>');
                                            getproject();
                                        }
                                    });
                                });
                            }
                        });
                    });
                });
            });

            document.getElementById("fiscal_year").addEventListener("change", function() {
                LoadPlane();
            });

            $('#form_project').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "process/function_project.php?f=insertproject",
                    method: "POST",
                    data: $('#form_project').serialize(),
                    success: function(data) {
                        console.log(data);
                        if ($('#project_id').val() == '') {
                            if (data == 200) {
                                $('#alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>เพิ่มข้อมูลสำเร็จ</div>');
                            } else if (data == 400) {
                                $('#alert_main').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> ล้มเหลว!</h4>เลขตำแหน่งซ้ำไม่สามารถเพิ่มข้อมูลได้</div>');
                            } else {
                                $('#alert_main').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i>1234 ล้มเหลว!</h4>เกิดข้อผิดพลาดจากระบบ ไม่สามารถเพิ่มข้อมูลได้กรุณาลองใหม่อีกครั้ง</div>');
                            }
                        } else {
                            if (data == 200) {
                                $('#alert_main').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> แก้ไขสำเร็จ!</h4>แก้ไขข้อมูลสำเร็จ</div>');
                            } else {
                                $('#alert_main').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> ล้มเหลว!</h4>เกิดข้อผิดพลาดจากระบบ ไม่สามารถเพิ่มข้อมูลได้กรุณาลองใหม่อีกครั้ง</div>');
                            }
                        }

                        $('#project_id').val('');
                        $('#card_tree').show();
                        $('#card_form').hide();
                        $('#form_project')[0].reset();
                        getproject();
                    }
                })
            });

            $(document).on('click', '.delete_data', function() {
                var project_id = $(this).attr("id");
                var project_name = $(this).attr("name");

                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูล <b>' + project_name + '</b> ใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_project.php?f=deleteproject",
                        method: "POST",
                        data: {
                            project_id: project_id
                        },
                        success: function(data) {
                            $('#' + 'alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>ลบข้อมูล ' + project_name + ' เรียบร้อยแล้ว</div>');
                            getproject();
                            fClose();
                        }
                    });
                });
                $('#' + 'confirmCancel').unbind().one("click", fClose);
            });


            // One2Many JS
            function CreateModal(placementId) {
                var html = '<div class="modal modal-danger fade" id="modalO2M">';
                html += '<div class="modal-dialog">';
                html += '<div class="modal-content">';
                html += '<div class="modal-header">'
                html += '<h5 class="modal-title" id="modaltitle"></h5>';
                html += '<button class="close" type="button" data-dismiss="modal" aria-label="Close">';
                html += '<span aria-hidden="true">×</span>';
                html += '</button>';
                html += '</div>';
                html += '<div class="modal-body" id="modalbody">';
                html += '</div>';
                html += '<div class="modal-footer">';
                html += '<button type="button" class="btn btn-info modalbtn">เพิ่ม</button>';
                html += '<button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>';
                html += '</div></div></div></div>'
                $("#" + placementId).html(html);
                $("#modalO2M").modal();
            }
            // Object
            $(document).on('click', '#add-obj', function() {
                CreateModal('div_modelObj');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="project_objective_name">วัตถุประสงค์โครงการ <span class="text-red">*</span></label><textarea class="form-control" id="project_objective_name" name="project_objective_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('เพิ่ม');
                $('#modaltitle').html('เพิ่มวัตถุประสงค์');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                $('.modalbtn').click(function() {
                    var project_objective_name = $('#project_objective_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=inserProjectObj",
                        method: "POST",
                        data: {
                            project_id: project_id,
                            project_objective_name: project_objective_name
                        },
                        success: function(data) {
                            // get Objective
                            $.ajax({
                                url: "process/function_project.php?f=getprojectObjective",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_objective_tag').html(data);
                                    setTableProjectObj();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            $(document).on('click', '.obj_delete_data', function() {
                var project_id = $('#project_id').val();
                var project_objective_id = $(this).attr("id");
                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูลใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_project.php?f=deleteProjectObj",
                        method: "POST",
                        data: {
                            project_objective_id: project_objective_id
                        },
                        success: function(data) {
                            // get Objective
                            $.ajax({
                                url: "process/function_project.php?f=getprojectObjective",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_objective_tag').html(data);
                                    setTableProjectObj();
                                    fClose();
                                }
                            });
                        }
                    });
                });
                $('#' + 'confirmCancel').unbind().one("click", fClose);
            });

            $(document).on('click', '.obj_edit_data', function() {
                CreateModal('div_modelObj');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="project_objective_name">วัตถุประสงค์โครงการ <span class="text-red">*</span></label><textarea class="form-control" id="project_objective_name" name="project_objective_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('แก้ไข');
                $('#modaltitle').html('แก้ไขวัตถุประสงค์');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                var project_objective_id = $(this).attr("id");
                $.ajax({
                    url: "process/function_project.php?f=getprojectObjById",
                    method: "POST",
                    data: {
                        project_objective_id: project_objective_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#project_objective_name').val(data.project_objective_name);
                    }
                });
                $('.modalbtn').click(function() {
                    var project_objective_name = $('#project_objective_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=updateProjectObj",
                        method: "POST",
                        data: {
                            project_objective_id: project_objective_id,
                            project_objective_name: project_objective_name
                        },
                        success: function(data) {
                            // get Objective
                            $.ajax({
                                url: "process/function_project.php?f=getprojectObjective",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_objective_tag').html(data);
                                    setTableProjectObj();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            // Traget
            $(document).on('click', '#add-traget', function() {
                CreateModal('div_modelObj');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="project_target_name">กลุ่มเป้าหมาย <span class="text-red">*</span></label><textarea class="form-control" id="project_target_name" name="project_target_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('เพิ่ม');
                $('#modaltitle').html('เพิ่มกลุ่มเป้าหมาย');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                $('.modalbtn').click(function() {
                    var project_target_name = $('#project_target_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=inserProjectTraget",
                        method: "POST",
                        data: {
                            project_id: project_id,
                            project_target_name: project_target_name
                        },
                        success: function(data) {
                            $.ajax({
                                url: "process/function_project.php?f=getprojectTarget",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_target_tag').html(data);
                                    setTableProjectTarget();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            $(document).on('click', '.traget_delete_data', function() {
                var project_id = $('#project_id').val();
                var project_target_id = $(this).attr("id");
                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูลใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_project.php?f=deleteProjectTraget",
                        method: "POST",
                        data: {
                            project_target_id: project_target_id
                        },
                        success: function(data) {
                            $.ajax({
                                url: "process/function_project.php?f=getprojectTarget",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_target_tag').html(data);
                                    setTableProjectTarget();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
                $('#' + 'confirmCancel').unbind().one("click", fClose);
            });

            $(document).on('click', '.traget_edit_data', function() {
                CreateModal('div_modelObj');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="project_target_name">วัตถุประสงค์โครงการ <span class="text-red">*</span></label><textarea class="form-control" id="project_target_name" name="project_target_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('แก้ไข');
                $('#modaltitle').html('แก้ไขวัตถุประสงค์');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                var project_target_id = $(this).attr("id");
                $.ajax({
                    url: "process/function_project.php?f=getprojectTragetById",
                    method: "POST",
                    data: {
                        project_target_id: project_target_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#project_target_name').val(data.project_target_name);
                    }
                });
                $('.modalbtn').click(function() {
                    var project_target_name = $('#project_target_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=updateProjectTraget",
                        method: "POST",
                        data: {
                            project_target_id: project_target_id,
                            project_target_name: project_target_name
                        },
                        success: function(data) {
                            $.ajax({
                                url: "process/function_project.php?f=getprojectTarget",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_target_tag').html(data);
                                    setTableProjectTarget();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            // Product
            $(document).on('click', '#add-product', function() {
                CreateModal('div_modelObj');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="project_product_name">ผลผลิต <span class="text-red">*</span></label><textarea class="form-control" id="project_product_name" name="project_product_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('เพิ่ม');
                $('#modaltitle').html('เพิ่มผลผลิต');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                $('.modalbtn').click(function() {
                    var project_product_name = $('#project_product_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=inserProjectProduct",
                        method: "POST",
                        data: {
                            project_id: project_id,
                            project_product_name: project_product_name
                        },
                        success: function(data) {
                            // get Product
                            $.ajax({
                                url: "process/function_project.php?f=getprojectProduct",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_product_tag').html(data);
                                    setTableProjectProduct();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            $(document).on('click', '.product_delete_data', function() {
                var project_id = $('#project_id').val();
                var project_product_id = $(this).attr("id");
                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูลใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_project.php?f=deleteProjectProduct",
                        method: "POST",
                        data: {
                            project_product_id: project_product_id
                        },
                        success: function(data) {
                            // get Product
                            $.ajax({
                                url: "process/function_project.php?f=getprojectProduct",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_product_tag').html(data);
                                    setTableProjectProduct();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
                $('#' + 'confirmCancel').unbind().one("click", fClose);
            });

            $(document).on('click', '.product_edit_data', function() {
                CreateModal('div_modelObj');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="project_product_name">ผลผลิต <span class="text-red">*</span></label><textarea class="form-control" id="project_product_name" name="project_product_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('แก้ไข');
                $('#modaltitle').html('แก้ไขผลผลิต');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                var project_product_id = $(this).attr("id");
                $.ajax({
                    url: "process/function_project.php?f=getprojectProductById",
                    method: "POST",
                    data: {
                        project_product_id: project_product_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#project_product_name').val(data.project_product_name);
                    }
                });
                $('.modalbtn').click(function() {
                    var project_product_name = $('#project_product_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=updateProjectProduct",
                        method: "POST",
                        data: {
                            project_product_id: project_product_id,
                            project_product_name: project_product_name
                        },
                        success: function(data) {
                            // get Product
                            $.ajax({
                                url: "process/function_project.php?f=getprojectProduct",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_product_tag').html(data);
                                    setTableProjectProduct();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            // Benefits
            $(document).on('click', '#add-benefits', function() {
                CreateModal('div_modelObj');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="project_benefits_name">ประโยชน์ที่คาดว่าจะได้รับ <span class="text-red">*</span></label><textarea class="form-control" id="project_benefits_name" name="project_benefits_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('เพิ่ม');
                $('#modaltitle').html('เพิ่มประโยชน์ที่คาดว่าจะได้รับ');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                $('.modalbtn').click(function() {
                    var project_benefits_name = $('#project_benefits_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=inserProjectBenefits",
                        method: "POST",
                        data: {
                            project_id: project_id,
                            project_benefits_name: project_benefits_name
                        },
                        success: function(data) {
                            // get Benefits
                            $.ajax({
                                url: "process/function_project.php?f=getprojectBenefits",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_benefits_tag').html(data);
                                    setTableProjectBenefits();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            $(document).on('click', '.benefits_delete_data', function() {
                var project_id = $('#project_id').val();
                var project_benefits_id = $(this).attr("id");
                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูลใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_project.php?f=deleteProjectBenefits",
                        method: "POST",
                        data: {
                            project_benefits_id: project_benefits_id
                        },
                        success: function(data) {
                            // get Benefits
                            $.ajax({
                                url: "process/function_project.php?f=getprojectBenefits",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_benefits_tag').html(data);
                                    setTableProjectBenefits();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
                $('#' + 'confirmCancel').unbind().one("click", fClose);
            });

            $(document).on('click', '.benefits_edit_data', function() {
                CreateModal('div_modelObj');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="project_benefits_name">ประโยชน์ที่คาดว่าจะได้รับ <span class="text-red">*</span></label><textarea class="form-control" id="project_benefits_name" name="project_benefits_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('แก้ไข');
                $('#modaltitle').html('แก้ไขประโยชน์ที่คาดว่าจะได้รับ');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                var project_benefits_id = $(this).attr("id");
                $.ajax({
                    url: "process/function_project.php?f=getprojectBenefitsById",
                    method: "POST",
                    data: {
                        project_benefits_id: project_benefits_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#project_benefits_name').val(data.project_benefits_name);
                    }
                });
                $('.modalbtn').click(function() {
                    var project_benefits_name = $('#project_benefits_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=updateProjectBenefits",
                        method: "POST",
                        data: {
                            project_benefits_id: project_benefits_id,
                            project_benefits_name: project_benefits_name
                        },
                        success: function(data) {
                            // get Benefits
                            $.ajax({
                                url: "process/function_project.php?f=getprojectBenefits",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_benefits_tag').html(data);
                                    setTableProjectBenefits();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            // Activity
            $(document).on('click', '#add-activity', function() {
                CreateModal('div_modelActivity');
                var modalDialogActhtml = '<div class="row">';
                modalDialogActhtml += '    <div class="col-12">';
                modalDialogActhtml += '        <div class="form-group">';
                modalDialogActhtml += '            <label for="activity_name">กิจกรรม <span class="text-red">*</span></label>';
                modalDialogActhtml += '            <textarea class="form-control" id="activity_name" name="activity_name" rows="4"></textarea>';
                modalDialogActhtml += '        </div>';
                modalDialogActhtml += '    </div>';
                modalDialogActhtml += '    <div class="col-12">';
                modalDialogActhtml += '        <div class="form-group">';
                modalDialogActhtml += '            <label for="project_activity_status_id">สถานะ <span class="text-red">*</span></label>';
                modalDialogActhtml += '            <select class="form-control" id="project_activity_status_id" name="project_activity_status_id" required></select>';
                modalDialogActhtml += '        </div>';
                modalDialogActhtml += '    </div>';
                modalDialogActhtml += '    <div class="col-12">';
                modalDialogActhtml += '        <div class="form-group">';
                modalDialogActhtml += '            <label for="begin_date">วันที่เริ่ม <span class="text-red">*</span></label>';
                modalDialogActhtml += '            <input type="date" class="form-control" id="begin_date" name="begin_date" placeholder="วันที่เริ่มต้น" required>';
                modalDialogActhtml += '        </div>';
                modalDialogActhtml += '    </div>';
                modalDialogActhtml += '    <div class="col-12">';
                modalDialogActhtml += '        <div class="form-group">';
                modalDialogActhtml += '            <label for="end_date">วันที่สิ้นสุด <span class="text-red">*</span></label>';
                modalDialogActhtml += '            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="วันที่สิ้นสุด" required>';
                modalDialogActhtml += '        </div>';
                modalDialogActhtml += '    </div>';
                modalDialogActhtml += '</div>';
                $('#modalbody').html(modalDialogActhtml);
                $('.modalbtn').html('เพิ่ม');
                $('#modaltitle').html('เพิ่มกิจกรรม');
                var modal = $('#modalO2M');
                var settings = {
                    "url": "http://dot.pi.ac.th/api//authentication/login",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify({
                        "username": "usercode37",
                        "password": "usercode37"
                    }),
                };
                $.ajax(settings).done(function(response) {
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//sfs/pms/pms001/getAllForDropdown?CurrentCollegeId=37",
                        "method": "GET",
                        "timeout": 0,
                        "headers": {
                            "Authorization": "Bearer " + response.access_token,
                            "Content-Type": "application/json"
                        }
                    };

                    $.ajax(settings).done(function(response) {
                        var response = response.sort(function(a, b) {
                            return a.value - b.value;
                        });
                        var select_status = "";
                        for (var i = 0; i < response.length; i++) {
                            select_status += "<option value=" + response[i].value + ">" + response[i].text + "</option>";
                        }
                        console.log(select_status);
                        $('#project_activity_status_id').html(select_status);
                    });
                });

                var project_id = $('#project_id').val();
                $('.modalbtn').click(function(e) {
                    e.preventDefault();
                    var activity_name = $('#activity_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=inserProjectActivity",
                        method: "POST",
                        data: {
                            project_id: project_id,
                            activity_name: activity_name
                        },
                        success: function(data) {
                            // get activity
                            $.ajax({
                                url: "process/function_project.php?f=getprojectActivity",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_activity_tag').html(data);
                                    setTableProjectActivity();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });

            $(document).on('click', '.activity_delete_data', function() {
                var project_id = $('#project_id').val();
                var project_activity_id = $(this).attr("id");
                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูลใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_project.php?f=deleteProjectActivity",
                        method: "POST",
                        data: {
                            project_activity_id: project_activity_id
                        },
                        success: function(data) {
                            // get activity
                            $.ajax({
                                url: "process/function_project.php?f=getprojectActivity",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_activity_tag').html(data);
                                    setTableProjectActivity();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
                $('#' + 'confirmCancel').unbind().one("click", fClose);
            });

            $(document).on('click', '.activity_edit_data', function() {
                CreateModal('div_modelActivity');
                $('#modalbody').html('<div class="row"><div class="col-12"><div class="form-group"><label for="activity_name">วัตถุประสงค์โครงการ <span class="text-red">*</span></label><textarea class="form-control" id="activity_name" name="activity_name" rows="4"></textarea></div></div></div>');
                $('.modalbtn').html('แก้ไข');
                $('#modaltitle').html('แก้ไขวัตถุประสงค์');
                var modal = $('#modalO2M');
                var project_id = $('#project_id').val();
                var project_activity_id = $(this).attr("id");
                $.ajax({
                    url: "process/function_project.php?f=getprojectActivityById",
                    method: "POST",
                    data: {
                        project_activity_id: project_activity_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#activity_name').val(data.activity_name);
                    }
                });
                $('.modalbtn').click(function() {
                    var activity_name = $('#activity_name').val();
                    $.ajax({
                        url: "process/function_project.php?f=updateProjectActivity",
                        method: "POST",
                        data: {
                            project_activity_id: project_activity_id,
                            activity_name: activity_name
                        },
                        success: function(data) {
                            // get activity
                            $.ajax({
                                url: "process/function_project.php?f=getprojectActivity",
                                method: "POST",
                                data: {
                                    project_id: project_id
                                },
                                success: function(data) {
                                    $('#tb_project_activity_tag').html(data);
                                    setTableProjectActivity();
                                    $("#modelObjmsg").html("");
                                    modal.modal("hide");
                                }
                            });
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>