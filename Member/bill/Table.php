<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางรายงานยอดการการจองที่ชำระเงินและส่งมอบแล้ว</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Billtable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
            <th>#</th>
            <th>สินค้าที่จอง</th>
            <th>จำนวนที่จอง</th>
            <th>ราคารวม</th>
            <th>วันที่จอง</th>
            <th>ผู้ซื้อ</th>
            <th>ที่อยู่ผู้ซื้อ</th>
			<th>เบอร์โทร</th>
			<th>วันที่รับสินค้า</th>
			<th>ประเภทการจัดส่ง</th>
			<th>การจัดการ</th>
          </tr>
                		</thead>
                	<tbody>
					<?php while($rowbooking = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
            <tr>
                <td><?php echo $rowbooking['Bo_id'];?></td>
                <td><?php echo $rowbooking['P_name']; ?></td>
			    <td><?php echo $rowbooking['Bo_amount']; ?></td>
			    <td><?php echo $rowbooking['Bo_total']; ?></td>
			    <td><?php echo $rowbooking['Bo_date']; ?></td>
			    <td><?php echo $rowbooking['Bo_cus']; ?></td>
			    <td><?php echo $rowbooking['Bo_cadd']; ?></td>
			    <td><?php echo $rowbooking['Bo_ctel']; ?></td>
			    <td><?php echo $rowbooking['Bo_cdate']; ?></td>
				<td><?php echo $rowbooking['Get_name']; ?></td>
				<td align="center">
					<a href="#" data-target="#confirmModal<?php echo $rowbooking['Bo_id']; ?>" class="btn btn btn-success" data-toggle="modal" title="แจ้งการชำระเงินและส่งมอบ" >แจ้ง</a>
					<a href="#" data-target="#editModal<?php echo $rowbooking['Bo_id']; ?>" class="btn btn btn-warning" data-toggle="modal" title="แก้ไขข้อมูลลูกค้า" >แก้ไข</a>
					<a href="#" data-target="#deleteModal<?php echo $rowbooking['Bo_id']; ?>" class="btn btn btn-danger" data-toggle="modal" title="ยกเลิกการจองสินค้า" >ยกเลิก</a>
				</td>
			</tr>
	<!-- Confirm Modal HTML -->
	<div id="confirmModal<?php echo $rowbooking['Bo_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../control/booking/Bill.php">
					<div class="modal-header">
						<h4 class="modal-title">แจ้งและยืนยันการชำระเงินและส่งมอบ</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการจอง : <?php echo $rowbooking['Bo_id']; ?></p>
                        <p>ชื่อผู้จอง : <?php echo $rowbooking['Bo_cus'];?></p>
                        <p>สินค้าที่จอง : <?php echo $rowbooking['P_name']; ?></p>
						<p>จำนวนที่จอง : <?php echo $rowbooking['Bo_amount']; ?></p>
						<p>ราคารวม : <?php echo $rowbooking['Bo_total']." บาท"; ?></p>
						<p>วันที่จอง : <?php echo $rowbooking['Bo_date']; ?></p>
						<p>ประเภทการรับสินค้า : <?php echo $rowbooking['Get_name']; ?></p>
						<input type="hidden" name="boid" value="<?php echo $rowbooking["Bo_id"];?>">
						<input type="hidden" name="pid" value="<?php echo $rowbooking["P_id"];?>">
						<input type="hidden" name="name" value="<?php echo $rowbooking["P_name"];?>">
						<input type="hidden" name="mid" value="<?php echo $rowbooking["M_id"];?>">
						<input type="hidden" name="quantity" value="<?php echo $rowbooking["Bo_amount"];?>">
						<input type="hidden" name="total" value="<?php echo $rowbooking["Bo_total"];?>">
						<input type="hidden" name="price" value="<?php echo $rowbooking["P_price"];?>">
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" name="save" id="save" value="ยืนยัน">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editModal<?php echo $rowbooking['Bo_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- <form method="POST" action="../../control/booking/Editbooking.php"> -->
					<div class="modal-header">
						<h4 class="modal-title">แก้ไขข้อมูลลูกค้า/ผู้สั่งจอง</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="Boid">รหัสการจอง</label>
							<input id="Boid" class="form-control" type="text" name="boid" value="<?php echo $rowbooking["Bo_id"] ?>" oninvalid="this.setCustomValidity('กรุณากรอกอักษรไม่ถูกต้อง')" oninput="setCustomValidity('')" required readonly>
						</div>
						<div class="form-group">
							<label for="cusname">ชื่อลูกค้า</label>
							<input id="cusname" class="form-control" type="text" name="cname" value="<?php echo $rowbooking["Bo_cus"] ?>" pattern="[ก-๙]{25}" oninvalid="this.setCustomValidity('กรุณากรอกอักษรไม่ถูกต้อง')" oninput="setCustomValidity('')" required >
						</div>
						<div class="form-group">
							<label for="address">ที่อยู่</label>
							<input id="address" class="form-control" type="text" name="cadd" value="<?php echo $rowbooking["Bo_cadd"] ?>" oninvalid="this.setCustomValidity('กรุณากรอกอักษรไม่ถูกต้อง')" oninput="setCustomValidity('')" required >
						</div>
						<div class="form-group">
							<label for="ctel">เบอร์โทร</label>
							<input id="ctel" class="form-control" type="tel" name="ctel" value="<?php echo $rowbooking["Bo_ctel"] ?>" pattern="[0-9]{10}" title="Telephone" oninvalid="this.setCustomValidity('กรุณากรอกอักษรไม่ถูกต้อง')" oninput="setCustomValidity('')" required>
						</div>
						<div class="form-group">
							<label for="getdate">วันที่ต้องการรับสินค้า</label>
							<input id="getdate" class="form-control" type="date" name="getdate" value="<?php echo $rowbooking["Bo_cdate"] ?>" oninvalid="this.setCustomValidity('กรุณากรอกอักษรไม่ถูกต้อง')" oninput="setCustomValidity('')" required >
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" name="save" id="save" value="บันทึกการเปลี่ยนแปลง">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
					</div>
				</form>
			</div>
		</div>
	</div>
				<!-- Delete Modal HTML -->
	<div id="deleteModal<?php echo $rowbooking['Bo_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">ยืนยันยกเลิกการจองนี้</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการจอง : <?php echo $rowbooking['Bo_id']; ?></p>
                        <p>ชื่อผู้จอง : <?php echo $rowbooking['Bo_cus'];?></p>
                        <p>สินค้าที่จอง : <?php echo $rowbooking['P_name']; ?></p>
						<p>จำนวนที่จอง : <?php echo $rowbooking['Bo_amount']; ?></p>
						<p>ราคารวม : <?php echo $rowbooking['Bo_total']." บาท"; ?></p>
						<p>วันที่จอง : <?php echo $rowbooking['Bo_date']; ?></p>
						<p>ประเภทการรับสินค้า : <?php echo $rowbooking['Get_name']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../../control/booking/DelBooking.php?delid=<?php echo $rowbooking['Bo_id']; ?>" role="button" value="Delete">ยืนยัน</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		} ?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End Delete Modal -->