<div class="well">
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Mã Học Viên:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['HV_MA']; ?></i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Họ Tên:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['HV_TEN']; ?></i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Ngày Sinh:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['HV_NGAYSINH']; ?></i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Số Điện Thoại:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['HV_SDT']; ?></i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Email:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['HV_EMAIL']; ?></i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Địa Chỉ:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['HV_DIACHI']; ?></i></b>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Khóa Học:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['KH_TEN']; ?></i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Lớp Học:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['LH_TEN']; ?></i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Thời Lượng:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo $hocvien['KH_THOILUONG']; ?> Tuần</i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Học Phí:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo number_format($hocvien['KH_HOCPHI'],0,',','.'); ?> VNĐ</i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Đã Đóng:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo number_format($hocvien['HP_TIENDONG'],0,',','.'); ?> VNĐ</i></b>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 text-right">
					<b>Còn Nợ:</b>
				</div>
				<div class="col-xs-8 text-left">
					<b style="color:red;"><i><?php echo number_format($hocvien['KH_HOCPHI']-$hocvien['HP_TIENDONG'],0,',','.'); ?> VNĐ</i></b>
				</div>
			</div>
		</div>
	</div>
</div>
<form class="form-horizontal" role="form" action="" method="post">
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="HP_TIENDONG">Số Tiền Đóng:</label>
		<div class="col-xs-8">
			<input type="number" min="1000" max="<?php echo $hocvien['KH_HOCPHI']-$hocvien['HP_TIENDONG']; ?>" class="form-control" name="HP_TIENDONG" id="HP_TIENDONG" required />
			<span class="glyphicon glyphicon-usd form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group"> 
		<div class="col-xs-offset-2 col-xs-8">
			<button type="submit" class="btn btn-success">
				<span class="glyphicon glyphicon-plus-sign"></span>
			Đóng Tiền</button>
		</div>
		<div class="col-xs-2"></div>
	</div>
</form>