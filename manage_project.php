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
                    <!-- form -->
                    <form id="form_project">
                        <div class="card shadow mb-4" id="card_form">
                            <div class="card-header py-3">
                                <span class="badge badge-default float-right m-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm" id="btn-back"><i class="fa fa-arrow-left"></i> กลับ</button>
                                    <button type="submit" class="btn btn-success btn-sm" id="insert"><i class="fa fa-save"></i> บันทึก</button>
                                    <input type="hidden" name="project_id" id="project_id" />
                                </span>
                                <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลโครงการ</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="project_code">รหัสโครงการ <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="project_code" name="project_code" placeholder="รหัสโครงการ" required>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="project_name">ชื่อโครงการ <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="project_name" name="project_name" placeholder="ชื่อโครงการ" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="project_type">ประเภทโครงการ <span class="text-red">*</span></label>
                                            <select class="form-control" id="project_type" name="project_type">
                                                <option value="ด้านงานประจำ">ด้านงานประจำ</option>
                                                <option value="ด้านยุทธศาสตร์/นโยบาย">ด้านยุทธศาสตร์/นโยบาย</option>
                                                <option value="ด้านทำนุบำรุงศิลปวัฒนธรรม">ด้านทำนุบำรุงศิลปวัฒนธรรม</option>
                                                <option value="ด้านบริการวิชาการ">ด้านบริการวิชาการ</option>
                                                <option value="ด้านวิจัยและนวัตกรรม">ด้านวิจัยและนวัตกรรม</option>
                                                <option value="ด้านผลิตบัณฑิต">ด้านผลิตบัณฑิต</option>
                                                <option value="ด้านบริหารจัดการ">ด้านบริหารจัดการ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="project_total_amount">วงเงินอนุมัติ (บาท) <span class="text-red">*</span></label>
                                            <input type="number" class="form-control" id="project_total_amount" name="project_total_amount" value="0" placeholder="วงเงินอนุมัติ (บาท)" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="project_plan_amount">แผนเบิกจ่าย <span class="text-red">*</span></label>
                                            <input type="number" class="form-control" id="project_plan_amount" name="project_plan_amount" value="0" placeholder="แผนเบิกจ่าย" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="project_disbursement_amount">เบิกจ่าย <span class="text-red">*</span></label>
                                            <input type="number" class="form-control" id="project_disbursement_amount" name="project_disbursement_amount" value="0" placeholder="เบิกจ่าย" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="project_amount_remain">คงเหลือ </label>
                                            <input type="number" class="form-control" id="project_amount_remain" name="project_amount_remain" value="0" placeholder="คงเหลือ" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="project_status">สถานะ <span class="text-red">*</span></label>
                                            <select class="form-control" id="project_status" name="project_status">
                                                <option value="รอดำเนินการ">รอดำเนินการ</option>
                                                <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
                                                <option value="ดำเนินการล่าช้า">ดำเนินการล่าช้า</option>
                                                <option value="เสร็จสิ้น">เสร็จสิ้น</option>
                                                <option value="ยกเลิก">ยกเลิก</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- form -->

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
                                <input type="text" class="form-control" id="year_sync" name="year_sync" placeholder="ปี พ.ศ." value="2563" maxlength="4">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" id="syncOk">Sync Data</button>
                            <button type="button" class="btn btn-default pull-left" id="syncCancel">ยกเลิก</button>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#card_form').hide();

            function setTable() {
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

                $("#tb_project").DataTable({
                    autoWidth: true,
                    pageLength: 5,
                    lengthChange: true,
                    searching: true,
                    order: [],
                    scrollX: true,
                    processing: true,
                    serverSide: false,
                    language: lang
                });
            }

            $(document).on('click', '#add', function() {
                $('#insert').val("บันทึก");
                $('#project_id').val('');
                $('#card_tree').hide();
                $('#card_form').show();
            });

            $(document).on('click', '#btn-sync', function() {
                var modal = $('#SyncModal');
                modal.modal("show");
                $('#' + 'syncOk').on('click', function() {
                    modal.modal("hide");
                    $year_sync = $('#year_sync').val();
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//authentication/login",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({
                            "username": "phuriphat",
                            "password": "1qaz2wsx"
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
                            $.ajax({
                            url: "process/function_project.php?f=syncProjectData",
                            method: "POST",
                            data: {
                                data: response,
                                data_year: $year_sync,
                            },
                            success: function(data) {
                                console.log(data);
                                $('#' + 'loadMessage').empty().append('<p style="text-align: center; margin-top: 20px;">โหลข้อมูลโครงการเสร็จสิ้น</p>');
                                $('#alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>Sync ข้อมูลโครงการสร็จสิ้น</div>');
                                getproject();
                            },
                            error: function(e) {
                                $('#' + 'loadMessage').empty().append('<p style="text-align: center; margin-top: 20px;">โหลข้อมูลโครงการเสร็จสิ้น</p>');
                                $('#alert_main').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> ล้มเหลว!</h4>' + e.message + '</div>');
                                getproject();
                            }
                        });
                        });
                    });
                });
            });



            document.getElementById("project_disbursement_amount").addEventListener("change", function() {
                cal_remain();
            });

            document.getElementById("project_plan_amount").addEventListener("change", function() {
                cal_remain();
            });

            function cal_remain() {
                $project_total_amount = $('#project_total_amount').val();
                $project_plan_amount = $('#project_plan_amount').val();
                if (parseFloat($project_plan_amount) > parseFloat($project_total_amount)) {
                    $('#alert_text').html('แผนเบิกจ่ายมีจำนวนมากกว่า วงเงินอนุมัติ');
                    var modal = $('#' + 'calAlertModal');
                    modal.modal("show");
                    $('#project_plan_amount').val(0);
                    $('#project_disbursement_amount').val(0);
                    $('#project_amount_remain').val(0);
                    return;
                }
                $project_disbursement_amount = $('#project_disbursement_amount').val();
                $remain = $project_plan_amount - $project_disbursement_amount
                if ($remain >= 0) {
                    $('#project_amount_remain').val($remain);
                    return;
                } else {
                    $('#alert_text').html('ยอดคงเหลือ ติดลบ กรุณาตรวจสอบจำนวนเงิน');
                    var modal = $('#' + 'calAlertModal');
                    modal.modal("show");
                    $('#project_disbursement_amount').val(0);
                    $('#project_amount_remain').val(0);
                    return;
                }
            }

            $(document).on('click', '.edit_data', function() {
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
                        $('#project_total_amount').val(data.project_total_amount);
                        $('#project_plan_amount').val(data.project_plan_amount);
                        $('#project_disbursement_amount').val(data.project_disbursement_amount);
                        $('#project_amount_remain').val(data.project_amount_remain);
                        $('#project_type').val(data.project_type);
                        $('#project_status').val(data.project_status);
                        $('#insert').val("แก้ไข");
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

            function getproject() {
                $.ajax({
                    url: "process/function_project.php?f=getproject",
                    method: "GET",
                    success: function(data) {
                        $('#' + 'tb_project_tag').html(data);
                        setTable();
                        $('#card_form').hide();
                    }
                });
            }

            getproject();

            $('#form_project').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "process/function_project.php?f=insertproject",
                    method: "POST",
                    data: $('#form_project').serialize(),
                    success: function(data) {
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
        });
    </script>
</body>

</html>