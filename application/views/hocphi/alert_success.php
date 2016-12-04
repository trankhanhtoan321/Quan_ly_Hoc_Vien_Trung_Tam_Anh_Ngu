<div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<h2 style="text-align:center;">Đã Đóng Học Phí Thành Công!</h2>
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