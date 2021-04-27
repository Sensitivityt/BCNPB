<form id="form_project">
    <div class="card-body">
        <div class="row">
            <div class="col-12" style="text-align: right;">
                <button type="submit" class="btn btn-success btn-md" id="insert"><i class="fa fa-save"></i> บันทึก</button>
                <input type="hidden" name="project_id" id="project_id" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="project_code">รหัสโครงการ <span class="text-red">*</span></label>
                    <input type="text" class="form-control" id="project_code" name="project_code" placeholder="รหัสโครงการ" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="project_name">ชื่อโครงการ (ภาษาไทย) <span class="text-red">*</span></label>
                    <input type="text" class="form-control" id="project_name" name="project_name" placeholder="ชื่อโครงการ (ภาษาไทย)" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="project_name_en">ชื่อโครงการ (อังกฤษ) </label>
                    <input type="text" class="form-control" id="project_name_en" name="project_name_en" placeholder="ชื่อโครงการ (อังกฤษ)">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="fiscal_year">ปีงบประมาณ <span class="text-red">*</span></label>
                    <select class="form-control" id="fiscal_year" name="fiscal_year" required>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="date_begin">วันที่เริ่มต้น <span class="text-red">*</span></label>
                    <input type="date" class="form-control" id="date_begin" name="date_begin" placeholder="วันที่เริ่มต้น" required>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="date_end">วันที่สิ้นสุด <span class="text-red">*</span></label>
                    <input type="date" class="form-control" id="date_end" name="date_end" placeholder="วันที่สิ้นสุด" required>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="project_status_id">สถานะ <span class="text-red">*</span></label>
                    <select class="form-control" id="project_status_id" name="project_status_id" required>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="plan_type_id">แผนงาน <span class="text-red">*</span></label>
                    <select class="form-control" id="plan_type_id" name="plan_type_id" required>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="project_type_id">ประเภทโครงการ <span class="text-red">*</span></label>
                    <select class="form-control" id="project_type_id" name="project_type_id" required>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="rationale">หลักการและเหตุผล </label>
                    <textarea class="form-control" id="rationale" name="rationale" rows="4"></textarea>
                </div>
            </div>
        </div>
        <!-- Objective List -->
        <div class="row" style="margin-bottom: 15px;" id="divObj">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <span class="badge badge-default float-right m-2">
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-success btn-sm" name="add-obj" id="add-obj"><i class="fa fa-plus"></i> เพิ่มวัตถุประสงค์</button></span>
                        </span>
                        <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">วัตถุประสงค์</h6>
                    </div>
                    <div class="card-body" id="tb_project_objective_tag">
                    </div>
                </div>
            </div>
        </div>
        <!-- Objective List -->
        <!-- Target List -->
        <div class="row" style="margin-bottom: 15px;" id="divTraget"> 
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <span class="badge badge-default float-right m-2">
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-success btn-sm" name="add-traget" id="add-traget"><i class="fa fa-plus"></i> เพิ่มกลุ่มเป้าหมาย</button></span>
                        </span>
                        <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">กลุ่มเป้าหมาย</h6>
                    </div>
                    <div class="card-body" id="tb_project_target_tag">
                    </div>
                </div>
            </div>
        </div>
        <!-- Target List -->
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="procedures">วิธีดำเนินการ </label>
                    <textarea class="form-control" id="procedures" name="procedures" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="operation_location">สถานที่ดำเนินงาน </label>
                    <textarea class="form-control" id="operation_location" name="operation_location" rows="2"></textarea>
                </div>
            </div>
        </div>
        <!-- Product List -->
        <div class="row" style="margin-bottom: 15px;" id="divProduct">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <span class="badge badge-default float-right m-2">
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-success btn-sm" name="add-product" id="add-product"><i class="fa fa-plus"></i> เพิ่มผลผลิต</button></span>
                        </span>
                        <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">ผลผลิต</h6>
                    </div>
                    <div class="card-body" id="tb_project_product_tag">
                    </div>
                </div>
            </div>
        </div>
        <!-- Product List -->
        <!-- Benefits List -->
        <div class="row" style="margin-bottom: 15px;" id="divBenefits">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <span class="badge badge-default float-right m-2">
                            <span class="badge badge-default float-right m-2"><button type="button" class="btn btn-success btn-sm" name="add-benefits" id="add-benefits"><i class="fa fa-plus"></i> เพิ่มประโยชน์</button></span>
                        </span>
                        <h6 class="card-title d-inline align-middle m-0 font-weight-bold text-primary">ประโยชน์ที่คาดว่าจะได้รับ </h6>
                    </div>
                    <div class="card-body" id="tb_project_benefits_tag">
                    </div>
                </div>
            </div>
        </div>
        <!-- Benefits List -->
    </div>
</form>
<!-- form -->


<div id="div_modelObj"></div>
<div id="div_modelTraget"></div>
<div id="div_modelProduct"></div>
<div id="div_modelBenefits"></div>