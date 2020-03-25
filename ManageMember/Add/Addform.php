<div class="card">
	<div class="card-body">
	<div class="card-title"><h5>เพิ่มผู้ใช้</h5></div>
		<form action="../../control/member/Addmem.php" method="POST">
		<div class="modal-body">
						<div class="form-group">
							<label>ชื่อ</label>
							<input type="text"  name="Fname" id="Fname" class="form-control" pattern="^[ก-๏\s]+${3,25}" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาไทยเท่านั้น')" required>
						</div>
						<div class="form-group">
							<label>นามสกุล</label>
							<input type="text"  name="Lname" id="Lname" class="form-control" pattern="^[ก-๏\s]+${3,25}" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาไทยเท่านั้น')" required>
						</div>
						<div class="form-group">
							<label>ที่อยู่</label>
							<input class="form-control"  name="Add" id="Add" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>เบอร์ติดต่อ</label>
							<input type="text"  name="Phone" id="Phone" class="form-control" pattern="^[0]{1}[689]{1}[0-9]{7,}" title="กรุณากรอกเบอร์โทรติดต่อ 10 ตัวเลข" oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรติดต่อ 10 ตัวเลข โดยขึ้นต้นด้วย 08 หรือ 06 หรือ 09')" required>
						</div>
						<div class="form-group">
							<label>ชื่อผู้ใช้</label>
							<input class="form-control"  name="user" id="user" class="form-control" pattern="(?=.*[a-z]).{4-10}" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาอังกฤษเล็กเท่านั้น')" required></input>
						</div>
						<div class="form-group">
							<label>รหัสผ่าน</label>
							<input type="text"  name="pass" id="pass" class="form-control" pattern="(?=.*\d)(?=.*[a-z]).{6-8}" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาอังกฤษเล็กผสมตัวเลขเท่านั้น')" required>
						</div>
						<div class="form-group">
							<label>รหัสประชาชน</label>
							<input type="text"  name="idcard" id="idcard" class="form-control" pattern="[0-9]{13}" title="กรุณากรอกตัวเลขบัตรประชาชน 13 หลัก" oninvalid="this.setCustomValidity('กรุณากรอกตัวเลขบัตรประชาชน 13 หลัก')"  required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" value="เพิ่มพนักงาน">
					</div>

</form>
	</div>
</div>