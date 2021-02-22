<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <img style="width: 3rem;" src="img/logo.png">
        <div class="sidebar-brand-text mx-1">BCNPB</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        จัดการข้อมูล
    </div>

    <!-- Nav Item - Person -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerson" aria-expanded="true" aria-controls="collapsePerson">
            <i class="fas fa-fw fa-cog"></i>
            <span>ระบบ HMS</span>
        </a>
        <div id="collapsePerson" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">จัดการบุคลากร:</h6>
                <a class="collapse-item" href="manage_employee.php">จัดการบุคลากร</a>
                <!-- <h6 class="collapse-header">ตั้งค่าพื้นฐาน:</h6>
                <a class="collapse-item" href="#">กำหนดสิทธิ์กลุ่ม</a>
                <a class="collapse-item" href="#">โครงสร้างหน่วยงาน</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Student -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-fw fa-cog"></i>
            <span>ระบบ CRS</span>
        </a>
        <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">จัดการนักศึกษา:</h6>
                <a class="collapse-item" href="manage_student.php">จัดการนักศึกษา</a>
            </div>
        </div>
    </li>

     <!-- Nav Item - Project -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProject" aria-expanded="true" aria-controls="collapseProject">
            <i class="fas fa-fw fa-cog"></i>
            <span>ระบบ SFS</span>
        </a>
        <div id="collapseProject" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">จัดการโครงการ:</h6>
                <a class="collapse-item" href="manage_project.php">จัดการโครงการ</a>
            </div>
        </div>
    </li>

     <!-- Nav Item - Project -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResearch" aria-expanded="true" aria-controls="collapseResearch">
            <i class="fas fa-fw fa-cog"></i>
            <span>ระบบ RMS</span>
        </a>
        <div id="collapseResearch" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">ผลงานวิจัยและวิชาการ:</h6>
                <a class="collapse-item" href="manage_research.php">วารสารวิชาการ</a>
                <a class="collapse-item" href="manage_presented_academic.php">นำเสนอในเวทีวิชาการ</a>
                <a class="collapse-item" href="#">ตำราหรือหนังสือ</a>
                <a class="collapse-item" href="#">เอกสารประกอบการสอน<br/>หรือคำสอน</a>
                <a class="collapse-item" href="#">นวัตกรรมหรือสิ่งประดิษฐ์</a>
                <hr/>
                <h6 class="collapse-header">ทรัพย์สินทางปัญญา:</h6>
                <a class="collapse-item" href="#">สิทธิบัตร</a>
                <a class="collapse-item" href="#">ลิขสิทธิ์</a>
                <a class="collapse-item" href="#">เครื่องหมายการค้า</a>
                <a class="collapse-item" href="#">เอกสารประกอบการสอน<br/>หรือคำสอน</a>
                <a class="collapse-item" href="#">นวัตกรรมหรือสิ่งประดิษฐ์</a>
                <hr/>
                <h6 class="collapse-header">ตั้งค่าพื้นฐาน:</h6>
                <a class="collapse-item" href="manage_source_funds.php">แหล่งทุน</a>
                <a class="collapse-item" href="manage_intellectual_property.php">กลุ่มสิทธิบัตร</a>
                <a class="collapse-item" href="manage_intellectual_type.php">ประเภทผลงานลิขสิทธิ์</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Base -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBase" aria-expanded="true" aria-controls="collapseBase">
            <i class="fas fa-fw fa-cog"></i>
            <span>ข้อมูลพื้นฐาน</span>
        </a>
        <div id="collapseBase" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">ตั้งค่าพื้นฐาน:</h6>
                <a class="collapse-item" href="#">-</a>
            </div>
        </div>
    </li>
</ul>
<!-- End of Sidebar -->