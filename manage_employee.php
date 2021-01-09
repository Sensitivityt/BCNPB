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
                    <form id="form_person">
                        <div class="card shadow mb-4" id="card_form">
                            <div class="card-header py-3">
                                <span class="badge badge-default float-right m-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm" id="btn-back"><i class="fa fa-arrow-left"></i> กลับ</button>
                                    <button type="submit" class="btn btn-success btn-sm" id="insert"><i class="fa fa-save"></i> บันทึก</button>
                                    <input type="hidden" name="perid" id="perid" />
                                </span>
                                <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลบุคลากร</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                            $sql_code = "SELECT Teacher_code FROM `dev_hrperson` ORDER BY Teacher_code DESC LIMIT 1";
                                            $result_code = mysqli_query($conn, $sql_code);
                                            $row_code = mysqli_fetch_array($result_code, MYSQLI_ASSOC);
                                            $teacher_code = $row_code['Teacher_code'] + 1;
                                        ?>
                                        <div class="form-group">
                                            <label for="teacher_code">รหัสครู </label>
                                            <input type="text" class="form-control" id="teacher_code" name="teacher_code" value="<?php echo $teacher_code; ?>" placeholder="รหัสครู">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="id_card">เลขบัตรประชาชน <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="id_card" name="id_card" placeholder="เลขบัตรประชาชน" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="pcode">คำนำหน้า <span class="text-red">*</span></label>
                                            <select class="form-control" id="pcode" name="pcode" required>
                                                <?php
                                                $sql = "SELECT * FROM `dev_cprefix`";
                                                $result = mysqli_query($conn, $sql);
                                                while ($data = mysqli_fetch_array($result)) {
                                                    echo "<option value=$data[pcode]>$data[prefixName]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="fname">ชื่อ <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อ" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="lname">นามสกุล <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุล" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="sex">เพศ <span class="text-red">*</span></label>
                                            <select class="form-control" id="sex" name="sex">
                                                <option selected="selected" value="1">ชาย</option>
                                                <option value="2">หญิง</option>
                                                <option value="3">ไม่ระบุ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="cercode">ประเภทใบอนุญาต <span class="text-red">*</span></label>
                                            <select class="form-control" id="cercode" name="cercode">
                                                <?php
                                                $sql = "SELECT * FROM `dev_ccertificate` ORDER BY cercode";
                                                $result = mysqli_query($conn, $sql);
                                                while ($data = mysqli_fetch_array($result)) {
                                                    echo "<option value=$data[cercode]>$data[cername]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="cerid">รหัสใบอนุญาต <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="cerid" name="cerid" placeholder="รหัสใบอนุญาต" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="levelcode">ระดับการศึกษา <span class="text-red">*</span></label>
                                            <select class="form-control" id="levelcode" name="levelcode">
                                                <?php
                                                $sql = "SELECT * FROM `dev_clevel` ORDER BY levelcode";
                                                $result = mysqli_query($conn, $sql);
                                                while ($data = mysqli_fetch_array($result)) {
                                                    echo "<option value=$data[levelcode]>$data[levelHig]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="statusId">สถานะ <span class="text-red">*</span></label>
                                            <select class="form-control" id="statusId" name="statusId">
                                                <?php
                                                $sql = "SELECT * FROM `dev_status` ORDER BY statusId";
                                                $result = mysqli_query($conn, $sql);
                                                while ($data = mysqli_fetch_array($result)) {
                                                    echo "<option value=$data[statusId]>$data[StatusTh]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="birthdate">วันเกิด <span class="text-red">*</span></label>
                                            <input class="form-control" type="date" id="birthdate" name="birthdate" required />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="appointdate">วันที่ปฏิบัติงาน <span class="text-red">*</span></label>
                                            <input class="form-control" type="date" id="appointdate" name="appointdate" required />
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
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> เพิ่มบุคลากร</button></span>
                            <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">จัดการข้อมูลบุคลากร</h6>
                        </div>
                        <div class="card-body" id="tb_person_tag">
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
                            <h5 class="modal-title">ลบข้อมูลบุคลากร</h5>
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

                $("#tb_person").DataTable({
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
                $('#perid').val('');
                $('#card_tree').hide();
                $('#card_form').show();
            });

            $(document).on('click', '.edit_data', function() {
                var perid = $(this).attr("id");
                $('#perid').val(perid);
                $.ajax({
                    url: "process/function_person.php?f=gethrpersonById",
                    method: "POST",
                    data: {
                        perid: perid
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#Teacher_code').val(data.Teacher_code);
                        $('#id_card').val(data.id);
                        $('#sex').val(data.sex);
                        $('#pcode').val(data.pcode);
                        $('#fname').val(data.fname);
                        $('#lname').val(data.lname);
                        $('#cercode').val(data.cercode);
                        $('#pcode').val(data.pcode);
                        $('#cerid').val(data.cerid);
                        $('#levelcode').val(data.levelcode);
                        $('#statusId').val(data.statusId);
                        $('#birthdate').val(data.birthdate);
                        $('#appointdate').val(data.appointdate);
                        $('#insert').val("แก้ไข");
                    }
                });
                $('#card_tree').hide();
                $('#card_form').show();
            });

            $(document).on('click', '#btn-back', function() {
                $('#perid').val('');
                $('#card_tree').show();
                $('#card_form').hide();
                $('#form_person')[0].reset();
            });

            function gethrperson() {
                $.ajax({
                    url: "process/function_person.php?f=gethrperson",
                    method: "GET",
                    success: function(data) {
                        $('#' + 'tb_person_tag').html(data);
                        setTable();
                        $('#card_form').hide();
                    }
                });
            }

            gethrperson();

            $('#form_person').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "process/function_person.php?f=insertperson",
                    method: "POST",
                    data: $('#form_person').serialize(),
                    success: function(data) {
                        if ($('#perid').val() == '') {
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

                        $('#perid').val('');
                        $('#card_tree').show();
                        $('#card_form').hide();
                        $('#form_person')[0].reset();
                        gethrperson();
                    }
                })
            });

            $(document).on('click', '.delete_data', function() {
                var teacher_id = $(this).attr("id");
                var teacher_name = $(this).attr("name");

                var fClose = function() {
                    modal.modal("hide");
                };
                var modal = $('#' + 'confirmModal');
                modal.modal("show");
                $('#' + 'confirmMessage').empty().append('ต้องการลบข้อมูล <b>' + teacher_name + '</b> ใช่หรือไม่ ?');
                $('#' + 'confirmOk').on('click', function() {
                    $.ajax({
                        url: "process/function_person.php?f=deleteperson",
                        method: "POST",
                        data: {
                            teacher_id: teacher_id
                        },
                        success: function(data) {
                            $('#' + 'alert_main').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> สำเร็จ!</h4>ลบข้อมูล ' + teacher_name + ' เรียบร้อยแล้ว</div>');
                            gethrperson();
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