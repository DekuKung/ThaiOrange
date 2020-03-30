<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header">แก้ไขข้อมูลวัสดุ</div>
	<div class="card-body">
		<div class="col-md-8 mx-auto">
			<form class="was-validated" action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" class="form-control" id="mstock_id" name="mstock_id" value="<?php echo $row["mstock_id"]; ?>" >
				<div class="form-group row">
					<label for="pname" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mstock_name" name="mstock_name" value="<?php echo $row['mstock_name']; ?>" maxlength="75" pattern="[ก-๙a-zA-Z1-9]{1,}" title="กรุณากรอก ก-ฮ, a-z และตัวอักษร A-Z" required>
						<input type="hidden" id="mstock_name_old" name="mstock_name_old" value="<?php echo $row['mstock_name']; ?>" required>
						<div class="invalid-feedback">
							กรุณากรอกชื่อสินค้า
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="loation" class="col-sm-3 col-form-label">ที่จัดเก็บสินค้า</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mstock_location" name="mstock_location" value="<?php echo $row['mstock_location']; ?>" required></input>
						<div class="invalid-feedback">
							กรุณากรอกที่จัดเก็บสินค้า
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="loation" class="col-sm-3 col-form-label">ระยะเวลาในการจัดส่ง</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mstock_waittime" name="mstock_waittime" onKeyUp="IsNumeric(this.value,this)" value="<?php echo $row['mstock_waittime']; ?>" maxlength="5" pattern="[1-9]{1,5}" title="กรุณากรอกตัวเลข 0-9" required></input>
						<div class="invalid-feedback">
							กรุณากรอกระยะเวลาในการจัดส่ง
						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="card-footer text-center">
		<input type="submit" name="submit" class="btn btn-primary" value="ยืนยัน">
		<a class="btn btn-danger" href="../">ยกเลิก</a>
	</div>
	</form>
</div>
<!--End Delete Modal -->