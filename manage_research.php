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
                    <form id="form_research">
                        <div class="card shadow mb-4" id="card_form">
                            <div class="card-header py-3">
                                <span class="badge badge-default float-right m-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm" id="btn-back"><i class="fa fa-arrow-left"></i> กลับ</button>
                                    <button type="submit" class="btn btn-success btn-sm" id="insert"><i class="fa fa-save"></i> บันทึก</button>
                                    <input type="hidden" name="research_id" id="research_id" />
                                </span>
                                <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลวรสารวิชาการ</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="research_type">ประเภทบทความ <span class="text-red">*</span></label>
                                            <select class="form-control" id="research_type" name="research_type">
                                                <option value="บทความวิจัย">บทความวิจัย</option>
                                                <option value="บทความวิชาการ">บทความวิชาการ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="research_name_th">ชื่อบทความ (ไทย) <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="research_name_th" name="research_name_th" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="research_name_en">ชื่อบทความ (อังกฤษ)</label>
                                            <input type="text" class="form-control" id="research_name_en" name="research_name_en">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="research_journal_id">ประเภทวรสารวิชาการ </label>
                                            <select class="form-control" id="research_journal_id" name="research_journal_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="research_base_id">กลุ่มฐานข้อมูลวิจัย </label>
                                            <select class="form-control" id="research_base_id" name="research_base_id">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="at_year">ปีที่ </label>
                                            <input type="number" class="form-control" id="at_year" name="at_year" maxlength="4" size="4">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="at_no">ฉบับที่ </label>
                                            <input type="number" class="form-control" id="at_no" name="at_no">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="at_page">หน้าที่ </label>
                                            <input type="number" class="form-control" id="at_page" name="at_page">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="publish_year_be">ปีที่เผยแพร่ (พ.ศ.) <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="publish_year_be" name="publish_year_be" maxlength="4" size="4">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="publish_year_ad">ปีที่เผยแพร่ (ค.ศ.) <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="publish_year_ad" name="publish_year_ad" maxlength="4" size="4">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="publish_date">วันที่เผยแพร่ </label>
                                            <input type="date" class="form-control" id="publish_date" name="publish_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="research_branch_group_id_lv1">กลุ่มสาขา (ISCED) </label>
                                            <select class="form-control" id="research_branch_group_id_lv1" name="research_branch_group_id_lv1">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="research_branch_group_id">สาขา </label>
                                            <select class="form-control" id="research_branch_group_id" name="research_branch_group_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="research_multidisciplinary_id">สาขาวิชาที่ร่วมผลิต (สหวิชาชีพ) </label>
                                            <select class="form-control" id="research_multidisciplinary_id" name="research_multidisciplinary_id">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="keyword">คำค้น (Key word)</label>
                                            <input type="text" class="form-control" id="keyword" name="keyword">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="reference">การอ้างอิง (จากแหล่งจัดเก็บผลงาน)</label>
                                            <input type="text" class="form-control" id="reference" name="reference">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="project_id">จากโครงการ (ประเภทวิจัยและวิชาการ) </label>
                                            <select class="form-control" id="project_id" name="project_id">
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
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> เพิ่มวรสารวิชาการ</button></span>
                            <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลวรสารวิชาการ</h6>
                        </div>
                        <div class="card-body" id="tb_research_tag">
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
                            <h5 class="modal-title">ลบข้อมูลวรสารวิชาการ</h5>
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

                $("#tb_research").DataTable({
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
                $('#research_id').val('');
                $('#card_tree').hide();
                $('#card_form').show();
            });

            $(document).on('click', '.edit_data', function() {
                var research_id = $(this).attr("id");
                $('#research_id').val(research_id);
                $.ajax({
                    url: "process/function_research.php?f=getresearchById",
                    method: "POST",
                    data: {
                        research_id: research_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#research_type').val(data.research_type);
                        $('#research_name_th').val(data.research_name_th);
                        $('#research_name_en').val(data.research_name_en);
                        $('#research_journal_id').val(data.research_journal_id);
                        $('#research_base_id').val(data.research_base_id);
                        $('#at_year').val(data.at_year);
                        $('#at_no').val(data.at_no);
                        $('#at_page').val(data.at_page);
                        $('#publish_year_be').val(data.publish_year_be);
                        $('#publish_year_ad').val(data.publish_year_ad);
                        $('#publish_date').val(data.publish_date);
                        $('#research_branch_group_id_lv1').val(data.research_branch_group_id_lv1);
                        $('#research_branch_group_id').val(data.research_branch_group_id);
                        $('#research_multidisciplinary_id').val(data.research_multidisciplinary_id);
                        $('#keyword').val(data.keyword);
                        $('#reference').val(data.reference);
                        $('#insert').val("แก้ไข");
                    }
                });
                $('#card_tree').hide();
                $('#card_form').show();
            });

            $(document).on('click', '#btn-back', function() {
                $('#research_id').val('');
                $('#card_tree').show();
                $('#card_form').hide();
                $('#form_research')[0].reset();
            });

            document.getElementById("publish_year_be").addEventListener("keyup", function() {
                $publish_year_be = $('#publish_year_be').val();
                if ($publish_year_be.length == 4){
                    $publish_year_ad = $publish_year_be - 543;
                    $('#publish_year_ad').val($publish_year_ad);
                }
            });

            function getresearch() {
                $.ajax({
                    url: "process/function_research.php?f=getresearch",
                    method: "GET",
                    success: function(data) {
                        $('#' + 'tb_research_tag').html(data);
                        setTable();
                        $('#card_form').hide();
                    }
                });
            }

            getresearch();

            $('#form_research').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "process/function_research.php?f=insertresearch",
                    method: "POST",
                    data: $('#form_research').serialize(),
                    success: function(data) {
                        if ($('#research_id').val() == '') {
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

                        $('#research_id').val('');
                        $('#card_tree').show();
                        $('#card_form').hide();
                        $('#form_research')[0].reset();
                        getresearch();
                    }
                })
            });

            $(document).on('click', '.delete_data', function() {
                var research_id = $(this).attr("id");
                var research_name = $(this).attr("name");

                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูล <b>' + research_name + '</b> ใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_research.php?f=deleteresearch",
                        method: "POST",
                        data: {
                            research_id: research_id
                        },
                        success: function(data) {
                            $('#' + 'alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>ลบข้อมูล ' + research_name + ' เรียบร้อยแล้ว</div>');
                            getresearch();
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