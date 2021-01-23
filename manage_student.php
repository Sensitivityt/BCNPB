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
                    <form id="form_student">
                        <div class="card shadow mb-4" id="card_form">
                            <div class="card-header py-3">
                                <span class="badge badge-default float-right m-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm" id="btn-back"><i class="fa fa-arrow-left"></i> กลับ</button>
                                    <button type="submit" class="btn btn-success btn-sm" id="insert"><i class="fa fa-save"></i> บันทึก</button>
                                    <input type="hidden" name="std_id" id="std_id" />
                                </span>
                                <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลนักเรียน</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="stdCode">รหัสนักเรียน <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="stdCode" name="stdCode" placeholder="รหัสนักเรียน" required>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="stdfullname">ชื่อ - สกุล <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="stdfullname" name="stdfullname" placeholder="ชื่อ - สกุล" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="sstName">สถานะ <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="sstName" name="sstName" placeholder="สถานะ" required>
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
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> เพิ่มนักเรียน</button></span>
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-info btn-sm" name="btn-sync" id="btn-sync"><i class="fa fa-sync"></i> Sync ข้อมูลนักเรียน</button></span>
                            <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลนักเรียน</h6>
                        </div>

                        <div class="card-body" id="tb_student_tag">
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
                            <h5 class="modal-title">ลบข้อมูลนักเรียน</h5>
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

            <!-- Modal confirm -->
            <div class="modal modal-danger fade" id="loadModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">กำลังโหลดข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
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

                $("#tb_student").DataTable({
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

            $(document).on('click', '#btn-sync', function() {
                event.preventDefault();
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
                    $('#' + 'loadMessage').empty().append('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">กำลังโหลข้อมูลนักศึกษา กรุณารอสักครู่...</span></div></div><p style="text-align: center; margin-top: 20px;">กำลังโหลข้อมูลนักศึกษาชั้นปีที่ 1 กรุณารอสักครู่...</p>');
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//crs/manage/sync-regist-data/viewDetail?CurrentCollegeId=37",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": access_token,
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({
                            "criteria": {
                                "college_id": 37,
                                "curriculum_group_id": 1,
                                "num_couse": 1
                            }
                        }),
                    };

                    $.ajax(settings).done(function(response) {
                        $.ajax({
                            url: "process/function_student.php?f=syncStudentData",
                            method: "POST",
                            data: {
                                data: response,
                                data_year: 1,
                            },
                            success: function(data) {
                                $('#' + 'loadMessage').empty().append('<p style="text-align: center; margin-top: 20px;">โหลข้อมูลนักศึกษาเสร็จสิ้น</p>');
                                $('#alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>Sync ข้อมูลนักเรียนเสร็จสิ้น</div>');
                                getstudent();
                            },
                            error: function(e) {
                                $('#alert_main').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> ล้มเหลว!</h4>' + e.message + '</div>');
                                getstudent();
                            }
                        });
                    });

                    var modal = $('#' + 'loadModal');
                    modal.modal("show");
                    $('#' + 'loadMessage').empty().append('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">กำลังโหลข้อมูลนักศึกษา กรุณารอสักครู่...</span></div></div><p style="text-align: center; margin-top: 20px;">กำลังโหลข้อมูลนักศึกษาชั้นปีที่ 2 กรุณารอสักครู่...</p>');
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//crs/manage/sync-regist-data/viewDetail?CurrentCollegeId=37",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": access_token,
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({
                            "criteria": {
                                "college_id": 37,
                                "curriculum_group_id": 1,
                                "num_couse": 2
                            }
                        }),
                    };

                    $.ajax(settings).done(function(response) {
                        $.ajax({
                            url: "process/function_student.php?f=syncStudentData",
                            method: "POST",
                            data: {
                                data: response,
                                data_year: 2,
                            },
                            success: function(data) {
                                $('#' + 'loadMessage').empty().append('<p style="text-align: center; margin-top: 20px;">โหลข้อมูลนักศึกษาเสร็จสิ้น</p>');
                                $('#alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>Sync ข้อมูลนักเรียนเสร็จสิ้น</div>');
                                getstudent();
                            },
                            error: function(e) {
                                $('#alert_main').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> ล้มเหลว!</h4>' + e.message + '</div>');
                                getstudent();
                            }
                        });
                    });

                    var modal = $('#' + 'loadModal');
                    modal.modal("show");
                    $('#' + 'loadMessage').empty().append('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">กำลังโหลข้อมูลนักศึกษา กรุณารอสักครู่...</span></div></div><p style="text-align: center; margin-top: 20px;">กำลังโหลข้อมูลนักศึกษาชั้นปีที่ 3 กรุณารอสักครู่...</p>');
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//crs/manage/sync-regist-data/viewDetail?CurrentCollegeId=37",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": access_token,
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({
                            "criteria": {
                                "college_id": 37,
                                "curriculum_group_id": 1,
                                "num_couse": 3
                            }
                        }),
                    };

                    $.ajax(settings).done(function(response) {
                        $.ajax({
                            url: "process/function_student.php?f=syncStudentData",
                            method: "POST",
                            data: {
                                data: response,
                                data_year: 3,
                            },
                            success: function(data) {
                                $('#' + 'loadMessage').empty().append('<p style="text-align: center; margin-top: 20px;">โหลข้อมูลนักศึกษาเสร็จสิ้น</p>');
                                $('#alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>Sync ข้อมูลนักเรียนเสร็จสิ้น</div>');
                                getstudent();
                            },
                            error: function(e) {
                                $('#alert_main').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> ล้มเหลว!</h4>' + e.message + '</div>');
                                getstudent();
                            }
                        });
                    });

                    var modal = $('#' + 'loadModal');
                    modal.modal("show");
                    $('#' + 'loadMessage').empty().append('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">กำลังโหลข้อมูลนักศึกษา กรุณารอสักครู่...</span></div></div><p style="text-align: center; margin-top: 20px;">กำลังโหลข้อมูลนักศึกษาชั้นปีที่ 4 กรุณารอสักครู่...</p>');
                    var settings = {
                        "url": "http://dot.pi.ac.th/api//crs/manage/sync-regist-data/viewDetail?CurrentCollegeId=37",
                        "method": "POST",
                        "timeout": 0,
                        "headers": {
                            "Authorization": access_token,
                            "Content-Type": "application/json"
                        },
                        "data": JSON.stringify({
                            "criteria": {
                                "college_id": 37,
                                "curriculum_group_id": 1,
                                "num_couse": 4
                            }
                        }),
                    };

                    $.ajax(settings).done(function(response) {
                        $.ajax({
                            url: "process/function_student.php?f=syncStudentData",
                            method: "POST",
                            data: {
                                data: response,
                                data_year: 4,
                            },
                            success: function(data) {
                                $('#' + 'loadMessage').empty().append('<p style="text-align: center; margin-top: 20px;">โหลข้อมูลนักศึกษาเสร็จสิ้น</p>');
                                $('#alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>Sync ข้อมูลนักเรียนเสร็จสิ้น</div>');
                                getstudent();
                            },
                            error: function(e) {
                                $('#alert_main').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> ล้มเหลว!</h4>' + e.message + '</div>');
                                getstudent();
                            }
                        });
                    });
                });
            });

            $(document).on('click', '#add', function() {
                $('#insert').val("บันทึก");
                $('#std_id').val('');
                $('#card_tree').hide();
                $('#card_form').show();
            });

            $(document).on('click', '.edit_data', function() {
                var std_id = $(this).attr("id");
                $('#std_id').val(std_id);
                $.ajax({
                    url: "process/function_student.php?f=getstudentById",
                    method: "POST",
                    data: {
                        std_id: std_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#stdCode').val(data.stdCode);
                        $('#stdfullname').val(data.stdfullname);
                        $('#sstName').val(data.sstName);
                        $('#insert').val("แก้ไข");
                    }
                });
                $('#card_tree').hide();
                $('#card_form').show();
            });

            $(document).on('click', '#btn-back', function() {
                $('#std_id').val('');
                $('#card_tree').show();
                $('#card_form').hide();
                $('#form_student')[0].reset();
            });

            function getstudent() {
                $.ajax({
                    url: "process/function_student.php?f=getstudent",
                    method: "GET",
                    success: function(data) {
                        $('#' + 'tb_student_tag').html(data);
                        setTable();
                        $('#card_form').hide();
                    }
                });
            }

            getstudent();

            $('#form_student').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "process/function_student.php?f=insertstudent",
                    method: "POST",
                    data: $('#form_student').serialize(),
                    success: function(data) {
                        if ($('#std_id').val() == '') {
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

                        if (data == 200) {
                            $('#std_id').val('');
                            $('#card_tree').show();
                            $('#card_form').hide();
                            $('#form_student')[0].reset();
                            getstudent();
                        }
                    }
                })
            });

            $(document).on('click', '.delete_data', function() {
                var std_id = $(this).attr("id");
                var stdfullname = $(this).attr("name");

                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูล <b>' + stdfullname + '</b> ใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_student.php?f=deletestudent",
                        method: "POST",
                        data: {
                            std_id: std_id
                        },
                        success: function(data) {
                            $('#' + 'alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>ลบข้อมูล ' + stdfullname + ' เรียบร้อยแล้ว</div>');
                            getstudent();
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